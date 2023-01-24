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

Route::get('/hola', function () {
    echo "hola";
});

// Route::get('/planets', [App\Http\Controllers\api\planetesController::class, 'index']);

// Route::get('/planets/{id}', [App\Http\Controllers\api\planetesController::class, 'show']);

// Route::delete('/planets/{id}', [App\Http\Controllers\api\planetesController::class, 'destroy']);

// Route::post('/planets/{id}', [App\Http\Controllers\api\planetesController::class, 'store']);

// Route::put('/planets/{id}', [App\Http\Controllers\api\planetesController::class, 'update']);


Route::resource('/planets',App\Http\Controllers\api\planetesController::class);

