<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\TasksController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AdminLoginController;

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
    return view('taskreate');
})->name('home');

Route::get('/tasks', function () {
    return view('user.tasks.index');
});

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/admin', [AdminLoginController::class, 'index'])->name('adminlogin');
Route::post('/admin', [AdminLoginController::class, 'store']);

/*
Route::get('/tasks', [TasksController::class, 'index'])->name('tasks');
Route::post('/tasks', [TasksController::class, 'store']);
Route::delete('/tasks', [TasksController::class, 'show'])->name('task.show');
Route::delete('/tasks', [TasksController::class, 'destroy'])->name('task.delete');
*/

Route::resource('tasks', TasksController::class);

Route::get('/tasks/show', [TaskController::class, 'show'])->name('tasks.show');