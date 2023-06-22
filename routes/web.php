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

Route::get('/','PageController@beranda');
Route::get('/beranda','PageController@beranda')->name('beranda');



Route::get('/login','AuthController@getLogin')->middleware('guest')->name('login');
Route::post('/login','AuthController@postLogin')->middleware('guest')->name('post-login');
Route::get('/profile','AuthController@profile')->middleware('auth')->name('profile');
Route::get('/edit-profile','AuthController@editProfile')->middleware('auth')->name('edit-profile');
Route::put('/update-profile','AuthController@updateProfile')->middleware('auth')->name('update-profile');
Route::get('/edit-password','AuthController@editPassword')->middleware('auth')->name('edit-password');
Route::patch('/update-password','AuthController@updatePassword')->middleware('auth')->name('update-password');
Route::get('logout','AuthController@logout')->middleware('auth')->name('logout');

Route::get('/users/{user}/reset-password','UserController@resetPassword')->middleware('auth')->name('users.reset-password');
Route::put('/users/{user}/update-password','UserController@updatePassword')->middleware('auth')->name('users.update-password');
Route::resource('users','UserController')->middleware('auth');

Route::get('/instansi','InstansiController@index')->name('instansi.index');
Route::get('/instansi/{id}/edit','InstansiController@edit')->middleware('auth')->name('instansi.edit');
Route::put('/instansi/{id}','InstansiController@update')->middleware('auth')->name('instansi.update');

Route::get('/transaksi/cari','TransaksiController@cari')->middleware('auth')->name('transaksi.cari');
Route::get('/transaksi/pemasukan','TransaksiController@indexPemasukan')->middleware('auth')->name('transaksi.pemasukan.index');
Route::get('/transaksi/pemasukan/create','TransaksiController@createPemasukan')->middleware('auth')->name('transaksi.pemasukan.create');
Route::get('/transaksi/pengeluaran','TransaksiController@indexPengeluaran')->middleware('auth')->name('transaksi.pengeluaran.index');
Route::get('/transaksi/pengeluaran/create','TransaksiController@createPengeluaran')->middleware('auth')->name('transaksi.pengeluaran.create');
Route::get('/transaksi/laporan','TransaksiController@laporan')->name('transaksi.laporan');
Route::get('/transaksi/laporan/download','TransaksiController@laporanPDF')->name('transaksi.download');
Route::resource('transaksi','TransaksiController')->except(['show','create'])->middleware('auth');

