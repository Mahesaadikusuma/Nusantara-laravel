<?php

use App\Http\Controllers\API\ArticleDestinationContoller;
use App\Http\Controllers\API\DestinationsController;
use App\Http\Controllers\API\EventDestinationController;
use App\Http\Controllers\API\FasilitasDestinationController;
use App\Http\Controllers\API\UserRateDestinationController;
use App\Models\UserRateDestination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// destination api
Route::get('/destinations', [DestinationsController::class, 'index'])->name('api.destinations.index');
Route::get('/destinations/{slug}', [DestinationsController::class, 'show'])->name('api.destinations.show');
Route::post('/destinations', [DestinationsController::class, 'create'])->name('api.destinations.create');
Route::post('/destinations/update/{id}', [DestinationsController::class, 'update'])->name('api.destinations.update');
Route::delete('/destinations/delete/{id}', [DestinationsController::class, 'delete'])->name('api.destinations.delete');
// destination api

// fasilatas api
Route::get('/fasilitas', [FasilitasDestinationController::class, 'index'])->name('api.fasilitas.index');
Route::post('/fasilitas', [FasilitasDestinationController::class, 'create'])->name('api.fasilitas.create');
Route::post('/fasilitas/update/{id}', [FasilitasDestinationController::class, 'update'])->name('api.fasilitas.update');
Route::delete('/fasilitas/delete/{id}', [FasilitasDestinationController::class, 'delete'])->name('api.fasilitas.delete');
// fasilatas api


// event destination api
Route::get('/event-destination', [EventDestinationController::class, 'index'])->name('api.event.index');
Route::get('/event-destination/{slug}', [EventDestinationController::class, 'show'])->name('api.event.show');
Route::post('/event-destination', [EventDestinationController::class, 'create'])->name('api.event.create');
Route::post('/event-destination/update/{id}', [EventDestinationController::class, 'edit'])->name('api.event.edit');

Route::delete('/event-destination/delete/{id}', [EventDestinationController::class, 'delete'])->name('api.event.delete');
// event destination api


// Article
Route::get('/article-destination', [ArticleDestinationContoller::class, 'index'])->name('api.article.index');
Route::get('/article-destination/{slug}', [ArticleDestinationContoller::class, 'show'])->name('api.article.show');
Route::post('/article-destination', [ArticleDestinationContoller::class, 'create'])->name('api.article.create');
Route::post('/article-destination/update/{id}', [ArticleDestinationContoller::class, 'edit'])->name('api.article.edit');
Route::delete('/article-destination/delete/{id}', [ArticleDestinationContoller::class, 'delete'])->name('api.article.delete');

// Article


Route::get('/user-rate-destination', [UserRateDestinationController::class, 'index'])->name('api.user-rate.index');
Route::post('/user-rate-destination', [UserRateDestinationController::class, 'create'])->name('api.user-rate.create');
Route::post('/user-rate-destination/update/{id}', [UserRateDestinationController::class, 'update'])->name('api.user-rate.update');
Route::delete('/user-rate-destination/delete/{id}', [FasilitasDestinationController::class, 'delete'])->name('api.user-rate.delete');