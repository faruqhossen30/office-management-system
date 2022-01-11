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
        // $bankselectId = PaymentSystem::orderBy('name', 'asc')->get();
        // //  return $bankselectId;
        $mobilebanking = MobileBankingSetting::select('paymentsystem_id')->get()->toArray();
        $banking = BankSetting::select('paymentsystem_id')->get()->toArray();


        return view('backend.setting.setting', compact('paymentsytems', 'banking', 'mobilebanking',));
    }


    // Mobile Banking Setting
    public function bankSetting(Request $request)
    {

        $banking = $request->banking;
        $olddata = BankSetting::get();

        // return $request->all();

        if (!empty($banking)) {

            if (!empty($olddata)) {
                BankSetting::truncate();
            }

            foreach ($banking as $bank) {
                BankSetting::create([
                   'paymentsystem_id' => $bank
               ]);
            }

            return redirect()->route('setting');

        }
    }

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
