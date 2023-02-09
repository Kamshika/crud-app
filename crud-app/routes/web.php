<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('employee');
});

Route::get('/employee', [App\Http\Controllers\EmployeesController::class, 'index']);
Route::get('/employee-add', [App\Http\Controllers\EmployeesController::class, 'create']);
Route::post('/employee-add', [App\Http\Controllers\EmployeesController::class, 'store']);
Route::get('/employee-view/{id}', [App\Http\Controllers\EmployeesController::class, 'show']);
Route::get('/employee-edit/{id}', [App\Http\Controllers\EmployeesController::class, 'edit']);
Route::put('/employee-update/{id}', [App\Http\Controllers\EmployeesController::class, 'update']);
Route::get('/employee-delete/{id}', [App\Http\Controllers\EmployeesController::class, 'destroy']);
