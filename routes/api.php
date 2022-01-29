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
Route::get('/customers/tst', [CustomerController::class, 'test']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/customers', [CustomerController::class, 'index']);
    Route::get('/customers/{dni}', [CustomerController::class, 'show']);
    Route::get('/search/d/{dni}', [CustomerController::class, 'searchByName']);//duplicated
    Route::get('/search/e/{email}', [CustomerController::class, 'searchByEmail']);

    Route::post('/customers', [CustomerController::class, 'store']);//duplicated
    //doesn't need it?
    Route::put('/customers/{id}', [CustomerController::class, 'update']);
    Route::delete('/customers', [CustomerController::class, 'destroy']);
});

