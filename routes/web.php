<?php

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
    return view('home');
});
//Route::get('/create','UserController@create');
Route::resource('user','UserController');
Route::resource('/editPassword','UserController@editPassword');
//Route::get('/n/','UserController@destroy');
//Route::post('user/store','UserController@store');
//{{route('user.destroy', $usuario->id)}}
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
