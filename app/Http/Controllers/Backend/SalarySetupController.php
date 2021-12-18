<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Office;
use App\Models\Position;
use App\Models\SalarySetUp;
use Illuminate\Http\Request;

class SalarySetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salary_set_ups = SalarySetUp::with('employee', 'position','department','offices')->latest()->get();
        // return  $salary_set_ups ;
        

       return view('backend.employee.salary.salary-view',compact('salary_set_ups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $offices = Office::all();
        $positions = Position::all();
        $employees = Employee::all();
        $departments = Department::all();
        return view('backend.employee.salary.salary-setup', compact('employees', 'positions', 'departments','offices'));
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
            'employee_id'   => 'required',
            'position_id'   => 'required',
            'department_id' => 'required',
            'office_id'     => 'required',
            'basic'         => 'required',
            'grow_salary'   => 'required',
            'Payment_date'  => 'required',
        ], [
            'employee_id.required'   => 'Please select your employee name',
            'position_id.required'   => 'Please select your position',
            'department_id.required' => 'Please select your department',
            'office_id.required'     => 'Please select your office',
            'basic.required'         => 'Please enter your basic salary',
            'grow_salary.required'   => 'Please enter your grow salary',
            'Payment_date.required'  => 'Please enter your Payment date'
        ]);

        SalarySetUp::create([
            'employee_id'   => $request->employee_id,
            'position_id'   => $request->position_id,
            'department_id' => $request->department_id,
            'office_id'     => $request->office_id,
            'basic'         => $request->basic,
            'grow_salary'   => $request->grow_salary,
            'Payment_date'  => $request->Payment_date,

        ]);
        return redirect()->route('salary-setup.index')->with('success', 'successfully data added');
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
        //
    }
}
