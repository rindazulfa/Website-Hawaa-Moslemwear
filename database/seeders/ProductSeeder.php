<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Woman Dress',
            'price' => 450000,
            'desc' => 'Lorem Ipsum is simply dummy text of the printing 
            and typesetting industry. Lorem Ipsum has been the industrys standard 
            dummy text ever since the 1500s, 
            when an unknown printer took a galley of type and scrambled',
            'category' => 'gamis',
            'pict_1' => 'produk1.png',
            'pict_2' => 'produk2.png',
            'pict_3' => 'produk3.png'
        ]);
    }
}
