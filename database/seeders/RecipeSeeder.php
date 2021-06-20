<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            'stocks_id' => '1',
            'materials_id' => '1',
            'qty' => '1',
            'satuan' => 'cm'
        ]);

        DB::table('recipes')->insert([
            'stocks_id' => '1',
            'materials_id' => '2',
            'qty' => '5',
            'satuan' => 'm'
        ]);


        DB::table('recipes')->insert([
            'stocks_id' => '2',
            'materials_id' => '2',
            'qty' => '1',
            'satuan' => 'cm'
        ]);

        DB::table('recipes')->insert([
            'stocks_id' => '2',
            'materials_id' => '3',
            'qty' => '5',
            'satuan' => 'm'
        ]);
    }
}
