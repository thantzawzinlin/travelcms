<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Post;
use App\Category;
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
                              ->with('outdoor',Category::find(5));

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
