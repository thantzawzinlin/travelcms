<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::latest()->get();
        return view('admin.post.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.post.create')->with('categories',Category::all())
                                        ->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            //'picture'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            'picture'=>'required|image',
            'cat_id'=>'required'
           // 'slug'=>'required'
            
        ]);

        //dd($request->all());
        $image=$request->picture;
        $imageName = time().$image->getClientOriginalExtension(); 

       $image->move('images',$imageName);
       
        $post=Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'picture'=>'images/'.$imageName,
            'cat_id'=>$request->cat_id,            
            'slug' => Str::slug($request->title)
            

        ]);
        $post->tags()->attach($request->tags);
        toastr()->success('Data has been saved successfully!');
       return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts=Post::findOrFail($id);
        return view('admin.post.edit')->with('posts',$posts)->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',  
            'cat_id'=>'required'     
           
            
           
            
        ]);

        $post=Post::find($id);
        if($request->hasFile('picture')){
             $image=$request->picture;
            $imageName = time().$image->getClientOriginalExtension(); 
            $image->move('images',$imageName);
            $post->picture='/images/'. $imageName;
        }
       
       
       
            $post->title=$request->title;
            $post->content=$request->content;
           
           $post->cat_id=$request->cat_id;            
            $post->slug = Str::slug($request->title);
            $post->save();

       $post->tags()->sync($request->tags);
        toastr()->success('Data has been updated successfully!');
       return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts=Post::findOrFail($id);
        $posts->delete();
        toastr()->success('Data has been deleted successfully!');
       return redirect()->route('post.index');
    }
    public function trashed(){
      
        //$posts = Post::withTrashed()->get();
        $posts = Post::onlyTrashed()->get();
        return view('admin.post.trashed')->with('posts',$posts);
    }
    public function restore($id){
        //Post::restore();
        //  $posts=Post::find($id);
        //   $posts->restore();
          $posts= Post::withTrashed()->where('id',$id)->first();
          $posts->restore();
           toastr()->success('Data has been deleted successfully!');
            return redirect()->route('post.index');
    }
    public function kill($id){
        $posts= Post::withTrashed()->where('id',$id)->first();
        $posts->forceDelete();
        toastr()->success('Data has been deleted successfully!');
         return redirect()->route('post.trashed');
    }
}
