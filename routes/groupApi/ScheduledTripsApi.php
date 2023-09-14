<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ScheduledTripsController;

Route::group([
    'prefix' => 'scheduledTrips'
], function ($router) {
    Route::post('/store', [ScheduledTripsController::class, 'storeOrUpdate']);
    Route::post('/update/{id}', [ScheduledTripsController::class, 'storeOrUpdate']);
    Route::delete('/delete/{id}', [ScheduledTripsController::class, 'delete']); 
    Route::get('/show', [ScheduledTripsController::class, 'show']); 
    Route::get('/find/{id}', [ScheduledTripsController::class, 'find']);
});