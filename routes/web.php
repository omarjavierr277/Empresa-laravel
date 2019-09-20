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
    return view('auth.login');
});

Auth::routes();
Route::resource('empresas', 'EmpresasController')->middleware('auth');
Route::resource('usuarios', 'UsuariosController')->middleware('auth');
Route::resource('categorias', 'CategoriasController')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');
