<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StartupController;

Route::redirect('/', '/startups');

Route::view('/startups', 'startups.index')->name('startups.index');
Route::view('/startups/create', 'startups.create')->name('startups.create');