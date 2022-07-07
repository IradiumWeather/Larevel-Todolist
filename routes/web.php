<?php

use App\Http\Controllers\TacheController;
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

Route::get('/',[TacheController::class,'index'])->name('index');

Route::post('/',[TacheController::class,'addtask'])->name('addTask');

Route::get('/{tache}',[TacheController::class,'taskState'])->name('state');

Route::delete('/delete/{tache}',[TacheController::class,'deleteTask'])->name('supp');

Route::get('/modifier/{tache}',[TacheController::class,'modifier'])->name('modifier');

Route::post('/modifier/{tache}',[TacheController::class,'update'])->name('updateTask');
