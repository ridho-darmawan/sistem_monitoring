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
Route::get('/permohonan_detail/{id}', 'HomeController@detail_permohonan')->name('permohonan.detail');
Route::get('/unduh_surat_kuasa', 'HomeController@unduh_surat_kuasa')->name('unduhSuratKuasa');
Route::get('/unduh_surat_pernyataan', 'HomeController@unduh_surat_pernyataan')->name('unduhSuratPernyataan');
Route::patch('/upload_surat_permohonan', 'HomeController@upload_surat_permohonan')->name('upload.SuratPermohonan');
Route::patch('/edit_surat_permohonan', 'HomeController@edit_surat_permohonan')->name('edit.SuratPermohonan');
Route::patch('/upload_surat_kuasa', 'HomeController@upload_surat_kuasa')->name('upload.SuratKuasa');
Route::patch('/edit_surat_kuasa', 'HomeController@edit_surat_kuasa')->name('edit.SuratKuasa');
Route::patch('/upload_kk', 'HomeController@upload_kk')->name('upload.kk');
Route::patch('/edit_kk', 'HomeController@edit_kk')->name('edit.kk');
