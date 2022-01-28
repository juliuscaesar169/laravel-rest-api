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

Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/customers/{id}', [CustomerController::class, 'show']);
// Route::resource('products', CustomerController::class);
Route::get('/search/d/{dni}', [CustomerController::class, 'searchByName']);
Route::get('/search/e/{email}', [CustomerController::class, 'searchByEmail']);


Route::post('/customers', [CustomerController::class, 'store']);

//doesn't need it?
Route::put('/customers/{id}', [CustomerController::class, 'update']);

Route::delete('/customers', [CustomerController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
