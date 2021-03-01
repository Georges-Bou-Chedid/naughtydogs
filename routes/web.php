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
Route::post('/enableUser', [App\Http\Controllers\IndexController::class, 'getUser'])->middleware('auth');
Route::post('/DeleteUser', [App\Http\Controllers\IndexController::class, 'deleteUser'])->middleware('auth');
Route::get('/editUser', [App\Http\Controllers\Auth\RegisterController::class, 'geteditUser'])->middleware('auth');
Route::put('/editUser/{User}', [App\Http\Controllers\Auth\RegisterController::class, 'storeUser'])->middleware('auth');

//History
Route::get('/MyHistory', [App\Http\Controllers\HistoryController::class, 'UserHistory'])->middleware('auth');
Route::get('/allHistory', [App\Http\Controllers\HistoryController::class, 'History'])->middleware('auth');
Route::post('/allHistory', [App\Http\Controllers\HistoryController::class, 'getHistory'])->middleware('auth');
//Create History
Route::post('/allHistoryNew', [App\Http\Controllers\HistoryController::class, 'store'])->middleware('auth');
Route::get('/allHistory/CreateHistory', [App\Http\Controllers\HistoryController::class, 'create'])->middleware('auth');
//Update, Delete Record
Route::get('/allHistory/{History}/editpet', [App\Http\Controllers\HistoryController::class, 'editpet'])->middleware('auth');
Route::get('/allHistory/{History}/look', [App\Http\Controllers\HistoryController::class, 'look'])->middleware('auth');
Route::put('/allHistory/{History}', [App\Http\Controllers\HistoryController::class, 'update'])->middleware('auth');
Route::delete('/allHistory/{History}', [App\Http\Controllers\HistoryController::class, 'delete'])->middleware('auth');

//PET
Route::put('/allHistory/edit/{Pet}', [App\Http\Controllers\PetController::class, 'update'])->middleware('auth');

//Vaccine
Route::post('/allHistory/edit/vaccine/{History}', [App\Http\Controllers\VaccineController::class, 'create'])->middleware('auth');
Route::put('/allHistory/edit/vaccine1/{Vaccine}', [App\Http\Controllers\VaccineController::class, 'update'])->middleware('auth');
Route::delete('/allHistory/edit/delete/{Vaccine}', [App\Http\Controllers\VaccineController::class, 'delete'])->middleware('auth');

//deworming
Route::post('/allHistory/edit/deworming/{History}', [App\Http\Controllers\DewormingController::class, 'create'])->middleware('auth');
Route::put('/allHistory/edit/deworming1/{Deworming}', [App\Http\Controllers\DewormingController::class, 'update'])->middleware('auth');
Route::delete('/allHistory/edit/deletedeworming/{Deworming}', [App\Http\Controllers\DewormingController::class, 'delete'])->middleware('auth');

//annualvaccin
Route::post('/allHistory/edit/annual/{History}', [App\Http\Controllers\AnnualvaccinController::class, 'create'])->middleware('auth');
Route::put('/allHistory/edit/annual1/{Annualvaccin}', [App\Http\Controllers\AnnualvaccinController::class, 'update'])->middleware('auth');
Route::delete('/allHistory/edit/deleteannualvaccin/{Annualvaccin}', [App\Http\Controllers\AnnualvaccinController::class, 'delete'])->middleware('auth');

//trimestre
Route::post('/allHistory/edit/trimestre/{History}', [App\Http\Controllers\TrideworController::class, 'create'])->middleware('auth');
Route::put('/allHistory/edit/trimestre1/{Tridewor}', [App\Http\Controllers\TrideworController::class, 'update'])->middleware('auth');
Route::delete('/allHistory/edit/deletetrimestre/{Tredewor}', [App\Http\Controllers\TrideworController::class, 'delete'])->middleware('auth');

//AntiKystes
Route::post('/allHistory/edit/kystes/{History}', [App\Http\Controllers\KysteController::class, 'create'])->middleware('auth');
Route::put('/allHistory/edit/kystes1/{Kyste}', [App\Http\Controllers\KysteController::class, 'update'])->middleware('auth');
Route::delete('/allHistory/edit/deletekystes/{Kyste}', [App\Http\Controllers\KysteController::class, 'delete'])->middleware('auth');

//Monthly
Route::post('/allHistory/edit/monthly/{History}', [App\Http\Controllers\MonthlyController::class, 'create'])->middleware('auth');
Route::put('/allHistory/edit/monthly1/{Monthly}', [App\Http\Controllers\MonthlyController::class, 'update'])->middleware('auth');
Route::delete('/allHistory/edit/deletemonthlys/{Monthly}', [App\Http\Controllers\MonthlyController::class, 'delete'])->middleware('auth');

//previous
Route::post('/allHistory/edit/previous/{History}', [App\Http\Controllers\PreviousController::class, 'create'])->middleware('auth');
Route::put('/allHistory/edit/previous1/{Previous}', [App\Http\Controllers\PreviousController::class, 'update'])->middleware('auth');
Route::delete('/allHistory/edit/deleteprevious/{Previous}', [App\Http\Controllers\PreviousController::class, 'delete'])->middleware('auth');

//Register
Route::get('/registernewclient' , [App\Http\Controllers\Auth\RegisterController::class, 'registerview'])->middleware('auth');
Route::post('/registernewclient' , [App\Http\Controllers\Auth\RegisterController::class, 'create'])->middleware('auth');

Auth::routes();

Route::get('/', [App\Http\Controllers\IndexController::class ,'index']);
Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class , 'logout']);




