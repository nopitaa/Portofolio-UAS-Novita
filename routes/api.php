<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\AuthController;





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


//public routes
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/motor/{id}', [MotorController::class, 'show']);



Route::middleware('auth:sanctum')->group(function (){
    Route::resource('/formulir', FormulirController::class)->except('edit','show','delete')->middleware('admin');
    Route::resource('/motor', MotorController::class)->except('edit','store','delete')->middleware('admin');
    Route::post('/motor', [MotorController::class, 'store'])->middleware('admin');
    Route::get('/formulir', [FormulirController::class, 'index'])->middleware('admin');
    Route::get('/formulir/{id}', [FormulirController::class, 'show'])->middleware('admin');
    

    Route::get('/motor', [MotorController::class, 'index']);
    Route::resource('/formulir', FormulirController::class)->except('edit','store');
    Route::post('/formulir', [FormulirController::class, 'store']);
    Route::post('/logout', [AuthController::class, 'logout']);
});