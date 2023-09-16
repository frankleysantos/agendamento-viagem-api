<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PassengersController;

Route::group([
    'prefix' => 'passengers',
    'middleware' => 'auth'
], function ($router) {
    Route::post('/store', [PassengersController::class, 'storeOrUpdate']);
    Route::post('/update/{id}', [PassengersController::class, 'storeOrUpdate']);
    Route::delete('/delete/{id}', [PassengersController::class, 'delete']); 
    Route::get('/show', [PassengersController::class, 'show']); 
    Route::get('/find/{id}', [PassengersController::class, 'find']);
});