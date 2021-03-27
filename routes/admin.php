<?php 
use Illuminate\Support\Facades\Route;

Route::group(['namespace'=>'backend','prefix'=>'dashboard'],function(){
    Route::get('/login','AuthController@login')->name('admin.login');
    Route::post('/dologin','AuthController@dologin')->name('admin.dologin');

    Route::group(['middleware'=>'adminAuth:admin'],function(){
        Route::get('/','HomeController@index')->name('admin.home');
        Route::get('/logout','HomeController@logout')->name('admin.logout');

        Route::resource('category','CategoryController');

        Route::resource('post','PostController');
    });




});