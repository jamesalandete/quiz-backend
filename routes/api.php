<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserAnswerController;
use Illuminate\Auth\Events\Login;
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

Route::middleware('auth:sanctum')->get('/validate', function () {
    // Esta ruta solo se accederá si el token es válido
    return true;
});

Route::group(['prefix' => 'auth'], function () {
    // Rutas que están dentro del grupo
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
});
// , 'middleware' => 'auth:api'
Route::group(['prefix' => 'private', 'middleware' => 'auth:sanctum'], function () {
    // Rutas que están dentro del grupo
    Route::apiResource('questions', QuestionController::class);
    Route::apiResource('answers', AnswerController::class);
    Route::apiResource('user-answers', UserAnswerController::class);
    Route::post('user-answers/score', [UserAnswerController::class, 'score']);
});