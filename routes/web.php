<?php

Route::get('/', function () {
    if (!Auth::check()) {
        return view('auth.login');
    } 
    else {
        return redirect('/home');
    }
    return abort(404);
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('{path}',"HomeController@index")->where( 'path', '([A-z\d-\/_.]+)?' );

