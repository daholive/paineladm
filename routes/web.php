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
    return redirect()->action('HomeController@index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/empresas','EmpresaController@index');
Route::get('/empresas/show/{id}','EmpresaController@show');
Route::post('/empresas/edit','EmpresaController@edit');
Route::get('/empresas/novo','EmpresaController@create');
Route::get('/empresas/delete/{id}','EmpresaController@destroy');

Route::get('/funcionarios','FuncionarioController@index');
Route::get('/funcionarios/show/{id}','FuncionarioController@show');
Route::post('/funcionarios/edit','FuncionarioController@edit');
Route::get('/funcionarios/novo','FuncionarioController@create');
Route::get('/funcionarios/delete/{id}','FuncionarioController@destroy');
