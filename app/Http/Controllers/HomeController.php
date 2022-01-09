<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\ExpenseList;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalDeposite = Deposit::sum('amount');
        // return $totalDeposite;
        $totalExpense = ExpenseList::sum('amount');
        // return $totalExpense;
        $totalbalance = ($totalDeposite - $totalExpense);
        // return $totalbalance;

        return view('backend.dashboard', compact('totalbalance'));
    }
}
