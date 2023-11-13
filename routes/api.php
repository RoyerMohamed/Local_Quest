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

Route::middleware('auth:sanctum')->group( function () {
    Route::apiResource('/products',  App\Http\Controllers\API\V1\ProductController::class);
    Route::apiResource('/images',  App\Http\Controllers\API\V1\ImageController::class);
    Route::get('/images/getImageById/{id}',  [App\Http\Controllers\API\V1\ImageController::class , 'getImageById']);
    Route::apiResource('/reviews',  App\Http\Controllers\API\V1\ReviewController::class);
});

Route::apiResource('/recipes',  App\Http\Controllers\API\V1\RecipeController::class);
Route::apiResource('/opening_hours',  App\Http\Controllers\API\V1\OpeningHourController::class);
Route::apiResource('/shops', App\Http\Controllers\API\V1\ShopController::class);
Route::get('/sortShops', [App\Http\Controllers\API\V1\ShopController::class , 'sortShops']);
//Route::get('/truc', [App\Http\Controllers\API\V1\ShopController::class , 'test']);
Route::get('/shops/sortByCategories/{id}', [App\Http\Controllers\API\V1\ShopController::class , 'sortByCategories']);
Route::apiResource('/department',  App\Http\Controllers\API\V1\DepartmentController::class);
Route::apiResource('/categories',  App\Http\Controllers\API\V1\CategoryController::class);
Route::apiResource('/users',  App\Http\Controllers\API\V1\UserController::class);
Route::put('/update-password/{user}',  [App\Http\Controllers\API\V1\UserController::class , "updatepassword"])->name('updatePasswors');
Route::post('/login' , [App\Http\Controllers\API\V1\LoginController::class , 'loginUser'])->name('login');