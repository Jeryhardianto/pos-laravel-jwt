<?php

use App\Http\Controllers\Api\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    Route::group(['middleware' => 'api','prefix' => 'v1'], function ($router) {
        Route::post('auth/register', RegisterController::class)->name('register');
        // Route::post('auth/login', [LoginController::class]);
        // Route::post('auth/logout', [RegisterController::class]);
        // Route::post('auth/refresh', 'AuthController@refresh');
    
    });

