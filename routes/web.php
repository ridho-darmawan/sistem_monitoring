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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

Route::get('/telusur_perkara', 'HomeController@telusurPerkara')->name('welcome');

Route::get('/admin', function () {
    return view('admin/login');
})->name('login.admin');

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')->name('logout.admin');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/permohonan', 'HomeController@permohonan')->name('permohonan');
Route::post('/permohonan', 'HomeController@store_permohonan')->name('permohonan.store');
Route::get('/permohonan_create', 'HomeController@create_permohonan')->name('permohonan.create');
Route::get('/permohonan_detail/{id}', 'HomeController@detail_permohonan')->name('permohonan.detail');
Route::get('/unduh_template_surat_kuasa', 'HomeController@unduh_template_surat_kuasa')->name('unduhTemplateSuratKuasa');
Route::get('/unduh_template_surat_pernyataan', 'HomeController@unduh_template_surat_pernyataan')->name('unduhTemplateSuratPernyataan');
Route::patch('/upload_surat_permohonan', 'HomeController@upload_surat_permohonan')->name('upload.SuratPermohonan');
Route::patch('/edit_surat_permohonan', 'HomeController@edit_surat_permohonan')->name('edit.SuratPermohonan');
Route::patch('/upload_surat_kuasa', 'HomeController@upload_surat_kuasa')->name('upload.SuratKuasa');
Route::patch('/edit_surat_kuasa', 'HomeController@edit_surat_kuasa')->name('edit.SuratKuasa');
Route::patch('/upload_kk', 'HomeController@upload_kk')->name('upload.kk');
Route::patch('/edit_kk', 'HomeController@edit_kk')->name('edit.kk');
Route::get('/unduh_surat_pernyataan/{id}', 'HomeController@unduh_surat_pernyataan')->name('unduhSuratPernyataan');
Route::get('/unduh_surat_kuasa/{id}', 'HomeController@unduh_surat_kuasa')->name('unduhSuratKuasa');
Route::get('/unduh_kk/{id}', 'HomeController@unduh_kk')->name('unduhKK');

Route::post('/cekNomorPerkara', 'HomeController@cekNomorPerkara')->name('cekNomorPerkara.post');
Route::patch('/input_nomor_perkara', 'HomeController@inputNomorPerkara')->name('inputNomorPerkara');


Route::get('/monitoring_ac', 'HomeController@monitoring_ac')->name('monitoring_ac');
Route::get('/monitoring_kk', 'HomeController@monitoring_kk')->name('monitoring_kk');
Route::get('/monitoring_pengiriman_pos', 'HomeController@monitoring_pengiriman_pos')->name('monitoring_pengiriman_pos');


Route::post('/cekPerkaraPemohon', 'HomeController@cekPerkaraPemohon')->name('cekPerkaraPemohon.post');
Route::get('/getPerkaraPemohon', 'HomeController@getPerkaraPemohon')->name('getPerkaraPemohon.get');


