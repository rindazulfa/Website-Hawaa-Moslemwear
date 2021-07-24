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
            'name' => 'Masker'
        ]);
        DB::table('categories')->insert([
            'name' => 'Gamis'
        ]);
        DB::table('categories')->insert([
            'name' => 'Kerudung'
        ]);
    }
}
