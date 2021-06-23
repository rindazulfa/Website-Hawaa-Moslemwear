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
            // 'category' => 'gamis',
            'pict_1' => 'produk1.png',
            'pict_2' => 'produk2.png',
            'pict_3' => 'produk3.png'
        ]);

        DB::table('products')->insert([
            'name' => 'Gamis',
            'price' => 50000,
            'desc' => 'Lorem Ipsum is simply dummy text of the printing 
            and typesetting industry. Lorem Ipsum has been the industrys standard 
            dummy text ever since the 1500s, 
            when an unknown printer took a galley of type and scrambled',
            // 'category' => 'jubah',
            'pict_1' => 'produk2.png',
            'pict_2' => 'produk3.png',
            'pict_3' => 'produk1.png'
        ]);

        DB::table('products')->insert([
            'name' => 'Woman Dress',
            'price' => 30000,
            'desc' => 'Lorem Ipsum is simply dummy text of the printing 
            and typesetting industry. Lorem Ipsum has been the industrys standard 
            dummy text ever since the 1500s, 
            when an unknown printer took a galley of type and scrambled',
            // 'category' => 'baju biasa',
            'pict_1' => 'produk3.png',
            'pict_2' => 'produk2.png',
            'pict_3' => 'produk1.png'
        ]);
        DB::table('products')->insert([
            'name' => 'Produk 4',
            'price' => 70000,
            'desc' => 'Lorem Ipsum is simply dummy text of the printing 
            and typesetting industry. Lorem Ipsum has been the industrys standard 
            dummy text ever since the 1500s, 
            when an unknown printer took a galley of type and scrambled',
            // 'category' => 'baju biasa',
            'pict_1' => 'produk4.jpg',
            'pict_2' => 'produk2.png',
            'pict_3' => 'produk1.png'
        ]);
        DB::table('products')->insert([
            'name' => 'Produk 5',
            'price' => 90000,
            'desc' => 'Lorem Ipsum is simply dummy text of the printing 
            and typesetting industry. Lorem Ipsum has been the industrys standard 
            dummy text ever since the 1500s, 
            when an unknown printer took a galley of type and scrambled',
            // 'category' => 'baju biasa',
            'pict_1' => 'produk5.jpg',
            'pict_2' => 'produk2.png',
            'pict_3' => 'produk1.png'
        ]);
    }
}
