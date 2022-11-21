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

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['middleware'=>'auth'], function() {

    Route::get('/superpowers', [App\Http\Controllers\SuperpowerController::class, 'index'])->name('superpowers.index');

    Route::get('/superpowers/show/{superpower}', [App\Http\Controllers\SuperpowerController::class, 'show'])->name('superpowers.show');

    Route::get('/superpowers/create', [App\Http\Controllers\SuperpowerController::class, 'create'])->name('superpowers.create');

    Route::post('/superpowers/store', [App\Http\Controllers\SuperpowerController::class, 'store'])->name('superpowers.store');


    Route::get('/planets', [App\Http\Controllers\PlanetController::class, 'index'])->name('planets.index');

    Route::get('/planets/create', [App\Http\Controllers\PlanetController::class, 'create'])->name('planets.create');
    
    Route::get('/planets/show/{planet}', [App\Http\Controllers\PlanetController::class, 'show'])->name('planets.show');
    
    Route::post('/planets/store', [App\Http\Controllers\PlanetController::class, 'store'])->name('planets.store');


    Route::get('/superheroes', [App\Http\Controllers\SuperheroController::class, 'index'])->name('superheroes.index');

    Route::get('/superheroes/create', [App\Http\Controllers\SuperheroController::class, 'create'])->name('superheroes.create');
    
    Route::get('/superheroes/show/{superhero}', [App\Http\Controllers\SuperheroController::class, 'show'])->name('superheroes.show');
    
    Route::post('/superheroes/store', [App\Http\Controllers\SuperheroController::class, 'store'])->name('superheroes.store');
    

    Route::group(['middleware'=>['auth','role:admin']], function() {

        //Afegir rutes on es modifiqui o esborri la informació.

        Route::get('/superpowers/destroy/{superpower}', [App\Http\Controllers\SuperpowerController::class, 'destroy'])->name('superpowers.destroy');

        Route::get('/superpowers/edit/{superpower}', [App\Http\Controllers\SuperpowerController::class, 'edit'])->name('superpowers.edit');

        Route::post('/superpowers/update/{superpower}', [App\Http\Controllers\SuperpowerController::class, 'update'])->name('superpowers.update');


        Route::get('/planets/destroy/{planet}', [App\Http\Controllers\PlanetController::class, 'destroy'])->name('planets.destroy');
    
        Route::get('/planets/edit/{planet}', [App\Http\Controllers\PlanetController::class, 'edit'])->name('planets.edit');
    
        Route::post('/planets/update/{planet}', [App\Http\Controllers\PlanetController::class, 'update'])->name('planets.update');


        Route::get('/superheroes/destroy/{superhero}', [App\Http\Controllers\SuperheroController::class, 'destroy'])->name('superheroes.destroy');
        
        Route::get('/superheroes/edit/{superhero}', [App\Http\Controllers\SuperheroController::class, 'edit'])->name('superheroes.edit');
    
        Route::post('/superheroes/update/{superhero}', [App\Http\Controllers\SuperheroController::class, 'update'])->name('superheroes.update');

        Route::post('/superheroes/{superhero}/assignsuperpowers', [App\Http\Controllers\SuperheroController::class, 'attachSuperpowers'])->name('superheroes.assignsuperpowers');

        Route::post('/superheroes/{superhero}/detachsuperpowers', [App\Http\Controllers\SuperheroController::class, 'detachSuperpowers'])->name('superheroes.detachsuperpowers');

        // Superheroes - Superpowers
        Route::get('/superheroes/{superhero}/superpowers', [App\Http\Controllers\SuperheroController::class, 'editSuperpowers'])->name('superheroes.editsuperpowers');

    });

    });
    
    /*Route::group(['middleware'=>['auth','role:normal']], function () {

        Route::get('/accesnormal', function() {
            echo "No tens permisos d'administrador.";
        });

    });*/
