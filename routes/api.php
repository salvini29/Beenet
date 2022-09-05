<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/loginUser', [App\Http\Controllers\ApiController::class, 'loginUser'])->name('loginUser')->middleware('apikey.validator');
Route::post('/registerUser', [App\Http\Controllers\ApiController::class, 'registerUser'])->name('registerUser')->middleware('apikey.validator');
Route::post('/getColmenasUser', [App\Http\Controllers\ApiController::class, 'getColmenasUser'])->name('getColmenasUser')->middleware('apikey.validator');
Route::post('/createColmena', [App\Http\Controllers\ApiController::class, 'createColmenaApi'])->name('createColmenaApi')->middleware('apikey.validator');