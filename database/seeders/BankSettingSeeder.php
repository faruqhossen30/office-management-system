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
            'bank_id' => 0,
            'bank_name' => 'none',
        ]);
    }
}
