<?php

use App\Http\Controllers\Backend\AssetController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendDashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\DepositController;
use App\Http\Controllers\Backend\PaymentSystemController;
use App\Http\Controllers\Backend\OfficeController;
use App\Http\Controllers\Backend\ExpenseController;
use App\Http\Controllers\Backend\ExpenseListController;
use App\Http\Controllers\Backend\AssetTypeController;
use App\Models\Deposit;
use App\Models\Office;
use App\Models\Expense;
use App\Models\ExpenseList;
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

Route::prefix('admin')->group(function () {

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/dashboard', [BackendDashboardController::class, 'dashboard'])->name('dashboard');



        // -----------------------------------Deposit-VIEW----------------------------------------------------------
        Route::get('/deposit', [DepositController::class, 'create'])->name('deposit');
        Route::post('/deposit', [DepositController::class, 'store'])->name('deposit.amount');
        Route::get('/deposit-view', [DepositController::class, 'deposit_view'])->name('deposit.view');
        Route::get('/deposit-view/week', [DepositController::class, 'depositeListThisWeek'])->name('deposit.view.week');
        Route::get('/deposit-view/month', [DepositController::class, 'depositeListThisMonth'])->name('deposit.view.month');
        // -----------------------------------------edit deposit------------------------------------------------------
        Route::get('deposit/edit/{id}', [DepositController::class, 'edit'])->name('deposit.edit');
        // ------------------------------------------update update----------------------------------------------------
        Route::post('deposit/update/{id}', [DepositController::class, 'update'])->name('deposit.update');
        // ------------------------------------------delete Deposit--------------------------------------------------
        Route::get('deposit/destroy/{id}', [DepositController::class, 'destroy'])->name('deposit.destroy');
        // --------------------------------Payment-System-----------------------------
        Route::resource('payment', PaymentSystemController::class);


        // --------------------------------------------Office-view-----------------------------------------------------
        Route::get('/office', [OfficeController::class, 'officeView'])->name('office');
        Route::post('/office', [OfficeController::class, 'store'])->name('office.data');
        Route::get('/office-view', [OfficeController::class, 'office_View'])->name('office.view');
        // ---------------------------------------------------Office edit------------------------------------------
        Route::get('office/edit/{id}', [OfficeController::class, 'edit'])->name('office.edit');
        // --------------------------------------------office update-----------------------------------------------
        Route::post('office/update/{id}', [OfficeController::class, 'update'])->name('office.update');
        // --------------------------------------------------office-delete-------------------------------------------
        Route::get('office/destroy/{id}', [OfficeController::class, 'destroy'])->name('office.destroy');
        // ----------------------------------------------------------Expense------------------------------------------


        Route::resource('expense', ExpenseController::class);
        // --------------------Expense-section------------------------------------
        Route::resource('expenselist', ExpenseListController::class);
        // ---------------------Asset- Type---------------------------------------
        Route::resource('asset', AssetController::class);
        Route::resource('assettype', AssetTypeController::class);

    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
