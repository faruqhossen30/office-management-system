<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Deposit;
use App\Models\Office;
use App\Models\PaymentSystem;
use App\Models\Setting\BankSetting;
use App\Models\Setting\MobileBankingSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    public function deposit_view()
    {
        $deposits = Deposit::with('office', 'author', 'paymentsystem', 'banks')->latest()->paginate(20);
        $total = Deposit::sum('amount');
        // return $test;
        // return $deposits;
        return view('backend.deposit.deposit-view', compact('deposits', 'total'));
    }

    public function create()
    {

        $offices = Office::get();
        $paymentSystem = PaymentSystem::all();
        $banks = Bank::all();
        $bankselectId = BankSetting::first()->bank_id;

        // $mobilebanking = MobileBankingSetting::get();
        // return $mobilebanking;
        return view('backend.deposit.adddeposit', compact('offices', 'paymentSystem', 'banks', 'bankselectId',));
    }

    public function store(Request $request)
    {
        //    return $request->all();
        $request->validate([
            'amount'            => 'required',
            'payment_system_id' => 'required',
            'office_id'         => 'required',
            'source'            => 'required',
            'date'              => 'required',
        ], [
            'amount.required'            => 'Please input your amount ',
            'payment_system_id.required' => 'Please select your Payment System.',
            'office_id.required'         => 'Please select your office name ',
            'source.required'            => 'Please select your credit source',
            'date.required'              => 'Please input your date ',
        ]);
        $Data = [
            'amount'            => $request->amount,
            'payment_system_id' => $request->payment_system_id,
            'transaction'       => $request->transaction,
            'source'            => $request->source,
            'phone'             => $request->phone,
            'office_id'         => $request->office_id,
            'author_id'         => Auth::user()->id,
            'date'              => $request->date,
            'bank_id'           => $request->bank_id,
            'remarks'           => $request->remarks,
        ];
        Deposit::create($Data);
        return redirect()->route('deposit.view');
    }
    public function show($id)
    {
        // $banks = Bank::all();
        $deposit = Deposit::Where('id', $id)->first();
        // return $deposit;
        return view('backend.deposit.deposit-show', compact('deposit'));
    }

    // ---------------------deposit_edit--------------------
    public function edit($id)
    {
        $deposit =  Deposit::findOrFail($id);
        $offices =  Office::all();
        $banks = Bank::all();
        $paymentSystem = PaymentSystem::get();
        // return
        return view('backend.deposit.edit', compact('deposit', 'offices', 'paymentSystem', 'banks'));
    }

    //    --------------------deposit update-------------------------
    public function update(Request $request, $id)
    {
        //    return $request->all();
        Deposit::where('id',$id)->update([
            'amount'            => $request->amount,
            'payment_system_id' => $request->payment_system_id,
            'transaction'       => $request->transaction,
            'source'            => $request->source,
            'phone'             => $request->phone,
            'bank_id'           => $request->bank_id,
            'office_id'         => $request->office_id,
            'date'              => $request->date,
            'remarks'           => $request->remarks,
        ]);
        return redirect()->route('deposit.view')->with('update', 'Successfully Data Updated');
    }
    //    -------------------------deposit delete---------------------------
    public function destroy($id)
    {

        Deposit::findOrFail($id)->delete();
        return redirect()->back()->with('delete', 'Successfully Data delete');
    }

          // <!-------------------- start deposite  date filtering ----------------->

    public function depositeListThisWeek()
    {
        $deposits = Deposit::with('office', 'author', 'paymentsystem')->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->latest()->paginate(7);

        $total = $deposits->sum('amount');
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

    public function depositeListThisDate(Request $request)
    {
        $request->validate([
            'from_date' => 'required',
            'to_date' => 'required',
        ]);
        $deposits = Deposit::with('office', 'author', 'paymentsystem')->where('date','>=',$request->from_date)->where('date','<=',$request->to_date)->paginate(10);

        $total = $deposits->sum('amount');
        // $total = 2300;
        //    return $deposits;
        return view('backend.deposit.deposit-view', compact('deposits', 'total'));
    }
    public function depositFindDate(Request $request)
    {
        $request->validate([
            'from_date' => 'required',
        ]);
        $deposits = Deposit::with('office', 'author', 'paymentsystem')->where('date',$request->from_date)->paginate(10);

        $total = $deposits->sum('amountk');
        // $total = 2300;
        //    return $deposits;
        return view('backend.deposit.deposit-view', compact('deposits', 'total'));
    }


  // <!-------------------- End  deposite  date filtering ----------------->
    // Mobile Baking data
    public function mobibleBankingData()
    {
        $data = MobileBankingSetting::select('paymentsystem_id')->get()->toArray();
        return $data;
    }
    //  Baking data
    public function bankingData()
    {
        $data =BankSetting::select('paymentsystem_id')->get()->toArray();
        return $data;
    }
}
