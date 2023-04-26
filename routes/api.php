<?php

use App\Http\Controllers\API\studentController;
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

Route::get('student', [studentController::class, 'index']);
Route::post('student/store', [studentController::class, 'store']);
Route::get('student/show/{id}', [studentController::class, 'show']);
Route::get('student/showByAddress/{search}', [studentController::class, 'searchByAddress']);
Route::get('student/showByUsername/{username}', [studentController::class, 'searchByUsername']);
Route::post('student/update/{id}', [studentController::class, 'update']);
Route::get('student/destroy/{id}', [studentController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
