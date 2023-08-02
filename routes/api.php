<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use Illuminate\Routing\Router;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* Route::get('index', [AuthController::class, 'index']); */

/* Route::post('register', [AuthController::class, 'register']); */

Route::post('login', [AuthController::class, 'login']);

/* Route::get('logout', [AuthController::class, 'logout']); */

Route::middleware(['auth:sanctum'])->group(function(){
    //rutas protegidas por el auth de sanctum
    Route::get('index', [AuthController::class, 'index']);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('logout', [AuthController::class, 'logout']);
});
