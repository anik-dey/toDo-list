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
    return view('auth.login');

});
Route::get('/register', function () {
    return view('auth.register');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/landing', [App\Http\Controllers\LandingController::class, 'index'])->name('landing');
//Admin Task
//Route::post('/input-task', [App\Http\Controllers\LandingController::class, 'saveTask'])->name('inputTask');
Route::post('/input-task', 'LandingController@saveTask')->name('inputTask');
Route::get('/task-delete/{id}','LandingController@deleteTask')->name('taskDelete');
