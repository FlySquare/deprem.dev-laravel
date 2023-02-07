<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'locations'], function () {
    Route::get('', [\App\Http\Controllers\Api\ContentController::class,'get']);
    Route::get('get/{id}', [\App\Http\Controllers\Api\ContentController::class,'find']);
    Route::post('add', [\App\Http\Controllers\Api\ContentController::class,'store']);
});

Route::get('links', [\App\Http\Controllers\Api\StaticController::class,'links']);

