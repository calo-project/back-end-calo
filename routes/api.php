<?php

use App\Http\Controllers\Api\Customer\AuthCustomerController;
use App\Http\Controllers\Api\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('user/login', [AuthCustomerController::class, 'login']);
Route::post('user/register', [AuthCustomerController::class, 'register']);

Route::middleware(['auth:sanctum', 'pengguna'])->group(function (){
    Route::post('user/logout', [AuthCustomerController::class, 'logout']);
    Route::get('user/logged', [AuthCustomerController::class, 'logged']);
    Route::put('user/update-profile', [AuthCustomerController::class, 'update_profile']);
    Route::put('user/update-password', [AuthCustomerController::class, 'update_password']);
    Route::put('user/update-wallet', [AuthCustomerController::class, 'update_wallet']);
});

Route::middleware('auth:sanctum')->group(function (){
    Route::get('event', [EventController::class, 'index']);
    Route::post('event/create', [EventController::class, 'create']);
    Route::post('event/update', [EventController::class, 'update']);
});

