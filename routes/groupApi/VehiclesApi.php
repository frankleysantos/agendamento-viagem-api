<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VehiclesController;

Route::group([
    'prefix' => 'vehicles'
], function ($router) {
    Route::post('/store', [VehiclesController::class, 'storeOrUpdate']);
    Route::post('/update/{id}', [VehiclesController::class, 'storeOrUpdate']);
    Route::delete('/delete/{id}', [VehiclesController::class, 'delete']); 
    Route::get('/show', [VehiclesController::class, 'show']); 
    Route::get('/find/{id}', [VehiclesController::class, 'find']);
});