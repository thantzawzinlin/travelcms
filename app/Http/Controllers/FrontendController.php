<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Post;
use App\Category;
use App\Tag;
class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $test=Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first();
        // dd($test);
        //return view('welcome')->with('title',Setting::first());
        return view('welcome')->with('title',Setting::first()->site_name)
                              ->with('categories',Category::take(5)->get())
                              ->with('first_post',Post::orderBy('created_at','desc')->first())
                              ->with('second_post',Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                              ->with('third_post',Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                              ->with('indoor',Category::find(4))
                              ->with('outdoor',Category::find(5))
                              ->with('footer',Setting::first());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function singlePage($slug)
    {
       
        $post=Post::where('slug',$slug)->first();
         $next=Post::where('id','>',$post->id)->min('id');
        $prev=Post::where('id','<',$post->id)->max('id');
        return view('single')->with('post',$post)
                             ->with('title',Setting::first()->site_name)
                             ->with('categories',Category::take(5)->get())
                             ->with('footer',Setting::first())
                             ->with('next_post',Post::find($next))
                             ->with('prev_post',Post::find($prev))
                             

                             ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function menuPage($id)
    {
        // $category=Category::find($id);
        // return view('menu')->with('category',$category)
        // ->with('categories',Category::take(5)->get())
        //                    ->with('footer',Setting::first())
        //                    ->with('title',Setting::first()->site_name);
          $category=Category::find($id);
        return view('menu')->with('category',$category)
                           
                            ->with('categories',Category::take(5)->get())
                           ->with('footer',Setting::first())
                           ->with('title',$category->name);
        
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function tagPage($id)
    {
        // $category=Category::find($id);
        // return view('menu')->with('category',$category)
        // ->with('categories',Category::take(5)->get())
        //                    ->with('footer',Setting::first())
        //                    ->with('title',Setting::first()->site_name);
        $tag=Tag::find($id);
        return view('tag')->with('tag',$tag)
                            ->with('categories',Category::take(5)->get())
                           ->with('footer',Setting::first())
                           ->with('title',$tag->name);
        
        
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
