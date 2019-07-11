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

Route::prefix('masterdata/pemilih')->group(function() {
    Route::get('/', 'PemilihController@index')->name('pemilih.index');
    Route::get('/create', 'PemilihController@create')->name('pemilih.create');
    Route::post('/store', 'PemilihController@store')->name('pemilih.store');
    Route::post('/update/{id}', 'PemilihController@update')->name('pemilih.update');
    Route::get('/edit/{id}', 'PemilihController@edit')->name('pemilih.edit');
    Route::get('/delete/{id}', 'PemilihController@destroy')->name('pemilih.destroy');
});
