<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/',function(){
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/profilepage','HomeController@index');
Route ::get('/after_register','ProfileController@register');

Route::post('/post/create','ProfileController@create');
Route::post('/post/edit','ProfileController@edit');
Route::post('/post/delete','ProfileController@delete');
Route::post('/photo','ProfileController@savephoto');
Route::get('/getphoto/{filename}','ProfileController@getphoto');
Route::get('/getpic/{filename}','ProfileController@getpicture');



