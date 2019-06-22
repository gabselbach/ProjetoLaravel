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
})->name('home');

Route::resource('user','UserController');
Route::resource('imagem','ImagemController');
Route::post('imagemPerfil','UserController@imagemPerfil')->name('imagemPerfil');
//Route::post('addImagem','UserController@adicionaImagem')->name('addImagem');
Route::get('trocarSenha', function () {
    return view('auth/passwords/reset');
})->name('trocarSenha');
Route::post('editPassword','UserController@editPassword')->name('editPassword');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
