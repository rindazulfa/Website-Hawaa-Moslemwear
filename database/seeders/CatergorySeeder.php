<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatergorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Pakaian'
        ]);
        DB::table('categories')->insert([
            'name' => 'Kerudung'
        ]);
        DB::table('categories')->insert([
            'name' => 'Aksesoris'
        ]);
    }
}
