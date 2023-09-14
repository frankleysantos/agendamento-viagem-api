<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\IbgeController;

Route::group([
    'prefix' => 'ibge'
], function ($router) {
    Route::post('/state/store', [IbgeController::class, 'storeState']);
    Route::post('/citie/store', [IbgeController::class, 'storeCities']);
});