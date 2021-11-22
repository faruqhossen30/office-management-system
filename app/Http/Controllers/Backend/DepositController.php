<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Office;
use Illuminate\Http\Request;

class DepositController extends Controller
{
   public function deposit(){
        $offices = Office::get();
        // return $offices;
       return view('backend.deposit.adddeposit', compact('offices'));
   }

   public function store(Request $request){
    //    return $request->all();
        $request->validate([
            'amount'      => 'required',
            'amount_type' => 'required',

            'office_id'   => 'required',
            'date'        => 'required',

        ],[
            'amount.required'      => 'Please input your amount ',
            'amount_type.required' => 'Please select your amount_type ',

            'office_id.required'   => 'Please input your author id ',
            'date.required'        => 'Please input your date ',
        ]);
       $Data=[
            'amount'      => $request->amount,
            'amount_type' => $request->amount_type,
            'author_id'   => $request->author_id,
            'office_id'   => $request->office_id,
            'date'        => $request->date,
       ];
       Deposit::create($Data);
       return redirect()->route('deposit.view');
   }
    public function deposit_view(){
       $deposits = Deposit::all();
    //    return $deposits;
       return view('backend.deposit.deposit-view', compact('deposits'));
   }
// ---------------------deposit_edit--------------------
   public function edit($id){
    $deposit = Deposit::findOrFail($id);
    return view('backend.deposit.edit',compact('deposit'));
   }

//    --------------------deposit update-------------------------
   public function update(Request $request,$id){
        Deposit::findOrFail($id)->update([

                'amount'      => $request->amount,
                'amount_type' => $request->amount_type,
                'author_id'   => $request->author_id,
                'office_id'   => $request->office_id,
                'date'        => $request->date,
        ]);
        return redirect()->to('deposit-view')->with('update', 'Successfully Data Updated');
   }
//    -------------------------deposit delete---------------------------
    public function destroy($id){

        Deposit::findOrFail($id)->delete();
        return redirect()->back()->with('delete', 'Successfully Data delete');
    }

}
