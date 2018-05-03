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


Route::get('/post/get-categories', 'PostController@getCategories');

Route::group(['prefix' => 'ajax'], function () {
    Route::get('/additional-handbook-field', 'AjaxController@additionalHandbookField')->name('ajax.additional-handbook-field');
    Route::get('/add-new-data-field', 'AjaxController@addNewDataField')->name('ajax.add-new-data-field');
});