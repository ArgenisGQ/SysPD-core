<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Helpers\AdminHelper;
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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

/* Route::get('index', [AuthController::class, 'index']); */

/* Route::post('register', [AuthController::class, 'register']); */

/* Route::post('login', [AuthController::class, 'login']); */ /* ----- */

/* Route::get('logout', [AuthController::class, 'logout']); */


//rutas protegidas por el auth de sanctum
/* Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('index', [AuthController::class, 'index']);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('logout', [AuthController::class, 'logout']);
}); */


/* -------------------------------------------------------------------- */

/* Route::resource('users', UsersController::class)
           ->only(['index','show','store','update','destroy']); */


//rutas protegidas por el auth de JWT
/* Route::middleware(['api'])->group(function(){ */
    /* Route::get('index', [AuthController::class, 'index']); */

    /* Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']); */

    /* Route::get('index', [UsersController::class, 'index']);
    Route::post('store', [UsersController::class, 'store']);
    Route::post('show', [UsersController::class, 'show']);
    Route::post('update', [UsersController::class, 'update']);
    Route::post('destroy', [UsersController::class, 'destroy']); */

    /* Route::resource('users', UsersController::class)
           ->only(['index','show','store','update','destroy']); */
/* }); */


/* Route::middleware(['auth:sanctum'])->group(function() {

    Route::post('/logout', [AuthController::class, 'logout']);
}); */


/* Route::middleware('jwt.auth')->get('/user', function (Request $request) {
    $adminHelper = new AdminHelper();
    $user = $adminHelper->GetAuthUser();
    return response()->json(['data' => $user], 200);
}); */


Route::get('/home', [HomeController::class, 'home']);


/* Route::post('/register', [AuthController::class, 'register']); */
Route::post('/login', [AuthController::class, 'login'])->name('login');


/* Route::controller(AuthController::class)->group(function () { */
    /* Route::post('login', 'login'); */
    /* Route::post('register', 'register'); */

    /* Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::get('me', 'me'); */
/* }); */

/* Route::group([
    "middleware" => ["auth:api"]
], function(){ */

    /* Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refreshtoken', [AuthController::class, 'refreshToken']);
    Route::get('useractive', [AuthController::class, 'userActive']);

    Route::resource('users', UsersController::class)
           ->only(['index','show','store','update','destroy']); */

    /* Route::get("profile", [ApiController::class, "profile"]);
    Route::get("refresh", [ApiController::class, "refreshToken"]);
    Route::get("logout", [ApiController::class, "logout"]); */
/* }); */

Route::middleware(["auth:api"])->group(function(){

    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refreshtoken', [AuthController::class, 'refreshToken']);
    Route::get('useractive', [AuthController::class, 'userActive']);
    Route::get('respondwithtoken', [AuthController::class, 'respondWithToken']);


    Route::resource('users', UsersController::class)
           ->only(['index','show','store','update','destroy']);

});
