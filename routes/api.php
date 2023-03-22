<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Auth Controller
use App\Http\Controllers\Api\Auth\MeController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CetagoryController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
// Cetagory Controller
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\RefreshTokenController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
    // API v1
    // Authentication
    Route::group(['prefix' => 'v1'], function ($router) {
        Route::post('auth/register', RegisterController::class)->name('register');
        Route::post('auth/login', LoginController::class)->name('login');
        Route::post('auth/logout', LogoutController::class)->name('logout');
        Route::post('auth/me', MeController::class)->name('me');    
        Route::post('auth/refreshToken', RefreshTokenController::class)->name('refreshToken');    
    });   

    // Cetagory
    Route::group(['prefix' => 'v1'], function ($router) {
        Route::get('cetagory', [CetagoryController::class, 'index'] )->name('cetagory.index');
        Route::get('cetagory/{id}', [CetagoryController::class, 'getCetagoryById'])->name('cetagory.getCetagoryById');
        Route::post('cetagory', [CetagoryController::class, 'store'])->name('cetagory.store');
        Route::put('cetagory/{id}', [CetagoryController::class, 'update'])->name('cetagory.update');
    }); 
    // Products
    Route::group(['prefix' => 'v1'], function ($router) {
        Route::apiResource('product', ProductController::class,['as'=> 'api']);
    });



