<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->insert([
            'bank' => 'BCA',
            'no_rekening' => '23131840',
            'name' => 'Eka Hirinda'
        ]);

        DB::table('payments')->insert([
            'bank' => 'BRI',
            'no_rekening' => '23131840',
            'name' => 'Dimaz Ivan'
        ]);

        DB::table('payments')->insert([
            'bank' => 'BNI',
            'no_rekening' => '23131840',
            'name' => 'Diqi'
        ]);
    }
}
