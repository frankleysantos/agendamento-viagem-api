<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StatesCitiesController;

Route::group([
    'prefix' => 'states',
    'middleware' => 'auth'
], function ($router) {
    Route::get('/', [StatesCitiesController::class, 'showStates']); 
    Route::get('{state_id}/cities/', [StatesCitiesController::class, 'showCities']);
});