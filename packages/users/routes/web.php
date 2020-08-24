<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users', 'namespace' => 'TungTT\Users\Http\Controllers', 'middleware' => 'web'], function () {
    Route::get('/', 'UserController@index')->name('users.index');
    Route::get('/create', 'UserController@create')->name('users.create');
    Route::post('/check-unique', 'UserController@checkUnique');
});