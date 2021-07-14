<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('puchases')->insert([
            'materials_id' => '1',
            'suppliers_id' => '1',
            'date' => '2021-07-13',
            'harga' => 40000,
            'qty' => 2,
            'satuan' => 'cm',
            'total' => 80000,
            'keterangan'=>'-'
        ]);
        DB::table('puchases')->insert([
            'materials_id' => '2',
            'suppliers_id' => '2',
            'date' => '2021-07-14',
            'harga' => 40000,
            'qty' => 2,
            'satuan' => 'cm',
            'total' => 80000,
            'keterangan'=>'-'
        ]);

     
    }
}
