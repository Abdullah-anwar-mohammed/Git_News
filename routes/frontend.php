<?php 

use Illuminate\Support\Facades\Route;

Route::group(['namespace'=>'frontend'],function(){
    Route::get('/','HomeController@index')->name('front.home');
    Route::get('/user/logout','HomeController@logout')->name('user.logout');
    Route::get('/cat/{name}','HomeController@getByCat')->name('front.cat');
    Route::get('/post/search','HomeController@searchpost')->name('post.search');
});