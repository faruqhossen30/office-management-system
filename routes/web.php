<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendDashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\DepositController;
use App\Http\Controllers\Backend\OfficeController;
use App\Http\Controllers\Backend\ExpenseController;
use App\Models\Deposit;
use App\Models\Office;
use App\Models\Expense;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [BackendDashboardController::class, 'dashboard'])->name('dashboard');
// -----------------------------------Deposit-VIEW----------------------------------------------------------
Route::get('/deposit',[DepositController::class,'deposit'])->name('deposit');
Route::post('/deposit',[DepositController::class,'store'])->name('deposit.amount');
Route::get('/deposit-view',[DepositController::class,'deposit_view'])->name('deposit.view');

// ---------------edit deposit------------------
Route::get('deposit/edit/{id}',[DepositController::class,'edit'])->name('deposit.edit');
// --------------------update update------------
Route::post('deposit/update/{id}',[DepositController::class,'update'])->name('deposit.update');
// ------------------------delete Deposit---------------
Route::get('deposit/destroy/{id}',[DepositController::class,'destroy'])->name('deposit.destroy');


// --------------------------------Office-view---------------------------------

Route::get('/office',[OfficeController::class,'officeView'])->name('office');
Route::post('/office',[OfficeController::class,'store'])->name('office.data');
Route::get('/office-view',[OfficeController::class,'office_View'])->name('office.view');

// ---------------------------Office edit------------------------------------------
Route::get('office/edit/{id}', [OfficeController::class,'edit'])->name('office.edit');
// --------------------office update------------
Route::post('office/update/{id}',[OfficeController::class,'update'])->name('office.update');

// --------------------------office-delete-------------------------------------------
Route::get('office/destroy/{id}',[OfficeController::class,'destroy'])->name('office.destroy');
// --------------------------Expense------------------------------
Route::resource('expense', ExpenseController::class);


// --------------------Expense-section---------------------------


