<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DriversController;

Route::group([
    'prefix' => 'drivers',
    'middleware' => 'auth'
], function ($router) {
    Route::post('/store', [DriversController::class, 'storeOrUpdate']);
    Route::post('/update/{id}', [DriversController::class, 'storeOrUpdate']);
    Route::delete('/delete/{id}', [DriversController::class, 'delete']); 
    Route::get('/show', [DriversController::class, 'show']); 
    Route::get('/find/{id}', [DriversController::class, 'find']);
});