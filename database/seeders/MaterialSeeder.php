<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materials')->insert([
            'name' => 'Kain Wol',
            'price' => 450000,
            'qty' => 40,
            'satuan' => 'cm'
        ]);

        DB::table('materials')->insert([
            'name' => 'Katun',
            'price' => 70000,
            'qty' => 20,
            'satuan' => 'cm'
        ]);

        DB::table('materials')->insert([
            'name' => 'Benang',
            'price' => 50000,
            'qty' => 10,
            'satuan' => 'cm'
        ]);
    }
}
