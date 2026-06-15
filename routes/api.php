<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\api;

    Route::middleware('json')->group(function () {

 Route::get("/api",[api::class,'index']);
    });

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
