<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.profile')->with('user',Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
             $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'facebook'=>'required|url',
            'youtube'=>'required|url',
            
        ]);
        $user=Auth::user();

        // if ($request->hasFile('avartar'))
        // {
        //     $uploadedImage = $request->file('avartar');
           
        //     $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
           
        //     $destinationPath = 'profile/pic/';
        //     $uploadedImage->move($destinationPath, $imageName);
           
        //     $user->profile1->avartar = $destinationPath . $imageName;
        //     $user->save();
        // } It works too.
        if($request->hasFile('avartar'))
        {
            $avater = $request->avartar;
            $New_avater=time().$avater->getClientOriginalName();

            $avater->move('profile/pic', $New_avater);
            $user->profile1->avartar= 'profile/pic/'.$New_avater;
            $user->profile1->save();
            $user->save(); //it is important to be user not [$avater->save()];
        }
      
        $user->name= $request->name;
        $user->email=$request->email;
        $user->profile1->facebook=$request->facebook;
        $user->profile1->youtube=$request->youtube;
        $user->profile1->about=$request->about;

        $user->save();
        $user->profile1->save();

        if($request->has('password')){
            $user->password=bcrypt($request->password);
            $user->save();
        }
        toastr()->success('Profile successfully updated');
        return redirect()->route('user.index');
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
