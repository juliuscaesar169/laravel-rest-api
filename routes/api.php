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
Route::get('/customers/tst/{dni}', [CustomerController::class, 'show']);
// Route::resource('products', CustomerController::class);
Route::get('/search/d/{dni}', [CustomerController::class, 'searchByName']);
Route::get('/search/e/{email}', [CustomerController::class, 'searchByEmail']);


Route::post('/customers', [CustomerController::class, 'store']);

//doesn't need it?
Route::put('/customers/{dni}', [CustomerController::class, 'update']);

Route::delete('/customers', [CustomerController::class, 'delete']);

// test route
Route::get('/customers/tst', [CustomerController::class, 'test']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
