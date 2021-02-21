<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

//Create Plan
Route::post('/', [App\Http\Controllers\IndexController::class, 'store'])->middleware('auth');
Route::get('/CreatePlan', [App\Http\Controllers\IndexController::class, 'create'])->middleware('auth');

//Update, Delete Plan
Route::get('/{Pricinglist}/edit', [App\Http\Controllers\IndexController::class, 'edit'])->middleware('auth');
Route::put('/{Pricinglist}', [App\Http\Controllers\IndexController::class, 'update'])->middleware('auth');
Route::delete('/{Pricinglist}', [App\Http\Controllers\IndexController::class, 'delete'])->middleware('auth');

//edit user
Route::post('/editUser', [App\Http\Controllers\IndexController::class, 'getUser'])->middleware('auth');
Route::post('/DeleteUser', [App\Http\Controllers\IndexController::class, 'deleteUser'])->middleware('auth');

//History
Route::get('/MyHistory', [App\Http\Controllers\HistoryController::class, 'UserHistory'])->middleware('auth');
Route::get('/allHistory', [App\Http\Controllers\HistoryController::class, 'History'])->middleware('auth');
Route::post('/allHistory', [App\Http\Controllers\HistoryController::class, 'getHistory'])->middleware('auth');
//Create History
Route::post('/allHistoryNew', [App\Http\Controllers\HistoryController::class, 'store'])->middleware('auth');
Route::get('/allHistory/CreateHistory', [App\Http\Controllers\HistoryController::class, 'create'])->middleware('auth');
//Update, Delete Record
Route::get('/allHistory/{History}/edit', [App\Http\Controllers\HistoryController::class, 'edit'])->middleware('auth');
Route::put('/allHistory/{History}', [App\Http\Controllers\HistoryController::class, 'update'])->middleware('auth');
Route::delete('/allHistory/{History}', [App\Http\Controllers\HistoryController::class, 'delete'])->middleware('auth');

Auth::routes();

Route::get('/', [App\Http\Controllers\IndexController::class ,'index']);
Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class , 'logout']);




