<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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
Route::get("/",function(){
    return view("home");
});
Route::get("/student",[StudentController::class,"index"]);
Route::get("/student/create",[StudentController::class,"create"]);
Route::post("/student/create",[StudentController::class,"add"]);
Route::get("/student/edit/{id}",[StudentController::class,"edit"]);
Route::post("/student/edit/{id}",[StudentController::class,"update"]);
Route::get("/student/delete/{id}",[StudentController::class,"delete"]);
Route::post("/student/search",[StudentController::class,"search"]);
Route::post("/student/{students}",[StudentController::class,"sorted"]);
/*
Route::get('/', function () {
    return view('home');
});
Route::get("/user",function (){
    return "this is user page";
});
*/
