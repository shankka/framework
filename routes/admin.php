<?php

Route::get('/', 'Admin\HomeController@index')->name('admin.home');

Route::resource('users', 'Admin\UserController', ['as' => 'admin']);
Route::resource('admins', 'Admin\AdminController', ['as' => 'admin']);
Route::get('system', 'Admin\SystemController@show')->name('admin.system.show');
Route::get('system/edit', 'Admin\SystemController@edit')->name('admin.system.edit');
