<?php

namespace Database\Seeders;

use App\Models\Setting\BankSetting;
use Illuminate\Database\Seeder;

class BankSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BankSetting::create([
            'paymentsystem_id' => 0
        ]);
    }
}
