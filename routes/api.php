<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PreferencesController;


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


Route::get('/articles', [ArticleController::class, 'index']);
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);
Route::post('reset-password', [AuthController::class, 'resetPassword']);


Route::middleware('auth:sanctum')->post('preferences', [PreferencesController::class, 'store']);
Route::middleware('auth:sanctum')->get('preferences', [PreferencesController::class, 'index']);
Route::middleware('auth:sanctum')->get('personalized-feed', [ArticleController::class, 'personalizedFeed']);






