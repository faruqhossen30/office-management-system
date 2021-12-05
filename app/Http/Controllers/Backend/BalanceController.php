<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\ExpenseList;

class BalanceController extends Controller
{
    public function balanceView()
    {
        $totalDeposite = Deposit::sum('amount');
        $totalExpense = ExpenseList::sum('amount');
        $balance = $totalDeposite - $totalExpense;

        // return  $balance;


        return view('backend.balance.blance', compact('balance', 'totalDeposite', 'totalExpense'));
    }
}
