<?php

use App\Http\Controllers\StudentController;
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

Route::get('/',[StudentController::class,'home']);

Route::get('/addstudent',[StudentController::class,'addstudent']);

Route::post('/storestudent',[StudentController::class,'storestudent']);

Route::get('/edit/{id}',[StudentController::class,'editstudent']);

Route::get('/delete/{id}',[StudentController::class,'deletestudent']);

Route::post('/update',[StudentController::class,'updatestudent']);
