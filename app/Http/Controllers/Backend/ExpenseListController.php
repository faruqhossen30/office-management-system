<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Expense;
use App\Models\ExpenseList;
use App\Models\Office;
use App\Models\Setting\BankSetting;
use App\Models\Setting\MobileBankingSetting;
use App\Models\PaymentSystem;
use App\Models\SubExpenseType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expense_lists = ExpenseList::with('office', 'expencetype', 'paymentsystem', 'author','bank','subexpense')->latest()->paginate(20);
        // return $expense_lists;
        $total = ExpenseList::sum('amount');
        return view('backend.expense-list.expense_view', compact('expense_lists', 'total'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expenses = Expense::get();
        $offices = Office::all();
        $banks = Bank::all();
        $bankselectId = BankSetting::first()->bank_id;
        // return $bankselectId;
        $paymentsystems = PaymentSystem::orderBy('name', 'asc')->get();
        $subexpensetype = SubExpenseType::all();
        // return $expenses;
        // $expensetype = Expense::all();
        return view('backend.expense-list.create_expense', compact('expenses', 'offices', 'banks', 'paymentsystems', 'bankselectId','subexpensetype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate(
            [
                'amount'            => 'required',
                'office_id'         => 'required',
                'expense_id'        => 'required',
                'payment_system_id' => 'required',
                'sub_expense_type_id' => 'required',
                'date'              => 'required',
            ],
            [
                'amount.required'            => 'Please enter your date',
                'office_id.required'         => 'Please enter your office name',
                'expense_id.required'        => 'Please enter your description',
                'sub_expense_type_id.required'=> 'Please enter your description',
                'payment_system_id.required' => 'Please enter your payment system',
                'date.required'              => 'Please enter your date',
            ]
        );
        ExpenseList::Create([
            'amount'              => $request->amount,
            'office_id'           => $request->office_id,
            'author_id'           => Auth::user()->id,
            'expense_id'          => $request->expense_id,
            'sub_expense_type_id' => $request->sub_expense_type_id,
            'voucher_no'          => $request->voucher_no,
            'payment_system_id'   => $request->payment_system_id,
            'bank_id'             => $request->bank_id,
            'phone'               => $request->phone,
            'transaction'         => $request->transaction,
            'date'                => $request->date,
            'description'         => $request->description,
            'remarks'             => $request->remarks,
        ]);
        return redirect()->route('expenselist.index')->with('success', 'Successfully data added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $expense_lists = ExpenseList::Where('id', $id)->first();

        // return $employees;
        return view('backend.expense-list.expense_show', compact('expense_lists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense_list = ExpenseList::findOrFail($id);
        $expenses = Expense::all();
        // return  $expenses;
        $offices = Office::all();
        $bankselectId = BankSetting::first()->bank_id;
        // return $bankselectId;
        $paymentsystems = PaymentSystem::get();
        $subexpensetype = SubExpenseType::all();
        $banks = Bank::all();
        // return $expense_list;
        return view('backend.expense-list.edit_expense', compact('banks', 'expense_list', 'expenses', 'offices', 'paymentsystems', 'bankselectId','subexpensetype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ExpenseList::findOrFail($id)->update([
            'amount'              => $request->amount,
            'office_id'           => $request->office_id,
            'author_id'           => Auth::user()->id,
            'expense_id'          => $request->expense_id,
            'sub_expense_type_id' => $request->sub_expense_type_id,
            'voucher_no'          => $request->voucher_no,
            'payment_system_id'   => $request->payment_system_id,
            'bank_id'             => $request->bank_id,
            'phone'               => $request->phone,
            'transaction'         => $request->transaction,
            'date'                => $request->date,
            'description'         => $request->description,
            'remarks'             => $request->remarks,
        ]);


        return redirect()->route('expenselist.index')->with('update', 'Successfully Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ExpenseList::findOrFail($id)->delete();
        return redirect()->route('expenselist.index')->with('delete', 'Successfully Data delete');
    }

    // Mobile Baking data
    public function mobibleBankingData()
    {
        $data = MobileBankingSetting::select('paymentsystem_id')->get()->toArray();
        return $data;
    }

    // --------------for banking----------------
    public function bankingData()
    {
        $data = BankSetting::select('paymentsystem_id')->get()->toArray();
        return $data;
    }
}
