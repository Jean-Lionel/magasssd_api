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

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('product', App\Http\Controllers\ProductController::class);

Route::apiResource('lot', App\Http\Controllers\LotController::class);


Route::apiResource('type', App\Http\Controllers\TypeController::class);

Route::apiResource('stock', App\Http\Controllers\StockController::class);

Route::apiResource('address', App\Http\Controllers\AddressController::class);

Route::apiResource('type-client', App\Http\Controllers\TypeClientController::class);

Route::apiResource('reception', App\Http\Controllers\ReceptionController::class);

Route::apiResource('detail-reception', App\Http\Controllers\DetailReceptionController::class);
