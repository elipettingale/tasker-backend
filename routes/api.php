<?php

use App\Http\Controllers\Auth\SessionController as AuthSessionController;
use App\Http\Controllers\Auth\RegistrationController as AuthRegistrationController;
use App\Http\Controllers\Projects\ProjectController;
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

Route::post('session', [AuthSessionController::class, 'login']);
Route::delete('session', [AuthSessionController::class, 'logout']);
Route::post('registration', [AuthRegistrationController::class, 'register']);

Route::group([
    'middleware' => ['auth:sanctum']
], function () {
    Route::resource('projects', ProjectController::class);
});
