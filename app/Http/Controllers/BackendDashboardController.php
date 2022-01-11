<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\Employee;
use App\Models\ExpenseList;
class BackendDashboardController extends Controller
{
    public function dashboard(){

        $totalDeposite = Deposit::sum('amount');
        // return $totalDeposite;
        $totalExpense = ExpenseList::sum('amount');
        // return $totalExpense;
        $totalbalance = ($totalDeposite - $totalExpense);
        // return $totalbalance;
        $totalEmployee = Employee::count('name');
        // return $totalEmployee;
        return view('backend.dashboard',compact('totalDeposite','totalExpense','totalbalance','totalEmployee'));
    }

}
