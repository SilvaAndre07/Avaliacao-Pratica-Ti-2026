<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StartupController;



Route::get('/startups', [StartupController::class, 'index']);
Route::post('/startups', [StartupController::class, 'store']);


Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'timestamp' => now(),
    ]);
});
