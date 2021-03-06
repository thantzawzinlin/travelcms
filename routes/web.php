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


Route::get('/',[
    'uses'=>'FrontendController@index',
    'as'=>'welcome'
]);
  Route::get('/search', function(){
       $post= App\Post::where('title','like','%'. request('query') .'%')->get();
        return view('search')->with('posts',$post)
                        ->with('categories',App\Category::take(5)->get())
                           ->with('settings',App\Setting::first())
                           ->with('footer',App\Setting::first())
                           ->with('title', request('query'))
                           ->with('query',request('query'));

    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
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
     Route::post('posts/update/{id}',[
        'uses'=>'PostsController@update',
        'as'=>'post.update'
    ]);
    
    Route::get('posts/delete/{id}',[
        'uses'=>'PostsController@destroy',
        'as'=>'post.delete'
    ]);
    Route::get('posts/trashed',[
        'uses'=>'PostsController@trashed',
        'as'=>'post.trashed'
    ]);
    Route::get('posts/restore/{id}',[
        'uses'=>'PostsController@restore',
        'as'=>'post.restore'
    ]);
     Route::get('posts/kill/{id}',[
        'uses'=>'PostsController@kill',
        'as'=>'post.kill'
    ]);

    //For Tag 

    Route::get('tags',[
        'uses'=>'TagsController@index',
        'as'=>'tag.index']);
    Route::get('tags/create',[
        'uses'=>'TagsController@create',
        'as'=>'tag.create'
    ]);
    Route::post('tags/store',[
        'uses'=>'TagsController@store',
        'as'=>'tag.store'
    ]);
    Route::get('tags/edit/{id}',[
        'uses'=>'TagsController@edit',
        'as'=>'tag.edit'
    ]);
    Route::post('tags/update/{id}',[
        'uses'=>'TagsController@update',
        'as'=>'tag.update'
    ]);
    Route::get('tags/delete/{id}',[
        'uses'=>'TagsController@destroy',
        'as'=>'tag.delete'
    ]);

    //User 
     Route::get('users',[
        'uses'=>'UsersController@index',
        'as'=>'user.index']);
    Route::get('users/create',[
        'uses'=>'UsersController@create',
        'as'=>'user.create'
    ]);
    Route::post('users/store',[
        'uses'=>'UsersController@store',
        'as'=>'user.store'
    ]);
    // Route::get('users/edit/{id}',[
    //     'uses'=>'UsersController@edit',
    //     'as'=>'user.edit'
    // ]);
    // Route::post('users/update/{id}',[
    //     'uses'=>'UsersController@update',
    //     'as'=>'user.update'
    // ]);
    Route::get('users/delete/{id}',[
        'uses'=>'UsersController@destroy',
        'as'=>'user.delete'
    ]);
    Route::get('users/admin/{id}',[
        'uses'=>'UsersController@admin',
        'as'=>'user.admin'
    ]);
     Route::get('users/Notadmin/{id}',[
        'uses'=>'UsersController@Notadmin',
        'as'=>'user.notadmin'
    ]);
    Route::get('users/profile',[
        'uses'=>'ProfilesController@index',
        'as'=>'user.profile'
    ]);
    Route::post('users/profile/update',[
        'uses'=>'ProfilesController@update',
        'as'=>'user.profile.update'
    ]);

    //Setting route

     Route::get('settings',[
        'uses'=>'SettingsController@index',
        'as'=>'setting.index'
    ]);
    Route::post('settings/update',[
        'uses'=>'SettingsController@update',
        'as'=>'setting.update'
    ]);
    
    Route::get('/{slug}',[
        'uses'=>'FrontendController@singlePage',
        'as'=>'singlePage'
    ]);
    Route::get('menu/{id}',[
        'uses'=>'FrontendController@menuPage',
        'as'=>'menulist'
    ]);
      Route::get('tag/{id}',[
        'uses'=>'FrontendController@tagPage',
        'as'=>'taglist'
    ]);
  


});