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

Route::get('/delete/{superpower}', 
    [SuperpowerController::class,'destroy']);

Route::get('/update/{superpower}', 
    [SuperpowerController::class,'edit']);

Route::post('/update/{superpower}', 
    [SuperpowerController::class,'update']);

Route::get('/show/{superpower}', 
    [SuperpowerController::class,'show']);


Route::get('/planets', 
    [PlanetController::class,'index']);

Route::get('/formnewplanet', 
    [PlanetController::class,'create']);

Route::post('/saveplanet', 
    [PlanetController::class,'store']);

Route::get('/deleteplanet/{planet}', 
    [PlanetController::class,'destroy']);

Route::get('/updateplanet/{planet}', 
    [PlanetController::class,'edit']);

Route::post('/updateplanet/{planet}', 
    [PlanetController::class,'update']);

Route::get('/showplanet/{planet}', 
    [PlanetController::class,'show']);


Route::get('/superheroes', 
    [SuperheroController::class,'index']);

Route::get('/formnewsuperhero', 
    [SuperheroController::class,'create']);

Route::post('/savesuperhero', 
    [SuperheroController::class,'store']);

Route::get('/deletesuperhero/{superhero}', 
    [SuperheroController::class,'destroy']);

Route::get('/updatesuperhero/{superhero}', 
    [SuperheroController::class,'edit']);

Route::post('/updatesuperhero/{superhero}', 
    [SuperheroController::class,'update']);

Route::get('/showsuperhero/{superhero}', 
    [SuperheroController::class,'show']);