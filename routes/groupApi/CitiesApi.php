<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CitiesController;

Route::group([
    'prefix' => 'auth/noticia',
    'middleware' => 'auth'
], function ($router) {
    Route::post('/store', [CitiesController::class, 'store']);
    Route::post('/update/{id}', [CitiesController::class, 'update']);
    Route::delete('/delete/{id}', [CitiesController::class, 'delete']); 
    Route::get('/show', [CitiesController::class, 'show']); 
    Route::get('/find/{id}', [CitiesController::class, 'find']);
});