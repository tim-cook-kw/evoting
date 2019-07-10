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

Route::prefix('masterdata/datapemilih')->group(function() {
    Route::get('/', 'DatapemilihController@index')->name('datapemilih.index');
    Route::get('/create', 'DatapemilihController@create')->name('datapemilih.create');
    Route::post('/store', 'DatapemilihController@store')->name('datapemilih.store');
    Route::post('/update/{id}', 'DatapemilihController@update')->name('datapemilih.update');
    Route::get('/edit/{id}', 'DatapemilihController@edit')->name('datapemilih.edit');
    Route::get('/delete/{id}', 'DatapemilihController@destroy')->name('datapemilih.destroy');
});
