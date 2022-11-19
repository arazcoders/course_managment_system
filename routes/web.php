<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers;
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

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('index_admin');
Route::get('/admin/create', [App\Http\Controllers\AdminController::class, 'create']);
Route::get('/admin/{id}', [App\Http\Controllers\AdminController::class, 'show'])->name('show_user');
Route::get('/admin/{id}/edit', [App\Http\Controllers\AdminController::class, 'edit']);
Route::post('/admin', [App\Http\Controllers\AdminController::class, 'store'])->name('store_user');
Route::put('/admin/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('update_user');
route::delete('/admin/{id}','App\Http\Controllers\AdminController@destroy')->name('delete_user');
route::get('/course/create','App\Http\Controllers\AdminController@course_create')->name('course_create');
route::post('/course/store','App\Http\Controllers\AdminController@course_store')->name('course_store');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/student', [App\Http\Controllers\StudentController::class, 'index'])->name('index_student');
Route::put('/student/{id}', [App\Http\Controllers\StudentController::class, 'update'])->name('update_student');
Route::get('/teacher', [App\Http\Controllers\TeacherController::class, 'index'])->name('index_teacher');
Route::get('/roleSelection', [App\Http\Controllers\Auth\LoginController::class, 'role_selection']);
Route::post('/redirect_to_panels', [App\Http\Controllers\Auth\LoginController::class, 'redirect_to_panels']);




