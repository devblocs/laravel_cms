<?php

use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    if(Auth::check()){
        return redirect()->route('home');
    }
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // routes for posts
    Route::resource('post', 'PostsController');

    // routes for categories
    Route::resource('categories', 'CategoriesController')->except(['create', 'show']);

    // route for user profile
    Route::prefix('user')->group(function(){
        Route::get('/', 'UserController@viewIndex')->name('user.index');

        Route::get('/edit', 'UserController@editProfile')->name('user.edit');

        Route::match(['post', 'put'],'/update/{action?}', 'UserController@updateProfile')->name('user.update');
    });
    
});



