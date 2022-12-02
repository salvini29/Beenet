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
Route::post('/modify_colmena', [App\Http\Controllers\BaseController::class, 'modifyColmena'])->name('modifyColmena')->middleware('auth');
Route::post('/delete_colmena', [App\Http\Controllers\BaseController::class, 'deleteColmena'])->name('deleteColmena')->middleware('auth');
Route::get('/redirect_success', [App\Http\Controllers\BaseController::class, 'redirectSuccess'])->name('redirectSuccess')->middleware('auth');
Route::get('/redirect_failed', [App\Http\Controllers\BaseController::class, 'redirectFailed'])->name('redirectFailed')->middleware('auth');

Route::get('/', [App\Http\Controllers\BaseController::class, 'landing'])->name('landing');
Route::post('/searchBarPost', [App\Http\Controllers\BaseController::class, 'searchBarPost'])->name('searchBarPost');
Route::get('/dashboard/{codigo}', [App\Http\Controllers\BaseController::class, 'dashboard'])->name('dashboard');
Route::get('/control/{codigo}', [App\Http\Controllers\BaseController::class, 'control'])->name('control');


