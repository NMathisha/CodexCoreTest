<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompanyController;
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

// Auth::routes();

Route::get('/login',[LoginController::class,'ShowLogin']);
Route::post('/UserLogin',[LoginController::class,'CheckLoginUser']);
Route::post('/logout',[LoginController::class,'logout']);

Route::middleware(['companyLogin'])->group(function () {

Route::get('/Companies',[CompanyController::class,'show']);
Route::post('/submitcompany',[CompanyController::class,'store']);
Route::post('/showedit',[CompanyController::class,'edit']);
Route::post('/deletecompany',[CompanyController::class,'destroy']);




Route::get('/Employee',[EmployeeController::class,'show']);
Route::post('/addEmployee',[EmployeeController::class,'store']);
Route::post('/showEmpEdit',[EmployeeController::class,'edit']);
Route::post('/deleteemployee',[EmployeeController::class,'destroy']);


});
