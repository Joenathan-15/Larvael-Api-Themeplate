<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('cors')->group(function(){
    Route::prefix('/api')->group(function(){
        Route::get('/show-employees',[EmployeeController::class , 'index']);
        Route::Post('/add-employee',[EmployeeController::class , 'store']);
        Route::get('/show-employee/{id}',[EmployeeController::class , 'show']);
        Route::Put('/update-employee/{id}',[EmployeeController::class , 'update']);
        Route::Delete('/delete-employee/{id}',[EmployeeController::class , 'destroy']);
    });
});