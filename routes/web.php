<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperpowerController;
use App\Http\Controllers\PlanetController;
use App\Http\Controllers\SuperheroController;

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

Route::get('/powers', 
    [SuperpowerController::class,'index']);

Route::get('/formnew', 
    [SuperpowerController::class,'create']);

Route::post('/save', 
    [SuperpowerController::class,'store']);

Route::get('/delete/{id}', 
    [SuperpowerController::class,'destroy']);

Route::get('/update/{id}', 
    [SuperpowerController::class,'edit']);

Route::post('/update/{id}', 
    [SuperpowerController::class,'update']);


Route::get('/planets', 
    [PlanetController::class,'index']);

Route::get('/formnewplanet', 
    [PlanetController::class,'create']);

Route::post('/saveplanet', 
    [PlanetController::class,'store']);

Route::get('/deleteplanet/{id}', 
    [PlanetController::class,'destroy']);

Route::get('/updateplanet/{id}', 
    [PlanetController::class,'edit']);

Route::post('/updateplanet/{id}', 
    [PlanetController::class,'update']);

Route::get('/showplanet/{id}', 
    [PlanetController::class,'show']);


Route::get('/superheroes', 
    [SuperheroController::class,'index']);

Route::get('/formnewsuperhero', 
    [SuperheroController::class,'create']);

Route::post('/savesuperhero', 
    [SuperheroController::class,'store']);

Route::get('/deletesuperhero/{id}', 
    [SuperheroController::class,'destroy']);

Route::get('/updatesuperhero/{id}', 
    [SuperheroController::class,'edit']);

Route::post('/updatesuperhero/{id}', 
    [SuperheroController::class,'update']);