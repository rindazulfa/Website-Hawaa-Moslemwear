<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stocks')->insert([
            'products_id' => '1',
            'size' => 'S',
            'qty' => 80,
            'satuan' => 'buah'
        ]);
        DB::table('stocks')->insert([
            'products_id' => '1',
            'size' => 'M',
            'qty' => 8,
            'satuan' => 'buah'
        ]);
        DB::table('stocks')->insert([
            'products_id' => '1',
            'size' => 'L',
            'qty' => 10,
            'satuan' => 'buah'
        ]);
        DB::table('stocks')->insert([
            'products_id' => '2',
            'size' => 'S',
            'qty' => 80,
            'satuan' => 'buah'
        ]);
        DB::table('stocks')->insert([
            'products_id' => '2',
            'size' => 'M',
            'qty' => 8,
            'satuan' => 'buah'
        ]);
        DB::table('stocks')->insert([
            'products_id' => '2',
            'size' => 'L',
            'qty' => 10,
            'satuan' => 'buah'
        ]);
    }
}
