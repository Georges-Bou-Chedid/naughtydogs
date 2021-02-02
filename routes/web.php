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

Route::get('/registerOwner', [App\Http\Controllers\auth\RegisterOwnerController::class, 'create']);

//Create Plan
Route::post('/', [App\Http\Controllers\IndexController::class, 'store']);
Route::get('/CreatePlan', [App\Http\Controllers\IndexController::class, 'create']);

//Update, Delete Plan
Route::get('/{Pricinglist}/edit', [App\Http\Controllers\IndexController::class, 'edit']);
Route::put('/{Pricinglist}', [App\Http\Controllers\IndexController::class, 'update']);
Route::delete('/{Pricinglist}', [App\Http\Controllers\IndexController::class, 'delete']);

//Fetch
Route::get('/Fetching', [App\Http\Controllers\IndexController::class, 'fetch']);

//History
Route::get('/MyHistory', [App\Http\Controllers\HistoryController::class, 'UserHistory']);
Route::get('/allHistory', [App\Http\Controllers\HistoryController::class, 'History']);
Route::post('/allHistory', [App\Http\Controllers\HistoryController::class, 'getHistory']);
//Create History
Route::post('/allHistoryNew', [App\Http\Controllers\HistoryController::class, 'store']);
Route::get('/allHistory/CreateHistory', [App\Http\Controllers\HistoryController::class, 'create']);
//Update, Delete History
Route::get('/allHistory/{History}/edit', [App\Http\Controllers\HistoryController::class, 'edit']);
Route::put('/allHistory/{History}', [App\Http\Controllers\HistoryController::class, 'update']);
Route::delete('/allHistory/{History}', [App\Http\Controllers\HistoryController::class, 'delete']);




Auth::routes();

//Show all Products And Show one by ID (Authenticated) And Logout
Route::get('/', [App\Http\Controllers\IndexController::class ,'index']);
Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class , 'logout']);
Route::get('/{Product}', [App\Http\Controllers\IndexController::class, 'show']);

//Create Owner
Route::post('/registow', [App\Http\Controllers\auth\RegisterOwnerController::class, 'store']);

//Notifications for Purchase 
Route::post('/cart' , [App\Http\Controllers\MailController::class, 'store']);
Route::get('/cart/notifications', [App\Http\Controllers\MailController::class, 'show']);


