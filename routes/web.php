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

// Route::get('/', 'App\Http\Controllers\HomeController');

Route::get('/', 'App\Http\Controllers\pagecontroller@index');
Route::get('/projects/cancel/{id}', 'App\Http\Controllers\projectcontroller@cancel');
Route::resource('client','App\Http\Controllers\clientcontroller');
Route::resource('projects','App\Http\Controllers\projectcontroller');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
