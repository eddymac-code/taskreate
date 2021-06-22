<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\TasksController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\TasksController as AdminTasksController;
use App\Http\Controllers\Auth\UserManagerLoginController;
use App\Http\Controllers\Usermanager\UsersController as UserManagerUsersController;

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

/*
Route::get('/admin/index', function () {
    return view('admin.index');
})->name('admin.index');

Route::get('/usermanager/index', function () {
    return view('usermanager.index');
})->name('usermanager.index');
*/

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/admin', [AdminLoginController::class, 'index'])->name('adminlogin');
Route::post('/admin', [AdminLoginController::class, 'store']);

Route::get('/usermanager', [UserManagerLoginController::class, 'index'])->name('usermanagerlogin');
Route::post('/usermanager', [UserManagerLoginController::class, 'store']);

Route::get('/admin/index', function () {
    return view('admin.index');
})->name('admin.index');

Route::get('/usermanager/index', function () {
    return view('usermanager.index');
})->name('usermanager.index');

Route::resource('tasks', TasksController::class);

Route::get('/tasks/show', [TasksController::class, 'show'])->name('tasks.show');

Route::get('admin/users', [UsersController::class, 'index'])->name('admin.users.index');
Route::post('admin/users', [UsersController::class, 'store'])->name('admin.users.store');
Route::get('admin/users/create', [UsersController::class, 'create'])->name('admin.users.create');
Route::get('admin/users/{user}', [UsersController::class, 'show'])->name('admin.users.show');
Route::put('admin/users/{user}', [UsersController::class, 'update'])->name('admin.users.update');
Route::delete('admin/users/{user}', [UsersController::class, 'destroy'])->name('admin.users.destroy');
Route::get('admin/users/{user}/edit', [UsersController::class, 'edit'])->name('admin.users.edit');

Route::get('admin/tasks', [AdminTasksController::class, 'index'])->name('admin.tasks.index');
Route::post('admin/tasks', [AdminTasksController::class, 'store'])->name('admin.tasks.store');
Route::get('admin/tasks/create', [AdminTasksController::class, 'create'])->name('admin.tasks.create');
Route::get('admin/tasks/{task}', [AdminTasksController::class, 'show'])->name('admin.tasks.show');
Route::put('admin/tasks/{task}', [AdminTasksController::class, 'update'])->name('admin.tasks.update');
Route::delete('admin/tasks/{task}', [AdminTasksController::class, 'destroy'])->name('admin.tasks.destroy');
Route::get('admin/tasks/{task}/edit', [AdminTasksController::class, 'edit'])->name('admin.tasks.edit');

Route::get('usermanager/users', [UserManagerUsersController::class, 'index'])->name('usermanager.users.index');
Route::post('usermanager/users', [UserManagerUsersController::class, 'store'])->name('usermanager.users.store');
Route::get('usermanager/users/create', [UserManagerUsersController::class, 'create'])->name('usermanager.users.create');
Route::get('usermanager/users/{user}', [UserManagerUsersController::class, 'show'])->name('usermanager.users.show');
Route::put('usermanager/users/{user}', [UserManagerUsersController::class, 'update'])->name('usermanager.users.update');
Route::delete('usermanager/users/{user}', [UserManagerUsersController::class, 'destroy'])->name('usermanager.users.destroy');
Route::get('usermanager/users/{user}/edit', [UserManagerUsersController::class, 'edit'])->name('usermanager.users.edit');