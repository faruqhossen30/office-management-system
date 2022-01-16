<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdvanceSalary;
use App\Models\Employee;
use App\Models\Lone;
use App\Models\Position;
use App\Models\Salary;
use App\Models\SalarySetUp;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salaries = Salary::with('employee')->latest()->get();

        // return $salaries;
        return view('backend.employee.salary.salary-view',compact('salaries',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salary = Salary::all();
        $salarysetup = SalarySetUp::all();
        // return $salarysetup;
        return view('backend.employee.inc.salaryinfo', compact('salary','salarysetup'));
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
            'employee_id'          => 'required',
            'month'                => 'required',
            'payment_date'         => 'required',
            'basic_salary'         => 'required',
            'conveyance_allowance' => 'required',
            'house_allowance'      => 'required',
            'medical_allowance'    => 'required',
            'other_allowance'      => 'required',
            'gross_salary'         => 'required',
            'total_advance'        => 'required',
            'Installment'          => 'required',
            'other_deduction'      => 'required',
            // 'deduction_detail'     => 'required',
            'totalsalary'          => 'required',
        ], [
            'employee_id.required'          => 'Please select your employee name',
            'month.required'                => 'Please select your month',
            'payment_date.required'         => 'Please select your payment_date',
            'total_advance.required'        => 'Please enter your total_advance',
            'Installment.required'          => 'Please enter your Installment',
            'other_deduction.required'      => 'Please enter your other_deduction',
            'deduction_detail.required'     => 'Please enter your deduction_detail',
            'totalsalary.required'          => 'Please enter your totalsalary',
            'house_allowance.required'      => 'Please enter your house_allowance',
        ]);
        Salary::create([

            'employee_id'          => $request->employee_id,
            'month'                => $request->month,
            'payment_date'         => $request->payment_date,
            'basic_salary'         => $request->basic_salary,
            'conveyance_allowance' => $request->conveyance_allowance,
            'medical_allowance'    => $request->medical_allowance,
            'other_allowance'      => $request->other_allowance,
            'gross_salary'         => $request->gross_salary,
            'total_advance'        => $request->total_advance,
            'Installment'          => $request->Installment,
            'other_deduction'      => $request->other_deduction,
            'deduction_detail'     => $request->deduction_detail,
            'house_allowance'      => $request->house_allowance,
            'totalsalary'          => $request->totalsalary

        ]);
        // return "ok";

        return redirect()->route('salary.index')->with('success','Successfully data Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salary = Salary::Where('id', $id)->first();
        // return $employees;

        return view('backend.employee.salary.salary-details',compact('salary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $loan = Lone::all();
        $advance  =AdvanceSalary::all();
        $employees = Employee::all();
        $salary = Salary::findOrFail($id);
        // return   $user;
        return view('backend.employee.salary.salary-edit' ,compact('salary','employees','advance','loan'));
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
