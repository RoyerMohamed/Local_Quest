<?php

use App\Http\Controllers\API\V1\CategoryController;
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

// Prefixing all my route for version control 
// Route Prefix = api/V1
Route::group(['prefix' => 'V1'] , function() {

    Route::apiResource('/shop' , App\Http\Controllers\API\V1\ShopController::class);    
    Route::apiResource('/product' ,  App\Http\Controllers\API\V1\ProductController::class);
    Route::apiResource('/category' ,  App\Http\Controllers\API\V1\CategoryController::class);
    Route::apiResource('/image' ,  App\Http\Controllers\API\V1\ImagesController::class);
    Route::apiResource('/review' ,  App\Http\Controllers\API\V1\ReviewController::class);
    Route::apiResource('/recipe' ,  App\Http\Controllers\API\V1\RecipeController::class);
    Route::apiResource('/opening_hour' ,  App\Http\Controllers\API\V1\Opening_hourController::class);
    Route::apiResource('/user' ,  App\Http\Controllers\API\V1\UserController::class);
}); 