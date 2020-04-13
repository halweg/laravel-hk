<?php

Route::group(['middleware' => 'employee_admin'], function () {
    Route::get('admin/mail-list', 'Admin\MailController@list');

    Route::resource('admin/employee', 'Admin\EmployeesController');

});

Route::get('admin/login', 'LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'LoginController@login')->name('admin.login');
Route::get('admin/logout', 'LoginController@logout')->name('admin.logout');

Route::get('/', 'IndexController@index')->name('index');
