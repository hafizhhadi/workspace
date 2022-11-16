<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\TaskController;
use App\Http\Controllers\User\WorkspaceController;

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

Route::get('/', function () { return view('welcome'); });

Auth::routes();

Route::controller(WorkspaceController::class)->group(function(){
    Route::get('workspace/index', 'index')->name('workspace.index');
    Route::post('workspace/store', 'store')->name('workspace.store');
    Route::get('workspace/show/{workspace}', 'show')->name('workspace.show');
    Route::get('workspace/delete/{workspace}', 'delete')->name('workspace.delete');
});

Route::controller(TaskController::class)->group(function(){
    Route::post('task/store/{workspace}', 'store')->name('task.store');
});