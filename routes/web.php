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
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin/login');
})->name('login.admin');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')->name('logout.admin');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/permohonan', 'HomeController@permohonan')->name('permohonan');
Route::post('/permohonan', 'HomeController@store_permohonan')->name('permohonan.store');
Route::get('/permohonan_create', 'HomeController@create_permohonan')->name('permohonan.create');
