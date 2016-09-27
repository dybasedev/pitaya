<?php

Route::get('admin/login', 'AuthController@login');
Route::post('admin/login', ['uses' => 'AuthController@login', 'as' => 'admin.login']);