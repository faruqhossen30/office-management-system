<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Lone;
use Illuminate\Http\Request;

class LoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Lone::with('employee')->latest()->paginate(5);
        // return  $employees;
        // $lones = Lone::all();
        $lones = Lone::latest()->get();
        return view('backend.employee.lone.lone_view',compact('employees','lones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        return view('backend.employee.lone.add-lone',compact('employees'));
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
                'employee_id'        => 'required',
                'permitted_by'       => 'required',
                'loan_details'       => 'required',
                'approve_date'       => 'required',
                'apply_date'         => 'required',
                'repayment_from'     => 'required',
                'installment_period' => 'required',
                'amount'             => 'required',
                'Installment'        => 'required',
            ],[
                'employee_id.required'        => 'Please enter your employee_id',
                'permitted_by.required'       => 'Please enter your permitted_by',
                'loan_details.required'       => 'Please enter your loan_details',
                'approve_date.required'       => 'Please enter your approve_date',
                'apply_date.required'         => 'Please enter your apply_date',
                'repayment_from.required'     => 'Please enter your repayment_from',
                'installment_period.required' => 'Please enter your installment_period',
                'amount.required'             => 'Please enter your amount',
                'Installment.required'        => 'Please enter your Installment',
            ]
        );
        Lone::create([
            'employee_id'        => $request->employee_id,
            'permitted_by'       => $request->permitted_by,
            'loan_details'       => $request->loan_details,
            'approve_date'       => $request->approve_date,
            'apply_date'         => $request->apply_date,
            'repayment_from'     => $request->repayment_from,
            'installment_period' => $request->installment_period,
            'amount'             => $request->amount,
            'Installment'        => $request->Installment,
        ]);
        return redirect()->route('lone.index')->with('success','successfully data added');
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
        Lone::findOrFail($id)->delete();
        return redirect()->route('lone.index')->with('delete', 'Successfully Data delete');
    }
}
