<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\ExpenseList;
use App\Models\Office;
use Illuminate\Http\Request;

class ExpenseListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expense_lists = ExpenseList::with('office')->get();
        // return $expense_lists;

        return view('backend.expense-list.expense_view',compact('expense_lists'));
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
        // return $expenses;
        return view('backend.expense-list.create_expense', compact('expenses', 'offices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date'         => 'required',
            'expense_type' => 'required',
            'description'  => 'required',
            'voucher_no'   => 'required',
            'amount'       => 'required',
            'payment_type' => 'required',
            'remarks'      => 'required',
            'office_id'    => 'required',
        ],[
            'date.required'         => 'Please enter your date',
            'expense_type.required' => 'Please enter your expense type',
            'description.required'  => 'Please enter your description',
            'voucher_no.required'   => 'Please enter your voucher_no',
            'amount.required'       => 'Please enter your amount',
            'payment_type.required' => 'Please enter your payment type',
            'remarks.required'      => 'Please enter your remarks',
            'office_id.required'    => 'Please enter your office id',
        ]);
        ExpenseList::Create([
            'date'         => $request->date,
            'expense_type' => $request->expense_type,
            'description'  => $request->description,
            'voucher_no'   => $request->voucher_no,
            'amount'       => $request->amount,
            'payment_type' => $request->payment_type,
            'remarks'      => $request->remarks,
            'office_id'    => $request->office_id,
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
        // return $expense_list;
        return view('backend.expense-list.edit_expense',compact('expense_list','expenses','offices'));

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
