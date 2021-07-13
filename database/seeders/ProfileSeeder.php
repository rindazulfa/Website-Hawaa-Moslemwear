<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'picture' => 'bg_4.jpg',
            'desc_1' => 'Hawaa Moslem merupakan sebuah toko fashion yang memberikan penawaran produk mereka dengan menggunakan tema muslim',
            'desc_2' => 'Dimana mereka menawarkan berbagai produk kami untuk dipasarkan dan kami juga bisa menerima pemesanan secara custom untuk jumlah yang lebih banyak',
            'telepon' => '+62 811-3104-430',
            'ig' => 'hawaa.moslemwear',
            'email' => 'iniemail@email.com',
            'address' => 'Ketintang, Surabaya',
        ]);
    }
}
