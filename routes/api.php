<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\TodolistController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(AuthController::class)->group(function(){
    Route::post('/login', 'login');
    Route::post('/register', 'register');
});
Route::controller(AuthController::class)->middleware(['auth:sanctum'])->group(function(){
    Route::post('/logout', 'logout');
});
Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/todos',[TodolistController::class,'index']);
    Route::post('/create',[TodolistController::class,'store']);
    Route::put('/update/{id}',[TodolistController::class,'update']);
    Route::delete('/delete/{id}',);[TodolistController::class,'destroy'];

});