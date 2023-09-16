<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\IbgeController;

Route::group([
    'prefix' => 'ibge',
    'middleware' => 'auth'
], function ($router) {
    Route::post('/state/store', [IbgeController::class, 'storeState']);
    Route::post('/citie/store', [IbgeController::class, 'storeCities']);
});