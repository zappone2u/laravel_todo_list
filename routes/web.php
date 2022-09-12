<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

// Home Page
Route::get('/', [AuthController::class, 'home']);

//Login
Route::get('/login', [AuthController::class, 'getLogin']);
Route::post('/login', [AuthController::class, 'postLogin']);
Route::get('/logout', '\App\Http\Controllers\AuthController@logout');

//register
Route::get('/register', function () {return view('register');});

//tasks get
Route::get('/tasks', [TasksController::class, 'listmanager']);

//tasks create
Route::get('/newtask', function () {return view('newtask');})->name('tasks.newtask');
Route::post('/newtask', [TasksController::class, 'store']);

//tasks delete
Route::post('/deletetask', [TasksController::class, 'delete']);

//tasks finish
Route::post('/finishtask', [TasksController::class, 'finish']);
Route::post('/progresstask', [TasksController::class, 'progress']);

//tasks edit
Route::get('/taskedit', [TasksController::class, 'taskedit'])->name('tasks.taskedit');
Route::put('/taskedit', [TasksController::class, 'update']);


// Registration and User Profile
Route::post('/user', [UserController::class,'store']);
Route::put('/user', [UserController::class,'update']);
Route::get('/user', [UserController::class,'edit']);

Route::get('/reset-password', [NewPasswordController::class, 'create']);
Route::put('/reset-password', [NewPasswordController::class, 'store']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
