<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\HelloMiddleware;
use App\Http\Controllers\HelloController;
use App\Http\Middleware\MyMiddleware;

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
    return view('welcome');
});

Route::get('/hello', [HelloController::class, 'index'])
    ->middleware('MyMW');

Route::get('/hello/{id}', [HelloController::class, 'index'])
    ->middleware('MyMW');

Route::get('/hello/other', [HelloController::class, 'other'])
    ->middleware(MyMiddleware::class);

