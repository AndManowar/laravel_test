<?php

/*
 *
 * Admin Panel Routes
 *
 */

Route::get('/dashboard', 'MainpageController@index')->name('admin.dashboard')->middleware('admin_rbac');

Route::get('/login/form', 'Auth\LoginController@showLoginForm')->name('admin.login.form');
Route::get('/login', 'Auth\LoginController@login')->name('admin.login');
Route::get('/logout', 'Auth\LoginController@logout')->name('admin.logout')->middleware('admin_rbac');

Route::get('/handbooks', 'HandbookController@index')->name('admin.handbooks')->middleware('admin_rbac');
Route::group(['prefix' => 'handbook', 'middleware' => ['admin_rbac']], function () {
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

Route::get('/settings', 'SettingsController@index')->name('admin.settings')->middleware('admin_rbac');
Route::group(['prefix' => 'setting', 'middleware' => ['admin_rbac']], function () {
    Route::post('/create', 'SettingsController@create')->name('admin.setting.create');
    Route::post('/update/{id}', 'SettingsController@update')->name('admin.setting.update');
    Route::get('/form/{id?}', 'SettingsController@form')->name('admin.setting.form');
    Route::get('/get-value-field', 'SettingsController@getValueField')->name('admin.setting.get-value-field');
    Route::get('/delete/{id}', 'SettingsController@delete')->name('admin.setting.delete');
});

Route::group(['prefix' => 'rbac', 'middleware' => ['admin_rbac']], function () {

    Route::get('', 'RbacController@index')->name('admin.rbac.index');
    Route::get('change-role-group', 'RbacController@changeRoleGroup')->name('admin.rbac.change-role-group');
    Route::get('/set-permissions', 'RbacController@addPermissionsToGroups')->name('admin.rbac.set-permissions');
    Route::get('/routes', 'RbacController@getRoutesWithoutPermissions')->name('admin.rbac.routes');

    Route::group(['prefix' => 'role', 'middleware' => ['admin_rbac']], function () {
        Route::post('/create', 'RbacController@createRole')->name('admin.rbac.role.create');
        Route::post('/update/{id}', 'RbacController@updateRole')->name('admin.rbac.role.update');
        Route::get('/delete/{id}', 'RbacController@deleteRole')->name('admin.rbac.role.delete');
        Route::get('/{id?}', 'RbacController@role')->name('admin.rbac.role');
    });

    Route::group(['prefix' => 'permission-group', 'middleware' => ['admin_rbac']], function () {
        Route::post('/create', 'RbacController@createPermissionGroup')->name('admin.rbac.permission-group.create');
        Route::post('/update/{id}', 'RbacController@updatePermissionGroup')->name('admin.rbac.permission-group.update');
        Route::get('/delete/{id}', 'RbacController@deletePermissionGroup')->name('admin.rbac.permission-group.delete');
        Route::get('/{id?}', 'RbacController@permissionGroup')->where('id', '[0-9]+')->name('admin.rbac.permission-group');
        Route::get('/remove-permission', 'RbacController@deleteFromGroup')->name('admin.rbac.permission-group.remove-permission');
        Route::get('/permissions/{id}', 'RbacController@showPermissionsByGroup')->name('admin.rbac.permission-group.permissions');
    });
});

Route::get('/users', 'UserController@index')->name('admin.users')->middleware('admin_rbac');
Route::group(['prefix' => 'user', 'middleware' => ['admin_rbac']], function () {
    Route::post('/edit/{id}', 'UserController@editUser')->name('admin.user.edit');
    Route::post('/create', 'UserController@createUser')->name('admin.user.create');
    Route::post('/profile/{id}', 'UserController@profile')->name('admin.user.profile');
    Route::get('/show/{id?}', 'UserController@form')->name('admin.user.form');
    Route::get('/delete/{id}', 'UserController@delete')->name('admin.user.delete');
});

Route::get('/admins', 'AdministratorController@index')->name('admin.admins')->middleware('admin_rbac');
Route::group(['prefix' => 'admin', 'middleware' => ['admin_rbac']], function () {
    Route::post('/edit/{id}', 'AdministratorController@editAdmin')->name('admin.admin.edit');
    Route::post('/create', 'AdministratorController@createAdmin')->name('admin.admin.create');
    Route::get('/show/{id?}', 'AdministratorController@form')->name('admin.admin.form');
    Route::get('/delete/{id}', 'AdministratorController@delete')->name('admin.admin.delete');
});