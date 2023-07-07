<?php

use App\Http\Controllers\Opening_hourController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('/shop' , ShopController::class);
Route::apiResource('/product' , ShopController::class);
Route::apiResource('/category' , ShopController::class);
Route::apiResource('/image' , ShopController::class);
Route::apiResource('/review' , ReviewController::class);
Route::apiResource('/recipe' , RecipeController::class);
Route::apiResource('/opening_hour' , Opening_hourController::class);
Route::apiResource('/user' , UserController::class);
