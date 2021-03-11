<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BodyController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::apiResources([
        'body' => 'App\Http\Controllers\BodyController',
        'city' => 'App\Http\Controllers\CityController',
        'drive' => 'App\Http\Controllers\DriveController',
        'transmission' => 'App\Http\Controllers\TransmissionController',
        'wheel' => 'App\Http\Controllers\WheelController',
    ]);

    Route::middleware('auth:api')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/user', [AuthController::class, 'user']);
        Route::post('/get', [BodyController::class, 'index']);
    });
