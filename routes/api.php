<?php

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



//User
Route::prefix('User')->group(function (){
    Route::post('Storm',[\App\Http\Controllers\UserController::class,'Storm']);
    Route::get('ShowAll', [\App\Http\Controllers\UserController::class, 'ShowAll']);
    Route::post('Check', [\App\Http\Controllers\UserController::class, 'ChkUser']);
    Route::post('CheckOtp', [\App\Http\Controllers\UserController::class, 'CheckOtp']);
    Route::post('{user}/update',[\App\Http\Controllers\UserController::class, 'update']);
    Route::delete('{user}/delete',[\App\Http\Controllers\UserController::class, 'delete']);


});
//Route::post('User/Check',[\App\Http\Controllers\UserController::class, 'ChkUser']);
//Laptop
Route::prefix('Laptop')->group(function (){
    Route::post('Storm',[\App\Http\Controllers\LaptopController::class,'Storm']);
    Route::Put('{Laptop}/Update',[\App\Http\Controllers\LaptopController::class,'Update']);
    Route::get('{Laptop}/Show',[\App\Http\Controllers\LaptopController::class,'Show']);
    Route::get('ShowAll',[\App\Http\Controllers\LaptopController::class,'ShowAll']);
    Route::delete('delete',[\App\Http\Controllers\LaptopController::class,'Delete']);

});
//sanctum
Route::middleware('auth:sanctum')->group(function (){
    Route::get('User/{user}/Show', [\App\Http\Controllers\UserController::class, 'Show']);

});
