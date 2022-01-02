<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdvanceSalary;
use App\Models\Employee;
use Illuminate\Http\Request;

class AdvanceSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advancesalary = AdvanceSalary::with('employeename')->latest()->get();

        // return $advancesalary;

        return view('backend.employee.advance.advance-view',compact('advancesalary'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {   $employees = Employee::all();
        return view('backend.employee.advance.advance-salary',compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //  return $request->all();
        $request->validate([
            'employee_id'  => 'required',
            'amount'       => 'required',
            'payment_date' => 'required',
            'deduct_month' => 'required',
            'cause'        => 'required',
            'remarks'      => 'required',
        ], [
            'employee_id.required'  => 'please enter employee name ',
            'amount.required'       => 'please enter employee amount ',
            'payment_date.required' => 'please enter employee payment date ',
            'deduct month.required' => 'please enter deduct month ',
            'cause.required'        => 'please enter cause ',
            'remarks.required'      => 'please enter remarks ',
        ]);
        AdvanceSalary::create([
            'employee_id'  => $request->employee_id,
            'amount'       => $request->amount,
            'payment_date' => $request->payment_date,
            'deduct_month' => $request->deduct_month,
            'cause'        => $request->cause,
            'remarks'      => $request->remarks,
        ]);
        return redirect()->route('advance-salary.index')->with('success','Successfully data added');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdvanceSalary::findOrFail($id)->delete();
        return redirect()->route('advance-salary.index')->with('delete', 'Successfully Data delete');
    }
}
