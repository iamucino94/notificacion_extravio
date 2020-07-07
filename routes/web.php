<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return View::make('main')->nest('child', 'home');
});

Route::get('/new-report', function () {
    return View::make('main')->nest('child', 'new-report');
});

Route::get('/reports', function () {
    return View::make('main')->nest('child', 'reports');
});
