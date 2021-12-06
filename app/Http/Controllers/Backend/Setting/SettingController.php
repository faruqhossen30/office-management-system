<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\PaymentSystem;
use App\Models\Setting\BankSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function settingView(){
        $paymentsytems = PaymentSystem::orderBy('name', 'asc')->get();
        $bankselectId = BankSetting::first()->bank_id;
        //  return $bankselectId;


        return view('backend.setting.setting', compact('paymentsytems', 'bankselectId'));
    }

    public function bankSetting(Request $request)
    {
        $request->validate([
            'bank_id' => 'required'
        ]);

        $update = BankSetting::first()->update(['bank_id'=> $request->bank_id]);

        return redirect()->route('setting');
    }
}
