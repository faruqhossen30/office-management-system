<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ExpenseList;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpenseListFilterController extends Controller
{
    public function expenseListeByWeek(Request $request)
    {
        // return "Just for test";
        $expense_lists = ExpenseList::with('office','expencetype' ,'paymentsystem','author')->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->latest()->paginate(7);
        $total = $expense_lists->sum('amount');
        // return $expense_lists;
        return view('backend.expense-list.expense_view', compact('expense_lists', 'total'));
    }
    public function expenseListeByDate(Request $request)
    {
        // return "Just for test";
        $expense_lists = ExpenseList::with('office','expencetype' ,'paymentsystem','author')->where('date','>=',$request->from_date)->where('date','<=',$request->to_date)->get();
        $total = $expense_lists->sum('amount');
        // return $expense_lists;
        return view('backend.expense-list.expense_view', compact('expense_lists', 'total'));
    }

    public function expenseListeByMonth()
    {
        $expense_lists = ExpenseList::with('office','expencetype' ,'paymentsystem','author')->whereMonth('date', Carbon::now()->month)->latest()->paginate(7);

        $total = $expense_lists->sum('amount');
        // $total = 2300;
        //    return $deposits;
        return view('backend.expense-list.expense_view', compact('expense_lists', 'total'));
    }
}
