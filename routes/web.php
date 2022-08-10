<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
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
    return view('welcome');
});

Route::get('/home', [AdminController::class,'index']);
Route::get('/register', [AdminController::class,'register']);
Route::get('/login', [AdminController::class,'login']);
Route::get('/logout', [AdminController::class,'logout']);

Route::post('/user-login', [AdminController::class,'submit_login']);

//Department Resources- no need to indicate the class.
Route::get('depart/{id}/delete',[DepartmentController::class,'destroy']);
Route::resource('depart',DepartmentController::class);


//Employee Resources- no need to indicate the class.
Route::get('employee/{id}/delete',[EmployeeController::class,'destroy']);
Route::resource('employee',EmployeeController::class);
