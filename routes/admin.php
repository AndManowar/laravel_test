<?php

/*
 *
 * Admin Panel Routes
 *
 */

Route::get('/dashboard', 'MainpageController@index')->name('admin.dashboard');

Route::group(['prefix' => 'handbook'], function () {
    Route::get('', 'HandbookController@index')->name('admin.handbook');
    Route::get('/refresh-cache', 'HandbookController@refreshCache')->name('admin.handbook.refresh-cache');
    Route::post('/create', 'HandbookController@create')->name('admin.handbook.create');
    Route::post('/update/{id}', 'HandbookController@update')->name('admin.handbook.update');
    Route::get('/form/{id?}', 'HandbookController@form')->name('admin.handbook.form');
    Route::get('/delete/{id}', 'HandbookController@delete')->name('admin.handbook.delete');
    Route::get('/show-data/{id}', 'HandbookController@showData')->name('admin.handbook.show-data');
    Route::post('/save-data/{id}', 'HandbookController@saveData')->name('admin.handbook.save-data');
});