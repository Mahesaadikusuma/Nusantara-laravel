<?php

use App\Http\Controllers\API\DestinationsController;
use App\Http\Controllers\API\FasilitasDestinationController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/destinations', [DestinationsController::class, 'index'])->name('api.destinations.index');
Route::post('/destinations', [DestinationsController::class, 'create'])->name('api.destinations.create');
Route::post('/destinations/update/{id}', [DestinationsController::class, 'update'])->name('api.destinations.update');
Route::delete('/destinations/delete/{id}', [DestinationsController::class, 'delete'])->name('api.destinations.delete');




// fasilatas api
Route::get('/fasilitas', [FasilitasDestinationController::class, 'index'])->name('api.destinations.index');
Route::post('/fasilitas', [FasilitasDestinationController::class, 'create'])->name('api.destinations.create');
Route::post('/fasilitas/update/{id}', [FasilitasDestinationController::class, 'update'])->name('api.destinations.update');

Route::delete('/fasilitas/delete/{id}', [FasilitasDestinationController::class, 'delete'])->name('api.destinations.delete');
// fasilatas api