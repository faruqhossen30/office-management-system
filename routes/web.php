<?php

use App\Http\Controllers\Backend\AdminController;
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
use App\Http\Controllers\Backend\ExpenseListFilterController;
use App\Http\Controllers\Backend\AssetListFilterController;
use App\Http\Controllers\Backend\BalanceController;
use App\Http\Controllers\Backend\BankController;
use App\Http\Controllers\Backend\Setting\SettingController;
use App\Http\Controllers\Backend\EmployeePositionController;
use App\Http\Controllers\Backend\EmployeeInformationController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\SalarySetupController;
use App\Http\Controllers\Backend\SalaryController;
use App\Http\Controllers\Backend\AdvanceSalaryController;
use App\Http\Controllers\Backend\EmployeeSalaryAPI;
use App\Http\Controllers\Backend\ExpenseListPdf;
use App\Http\Controllers\Backend\LoneController;
use App\Http\Controllers\Backend\SubAssetTypeController as BackendSubAssetTypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubAssetTypeController;
use App\Http\Controllers\Backend\SubExpenseController;
use App\Models\Deposit;
use App\Models\Office;
use App\Models\Expense;
use App\Models\ExpenseList;
use App\Models\SalarySetUp;

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
    // return view('backend.dashboard');
    return redirect()->route('dashboard');
})->middleware('auth');

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
        Route::get('/deposit-view/date', [DepositController::class, 'depositeListThisDate'])->name('deposit.view.date');
        Route::get('/deposit-view/finddate', [DepositController::class, 'depositFindDate'])->name('deposit.view.finddate');


        // <------------------------------deposit-show---------------------------------------->
        Route::get('/deposit-show/show/{id}', [DepositController::class, 'show'])->name('deposit.show');
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


        // --------------------Expense-section------------------------------------
        Route::resource('expense', ExpenseController::class);
        Route::resource('expenselist', ExpenseListController::class);
        Route::get('expencelist-filter/week', [ExpenseListFilterController::class, 'expenseListeByWeek'])->name('expense.list.week');
        Route::get('expencelist-filter/month', [ExpenseListFilterController::class, 'expenseListeByMonth'])->name('expense.list.month');
        Route::get('expencelist-filter/date', [ExpenseListFilterController::class, 'expenseListeByDate'])->name('expense.list.date');
        Route::get('expencelist-filter/finddate', [ExpenseListFilterController::class, 'FindDate'])->name('expense.list.finddate');
        Route::resource('sub-expense-type', SubExpenseController::class);

       


        // ---------------------Asset-Type---------------------------------------
        Route::resource('asset', AssetController::class);
        Route::get('assetlist-filter/week', [AssetListFilterController::class, 'assetListByWeek'])->name('asset.list.week');
        Route::get('assetlist-filter/month', [AssetListFilterController::class, 'assetListByMonth'])->name('asset.list.month');
        Route::get('assetlist-filter/date', [AssetListFilterController::class, 'assetListByDate'])->name('asset.list.date');
        Route::get('assetlist-filter/currentdate', [AssetListFilterController::class, 'currentDate'])->name('asset.list.currentdate');
        Route::resource('assettype', AssetTypeController::class);
        Route::resource('sub-asset-type', BackendSubAssetTypeController::class);



        // -------------------------------------Balance----------------------------------------------
        Route::get('balance', [BalanceController::class, 'balanceView'])->name('balance');

        // -------------------------------------Bank----------------------------------------------------
        Route::resource('bank', BankController::class);

        // -------------------------------------------Setting-----------------------------------------------
        Route::get('setting', [SettingController::class, 'settingView'])->name('setting');
        Route::post('setting/bank', [SettingController::class, 'bankSetting'])->name('bank.setting');
        Route::post('setting/mobilebanking', [SettingController::class, 'mobileBankingSetting'])->name('mobilebanking.setting');
        // -----------------------------SalarySetUp---------------------------------------------

        Route::resource('salary-setup', SalarySetupController::class);
        Route::resource('salary', SalaryController::class);

        // -------------------------------------Employee--------------------------------------------------------
        Route::resource('position', EmployeePositionController::class);
        Route::resource('employee-information', EmployeeInformationController::class);
        Route::get('employee/salaryinfo', [EmployeeSalaryAPI::class, 'showInfoAndSalary'])->name('showinfoandsalary');


        // -------------------------------------------------Department------------------------------------------------
        Route::resource('department', DepartmentController::class);

        //---------------------advance salary------------------------------------
        Route::resource('advance-salary', AdvanceSalaryController::class);
        // ----------------------------Lone------------------------------------------------
        Route::resource('lone', LoneController::class);


        //----------------------Admin-Route-------------------------------------
        Route::resource('user-admin', AdminController::class);
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// <!---------------------------banking-------------------------------------------------->
Route::get('/bankingdata', [DepositController::class, 'bankingData']);

// <!---------------------------mobile-banking-------------------------------------------------->
Route::get('/mobilebankingdata', [DepositController::class, 'mobibleBankingData']);
// <-------------------------------mobile-banking--------------------------------->
Route::get('/mobilebankingdata', [ExpenseListController::class, 'mobibleBankingData']);
// <-------------------------------banking--------------------------------->
Route::get('/bankingdata', [ExpenseListController::class, 'bankingData']);

use App\Http\Controllers\APIController;

Route::get('subassetbyasset/{id}', [APIController::class, 'assetTypeToSubassetTypeList']);
Route::get('subexpensebyexpense/{id}', [APIController::class, 'expenseTypeToSubexpenseTypeList']);
