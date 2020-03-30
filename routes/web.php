<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix=>admin','auth=>middleware'],function(){
    Route::get('categories',['uses'=>'CategoriesController@index',
    'as'=>'index']);
    Route::get('categories/create',[
        'uses'=>'CategoriesController@create',
        'as'=>'category.create'
    ]);
    Route::post('categories/store',[
        'uses'=>'CategoriesController@store',
        'as'=>'category.store'
    ]);
    Route::get('categories/edit/{id}',[
        'uses'=>'CategoriesController@edit',
        'as'=>'category.edit'
    ]);
    Route::post('categories/update/{id}',[
        'uses'=>'CategoriesController@update',
        'as'=>'category.update'
    ]);
    Route::get('categories/delete/{id}',[
        'uses'=>'CategoriesController@destroy',
        'as'=>'category.delete'
    ]);
    Route::get('posts',[
        'uses'=>'PostsController@index',
        'as'=>'post.index'
    ]);
    Route::get('posts/create',[
        'uses'=>'PostsController@create',
        'as'=>'post.create'
    ]);
    Route::post('posts/store',[
        'uses'=>'PostsController@store',
        'as'=>'post.store'
    ]);
    Route::get('posts/edit/{id}',[
        'uses'=>'PostsController@edit',
        'as'=>'post.edit'
    ]);
    
    Route::get('posts/delete/{id}',[
        'uses'=>'PostsController@destroy',
        'as'=>'post.delete'
    ]);

});