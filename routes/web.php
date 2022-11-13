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
    return view('welcome');
});

Auth::routes();

//Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/workspace/store', [App\Http\Controllers\User\WorkspaceController::class, 'store'])->name('workspace:store');
Route::get('/workspace/show/{workspace}', [App\Http\Controllers\User\WorkspaceController::class, 'show'])->name('workspace:show');


Route::post('/task/store/{workspace}', [App\Http\Controllers\User\TaskController::class, 'store'])->name('task:store');
// Route::get('/home/show/{task}', [App\Http\Controllers\User\TaskController::class, 'show'])->name('task:show');