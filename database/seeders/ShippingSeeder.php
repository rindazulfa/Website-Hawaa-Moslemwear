<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shippings')->insert([
            'nama' => 'Gojek'
        ]);
        DB::table('shippings')->insert([
            'nama' => 'JNT'
        ]);
        
        
    }
}
