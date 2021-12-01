<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PaymentSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PaymentSystems = PaymentSystem::with('user')->get();
        // return $PaymentSystems;
        return view('backend.payment.view_payment',compact('PaymentSystems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.payment.create_payment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'description' => 'required',
        ],[
            'name.required'        => 'Please enter your payment name',
            'description.required' => 'Please enter your payment name',
        ]);
        PaymentSystem::create([
            'name'        => $request->name,
            'description' => $request->description,
            'author_id'   => Auth::user()->id,
        ]);

        return redirect()->route('payment.index')->with('success','Successfully data Added');
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
        $paymentsystem = PaymentSystem::findOrFail($id) ;
        return view('backend.payment.edit_payment' ,compact('paymentsystem'));

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
        PaymentSystem::findOrFail($id)->update([
            'name'        => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('payment.index')->with('update','Successfully data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PaymentSystem::findOrFail($id)->delete();
        return redirect()->back()->with('delete', 'Successfully Data delete');
    }
}
