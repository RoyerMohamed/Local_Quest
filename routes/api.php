<?php

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

// Prefixing all my route for version control 
// Route Prefix = api

Route::apiResource('/shops', App\Http\Controllers\API\V1\ShopController::class);
Route::apiResource('/products',  App\Http\Controllers\API\V1\ProductController::class);
Route::apiResource('/categories',  App\Http\Controllers\API\V1\CategoryController::class);
Route::apiResource('/images',  App\Http\Controllers\API\V1\ImageController::class);
Route::apiResource('/reviews',  App\Http\Controllers\API\V1\ReviewController::class);
Route::apiResource('/recipes',  App\Http\Controllers\API\V1\RecipeController::class);
Route::apiResource('/opening_hours',  App\Http\Controllers\API\V1\Opening_hourController::class);
Route::apiResource('/users',  App\Http\Controllers\API\V1\UserController::class);
