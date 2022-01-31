<?php

use App\Http\Controllers\CustomerController;
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

Route::get('/customers', [CustomerController::class, 'index']);//testing route
Route::get('/customers/{search}', [CustomerController::class, 'show']);
// Route::resource('products', CustomerController::class);

Route::post('/customers', [CustomerController::class, 'store']);

Route::delete('/customers/{dni}', [CustomerController::class, 'delete']);

// test route
Route::get('/customers/tst', [CustomerController::class, 'test']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
