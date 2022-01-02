<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdvanceSalary;
use App\Models\Employee;
use App\Models\Lone;
use Illuminate\Http\Request;

class EmployeeSalaryAPI extends Controller
{
    public function showInfoAndSalary(Request $request)
    {
        if($request->ajax()){

            $month = $request->monthvalue;

            $employee = Employee::where('id', $request->id)->first();
            $advance = AdvanceSalary::where('employee_id',$request->id)->get();

            $loan = Lone::where('employee_id', $request->id)->first();
            $data = view('backend.employee.inc.salaryinfo', compact('employee', 'advance', 'loan','month'))->render();
            return response()->json($data);
        }
    }
}
