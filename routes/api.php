<?php

use App\Http\Controllers\API\KtpController;
use App\Http\Controllers\API\PropinsiController;
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

Route::get('ktp', [KtpController::class, 'index']);
Route::get('propinsi', [PropinsiController::class, 'index']);
Route::post('ktp/addKtp', [KtpController::class, 'store']);
Route::get('ktp/detail/{id}', [KtpController::class, 'show']);
Route::post('ktp/update/{id}', [KtpController::class, 'update']);
Route::delete('ktp/delete/{id}', [KtpController::class, 'destroy']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
