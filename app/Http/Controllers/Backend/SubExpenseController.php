<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\SubExpenseType;
use Illuminate\Http\Request;

class SubExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_expense_types = SubExpenseType::with('expensetype')->latest()->get();
        // return $sub_expense_types;
        return view('backend.expense.sub-expense.sub-expense-view',compact('sub_expense_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $expensetype = Expense::all();
    //    return $expensetype;
        return view('backend.expense.sub-expense.sub-expense-create',compact('expensetype'));
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
            'sub_expense_type_id'          => 'required',
            'name'                         => 'required',
        ], [
            'sub_expense_type_id.required' => 'please enter your sub asset type',
            'name.required'                => 'please enter your asset name',
        ]);
        SubExpenseType::create([
            'sub_expense_type_id' => $request->sub_expense_type_id,
            'name'                => $request->name,
        ]);
        return redirect()->route('sub-expense-type.index')->with('success', 'successfully data added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $sub_expense = SubExpenseType::findOrFail($id);
        $expensetype = Expense::all();
        // return   $sub_assets;
        return view('backend.expense.sub-expense.sub-expense-edit', compact('sub_expense', 'expensetype'));
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
        SubExpenseType::findOrFail($id)->update([
            'sub_expense_type_id' => $request->sub_expense_type_id,
            'name'                => $request->name
        ]);
        return redirect()->route('sub-expense-type.index')->with('update', 'Successfully data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubExpenseType::findOrFail($id)->delete();
        return redirect()->route('sub-expense-type.index')->with('delete', 'Successfully Data delete');
    }
}
