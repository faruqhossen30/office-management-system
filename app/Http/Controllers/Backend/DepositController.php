<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Office;
use App\Models\PaymentSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    public function create()
    {
        $offices = Office::get();
        $paymentSystem = PaymentSystem::all();
        // return $offices;
        return view('backend.deposit.adddeposit', compact('offices', 'paymentSystem'));
    }

    public function store(Request $request)
    {
        //    return $request->all();
        $request->validate([
            'amount'               => 'required',
            'payment_system_id'    => 'required',
            'office_id'            => 'required',
            'date'                 => 'required',

        ], [
            'amount.required'            => 'Please input your amount ',
            'payment_system_id.required' => 'Please select your Payment System.',
            'office_id.required'         => 'Please select your office name ',
            'date.required'              => 'Please input your date ',
        ]);
        $Data = [
            'amount'               => $request->amount,
            'payment_system_id'    => $request->payment_system_id,
            'office_id'            => $request->office_id,
            'author_id'            => Auth::user()->id,
            'date'                 => $request->date,
        ];
        Deposit::create($Data);
        return redirect()->route('deposit.view');
    }
    public function deposit_view()
    {
        $deposits = Deposit::with('office', 'author', 'paymentsystem')->latest()->paginate(7);
        $total = Deposit::sum('amount');
        // return $test;


        return view('backend.deposit.deposit-view', compact('deposits', 'total'));
    }

    public function depositeListThisWeek()
    {
        $deposits = Deposit::with('office', 'author', 'paymentsystem')->whereBetween('date', [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->latest()->paginate(7);

        $total =$deposits->sum('amount');


        // return $total;


        return view('backend.deposit.deposit-view', compact('deposits', 'total'));
    }

    public function depositeListThisMonth()
    {
        $deposits = Deposit::with('office', 'author', 'paymentsystem')->whereMonth('date', Carbon::now()->month)->latest()->paginate(7);

        $total = $deposits->sum('amount');


        // $total = 2300;
        //    return $deposits;
        return view('backend.deposit.deposit-view', compact('deposits', 'total'));
    }
    // ---------------------deposit_edit--------------------
    public function edit($id)
    {
        $deposit =  Deposit::findOrFail($id);
        $offices =  Office::all();
        $paymentSystem = PaymentSystem::get();
        return view('backend.deposit.edit', compact('deposit', 'offices', 'paymentSystem'));
    }

    //    --------------------deposit update-------------------------
    public function update(Request $request, $id)
    {
        //    return $request->all();
        Deposit::findOrFail($id)->update([
            'amount'           => $request->amount,
            'payment_system_id' => $request->payment_system_id,
            'office_name'      => $request->office_name,
            'office_id'        => $request->office_id,
            'date'             => $request->date,
        ]);
        return redirect()->route('deposit.view')->with('update', 'Successfully Data Updated');
    }
    //    -------------------------deposit delete---------------------------
    public function destroy($id)
    {

        Deposit::findOrFail($id)->delete();
        return redirect()->back()->with('delete', 'Successfully Data delete');
    }
}
