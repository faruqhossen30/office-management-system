<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\ExpenseList;
use App\Models\Office;
use App\Models\PaymentSystem;
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
        $expense_lists = ExpenseList::with('office','expencetype', 'paymentsystem', 'author')->latest()->paginate(6);
        // return $expense_lists;
        $total = ExpenseList::sum('amount');
        return view('backend.expense-list.expense_view',compact('expense_lists','total'));
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
        $paymentsystems = PaymentSystem::orderBy('name', 'asc')->get();
        // return $expenses;
        return view('backend.expense-list.create_expense', compact('expenses', 'offices', 'paymentsystems'));
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
        $request->validate([
            'amount'            => 'required',
            'office_id'         => 'required',
            'expense_id'        => 'required',
            'payment_system_id' => 'required',
            'date'              => 'required',
            'description'       => 'required',
            // 'voucher_no'        => 'required',
            'remarks'           => 'required',
        ]
        ,[
            'amount.required'            => 'Please enter your date',
            'office_id.required'         => 'Please enter your office name',
            'expense_id.required'        => 'Please enter your description',
            'payment_system_id.required' => 'Please enter your payment system',
            'date.required'              => 'Please enter your date',
            'description.required'       => 'Please enter your description',
            // 'voucher_no.required'        => 'Please enter your remarks',
            'remarks.required'           => 'Please enter your remarks',
        ]);
        ExpenseList::Create([
            'amount'            => $request->amount,
            'office_id'         => $request->office_id,
            'author_id'         => Auth::user()->id,
            'expense_id'        => $request->expense_id,
            'voucher_no'        => $request->voucher_no,
            'payment_system_id' => $request->payment_system_id,
            'date'              => $request->date,
            'description'       => $request->description,
            'remarks'           => $request->remarks,
        ]);
        return redirect()->route('expenselist.index')->with('success','Successfully data added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $expenses =Expense::all();
        $offices = Office::all();
        $paymentsystems = PaymentSystem::get();
        // return $expense_list;
        return view('backend.expense-list.edit_expense',compact('expense_list','expenses','offices','paymentsystems'));

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
        'date'         => $request->date,
        'expense_type' => $request->expense_type,
        'description'  => $request->description,
        'voucher_no'   => $request->voucher_no,
        'amount'       => $request->amount,
        'payment_type' => $request->payment_type,
        'remarks'      => $request->remarks,
        'office_id'    => $request->office_id,
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
}
