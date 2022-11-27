<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\ListController;
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

Route::get('/mobil', [MobilController::class, 'index']);
Route::get('/mobil/{id}', [MobilController::class, 'show']);
Route::post('/mobil', [MobilController::class, 'store']);
Route::put('/mobil/{id}', [MobilController::class, 'update']);
Route::delete('/mobil/{id}', [MobilController::class, 'destroy']);

Route::get('/list', [ListController::class, 'index']);
Route::get('/list/{id}', [ListController::class, 'show']);
Route::post('/list', [ListController::class, 'store']);
Route::put('/list/{id}', [ListController::class, 'update']);
Route::delete('/list/{id}', [ListController::class, 'destroy']);
