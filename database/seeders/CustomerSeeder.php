<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'users_id'=>'2',
            'address' => 'Taman Pinang',
            'city' => 'Sidoarjo',
            'province' => 'Jawa Timur',
            'kelurahan' => 'Sidoarjo',
            'kecamatan' => 'Sidoarjo',
            'postal_code' => '21021',
            'phone' => '082131313'
        ]);

        // DB::table('customers')->insert([
        //     'users_id'=>'4',
        //     'address' => 'Gubeng',
        //     'city' => 'Surabaya',
        //     'province' => 'Jawa Timur',
        //     'postal_code' => '63282',
        //     'phone' => '0821214243',
        // ]);
    }
}
