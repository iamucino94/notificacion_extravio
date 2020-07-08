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

Route::resource('report', 'ReportController');

Route::get('/report/{id}/accept', function($id){
    return \App\Http\Controllers\ReportController::acceptReport($id);
});

Route::get('/report/{id}/send_correction', function($id){
    return \App\Http\Controllers\ReportController::sendCorrection($id);
});