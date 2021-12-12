<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\PaymentSystem;
use App\Models\Setting\BankSetting;
use App\Models\Setting\MobileBankingSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function settingView()
    {
        $paymentsytems = PaymentSystem::orderBy('name', 'asc')->get();
        $bankselectId = BankSetting::first()->bank_id;
        //  return $bankselectId;
        $mobilebanking = MobileBankingSetting::select('paymentsystem_id')->get()->toArray();

        // return $mobilebanking;


        return view('backend.setting.setting', compact('paymentsytems', 'bankselectId', 'mobilebanking'));
    }

    public function bankSetting(Request $request)
    {
        $request->validate([
            'bank_id' => 'required'
        ]);

        $update = BankSetting::first()->update(['bank_id' => $request->bank_id]);

        return redirect()->route('setting');
    }
    // Mobile Banking Setting
    public function mobileBankingSetting(Request $request)
    {

        $mobilebanking = $request->mobilebanking;
        $olddata = MobileBankingSetting::get();

        if (!empty($mobilebanking)) {

            if (!empty($olddata)) {
                MobileBankingSetting::truncate();
            }

            foreach ($mobilebanking as $bank) {
                MobileBankingSetting::create([
                   'paymentsystem_id' => $bank
               ]);
            }

            return redirect()->route('setting');

        }
    }
}
