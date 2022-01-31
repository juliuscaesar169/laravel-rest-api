<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;
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

// Public routes
Route::post('/register', [AuthController::class, 'register']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/customers/{search}', [CustomerController::class, 'show']);
    // Route::resource('products', CustomerController::class);
    Route::post('/customers', [CustomerController::class, 'store']);
    Route::delete('/customers/{dni}', [CustomerController::class, 'delete']);
    // testing routes
    Route::get('/customers', [CustomerController::class, 'index']);
    Route::get('/customers/tst', [CustomerController::class, 'test']);
});

