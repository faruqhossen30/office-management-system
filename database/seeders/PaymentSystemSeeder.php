<?php

namespace Database\Seeders;

use App\Models\PaymentSystem;
use Illuminate\Database\Seeder;

class PaymentSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentSystem::insert([
            [
                'name'        => 'In Cash',
                'description' => 'In Cash',
                'author_id'   => 1
            ],
            [
                'name'        => 'Cheque',
                'description' => 'cheque',
                'author_id'   => 1
            ],
            [
                'name'        => 'Bkash',
                'description' => 'Bkash',
                'author_id'   => 1
            ],
            [
                'name'        => 'Rocket',
                'description' => 'Rocket',
                'author_id'   => 1
            ],
            [
                'name'        => 'Nagad',
                'description' => 'Nagad',
                'author_id'   => 1
            ],
            [
                'name'        => 'M-Cash',
                'description' => 'M-Cash',
                'author_id'   => 1
            ]

        ]);
    }
}
