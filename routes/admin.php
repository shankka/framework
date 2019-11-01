<?php

Route::get('login', 'Admin\LoginController@login')->name('admin.login');
Route::get('hack', 'Admin\HackController@index')->name('admin.hack');
Route::post('hack', 'Admin\HackController@login')->name('admin.hack.login');

Route::middleware('auth.admin:admin')->group(function () {
    Route::get('/', 'Admin\HomeController@index')->name('admin.home');

    Route::group(['middleware' => ['permission:user.manage']], function () {
        Route::resource('users', 'Admin\UserController', ['as' => 'admin']);
    });

    Route::group(['middleware' => ['permission:admin.manage']], function () {
        Route::get('admins/assignRoles', 'Admin\AdminController@assignRoles')->name('admin.admins.assignRoles');
        Route::post('admins/assignRolesSave', 'Admin\AdminController@assignRolesSave')->name('admin.admins.assignRolesSave');
        Route::resource('admins', 'Admin\AdminController', ['as' => 'admin']);
    });

    Route::group(['middleware' => ['permission:system.manage']], function () {
        Route::get('system', 'Admin\SystemController@show')->name('admin.system.show');
        Route::get('system/edit', 'Admin\SystemController@edit')->name('admin.system.edit');
    });

    Route::group(['middleware' => ['permission:role.manage'], 'guard' => 'admin'], function () {
        Route::get('roles/assignPermissions', 'Admin\RoleController@assignPermissions')->name('admin.roles.assignPermissions');
        Route::post('roles/assignPermissionsSave', 'Admin\RoleController@assignPermissionsSave')->name('admin.roles.assignPermissionsSave');
        Route::resource('roles', 'Admin\RoleController', ['as' => 'admin']);
    });

    Route::group(['middleware' => ['permission:permission.manage']], function () {
        Route::resource('permissions', 'Admin\PermissionController', ['as' => 'admin']);
    });
});

