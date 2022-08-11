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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/create_colmena', [App\Http\Controllers\BaseController::class, 'createColmena'])->name('createColmena')->middleware('auth');

Route::get('/', [App\Http\Controllers\BaseController::class, 'landing'])->name('landing');
Route::get('/dashboard', [App\Http\Controllers\BaseController::class, 'dashboard'])->name('dashboard');


Route::get('/testxd', [App\Http\Controllers\BaseController::class, 'testxd'])->name('testxd')->middleware('auth');
