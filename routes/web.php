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


Route::get('/TestLogin', function () {
    return view('login');
});


//route::get('/student','App\Http\Controllers\StudentController@index');
//route::get('/student/create','App\Http\Controllers\StudentController@create');
//route::post('/student','App\Http\Controllers\StudentController@store');
//route::get('/student/{id}/edit','App\Http\Controllers\StudentController@edit');
//route::put('/student/{id}','App\Http\Controllers\StudentController@update');
//
//route::delete('/student/{id}','App\Http\Controllers\StudentController@destroy');
//
//route::get('/student/{id}','App\Http\Controllers\StudentController@show');
//



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/Test', [App\Http\Controllers\StudentController::class, 'Test_Roles'])->name('Test');


/*route::middleware('can:manage_users')->group(function(){



});*/



Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index']);
Route::get('/admin/create', [App\Http\Controllers\AdminController::class, 'create']);
Route::get('/admin/{id}', [App\Http\Controllers\AdminController::class, 'show'])->name('show_user');
Route::get('/admin/{id}/edit', [App\Http\Controllers\AdminController::class, 'edit']);
Route::post('/admin', [App\Http\Controllers\AdminController::class, 'store'])->name('store_user');
Route::put('/admin/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('update_user');
route::delete('/admin/{id}','App\Http\Controllers\AdminController@destroy')->name('delete_user');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
