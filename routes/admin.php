<?php

/*
 *
 * Admin Panel Routes
 *
 */

Route::get('/dashboard', 'MainpageController@index')->name('admin.dashboard');

Route::get('/handbooks', 'HandbookController@index')->name('admin.handbooks');

Route::group(['prefix' => 'handbook'], function () {
    Route::post('/create', 'HandbookController@create')->name('admin.handbook.create');
    Route::post('/update/{id}', 'HandbookController@update')->name('admin.handbook.update');
    Route::get('/form/{id?}', 'HandbookController@form')->name('admin.handbook.form');
    Route::get('/delete/{id}', 'HandbookController@delete')->name('admin.handbook.delete');
    Route::get('/show-data/{id}', 'HandbookController@showData')->name('admin.handbook.show-data');
    Route::post('/save-data/{id}', 'HandbookController@saveData')->name('admin.handbook.save-data');
    Route::get('/delete-data-item', 'HandbookController@deleteDataItem')->name('admin.handbook.delete-data-item');
    Route::get('/additional-handbook-field', 'HandbookController@additionalHandbookField')->name('admin.handbook.additional-handbook-field');
    Route::get('/add-new-data-field', 'HandbookController@addNewDataField')->name('admin.handbook.add-new-data-field');
    Route::get('/refresh-cache', 'HandbookController@refreshCache')->name('admin.handbook.refresh-cache');
});

Route::get('/settings', 'SettingsController@index')->name('admin.settings');

Route::group(['prefix' => 'setting'], function () {
    Route::post('/create', 'SettingsController@create')->name('admin.setting.create');
    Route::post('/update/{id}', 'SettingsController@update')->name('admin.setting.update');
    Route::get('/form/{id?}', 'SettingsController@form')->name('admin.setting.form');
    Route::get('/get-value-field', 'SettingsController@getValueField')->name('admin.setting.get-value-field');
    Route::get('/delete', 'SettingsController@delete')->name('admin.setting.delete');
});

Route::group(['prefix' => 'rbac'], function () {

    Route::get('', 'RbacController@index')->name('admin.rbac.index');

    Route::group(['prefix' => 'role'], function () {
        Route::post('/create', 'RbacController@createRole')->name('admin.rbac.role.create');
        Route::post('/update/{id}', 'RbacController@updateRole')->name('admin.rbac.role.update');
        Route::get('/delete/{id}', 'RbacController@deleteRole')->name('admin.rbac.role.delete');
        Route::get('/{id?}', 'RbacController@role')->name('admin.rbac.role');
    });

    Route::group(['prefix' => 'permission'], function () {
        Route::post('/create', 'RbacController@createPermission')->name('admin.rbac.permission.create');
        Route::post('/update/{id}', 'RbacController@updatePermission')->name('admin.rbac.permission.update');
        Route::get('/delete/{id}', 'RbacController@deletePermission')->name('admin.rbac.permission.delete');
        Route::get('/{id?}', 'RbacController@permission')->name('admin.rbac.permission');
    });

    Route::group(['prefix' => 'permission-group'], function () {
        Route::post('/create', 'RbacController@createPermissionGroup')->name('admin.rbac.permission-group.create');
        Route::post('/update/{id}', 'RbacController@updatePermissionGroup')->name('admin.rbac.permission-group.update');
        Route::get('/delete/{id}', 'RbacController@deletePermissionGroup')->name('admin.rbac.permission-group.delete');
        Route::get('/{id?}', 'RbacController@permissionGroup')->name('admin.rbac.permission-group');
    });

});