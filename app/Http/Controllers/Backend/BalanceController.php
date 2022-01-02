<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\ExpenseList;
use App\Models\Office;

class BalanceController extends Controller
{
    public function balanceView()
    {
        $totalDeposite = Deposit::sum('amount');
        $totalExpense = ExpenseList::sum('amount');
        $balance = $totalDeposite - $totalExpense;
        $offices = Office::with('author')->get();



        return view('backend.balance.blance', compact('balance', 'totalDeposite', 'totalExpense','offices'));
    }
}
