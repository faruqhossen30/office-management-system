<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::get();
        // return $banks;
       return view('backend.bank.bank-view',compact('banks'));
    //    return "ok";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = Bank::get();
        // return $banks;
        return view('backend.bank.bank',compact('banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //    return $request->all();
        $request->validate([
            'name'           => 'required',
            'information'    => 'required',
            'account_number' => 'required',
            'account_holder' => 'required',
            'branch_name'    => 'required',
            'mobile'         => 'required',
            'address'        => 'required',

        ], [
            'name.required'           => 'Please enter your bank name ',
            'information.required'    => 'Please enter your bank information',
            'account_number.required' => 'Please enter your account number ',
            'account_holder.required' => 'Please enter your account holder name ',
            'branch_name.required'    => 'Please enter your branch name ',
            'mobile.required'         => 'Please enter your mobile number ',
            'address.required'        => 'Please enter your address ',
        ]);
        Bank::Create([
            'name'           => $request->name,
            'information'    => $request->information,
            'account_number' => $request->account_number,
            'account_holder' => $request->account_holder,
            'branch_name'    => $request->branch_name,
            'mobile'         => $request->mobile,
            'address'        => $request->address,
        ]);
        return redirect()->route('bank.index')->with('success','successfully data added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank = Bank::findOrFail($id);
        return view('backend.bank.edit-bank' ,compact('bank'));
        // return  $bank;
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
        Bank::findOrFail($id)->update([
            'name'           => $request->name,
            'information'    => $request->information,
            'account_number' => $request->account_number,
            'account_holder' => $request->account_holder,
            'branch_name'    => $request->branch_name,
            'mobile'         => $request->mobile,
            'address'        => $request->address,
        ]);
        return redirect()->route('bank.index')->with('update', 'Successfully Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bank::findOrFail($id)->delete();
        return redirect()->route('bank.index')->with('delete', 'Successfully Data delete');
    }
}
