<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::group(['namespace' => 'TungTT\Auth\Http\Controllers', 'middleware' => 'web'], function () {
    Auth::routes();
});