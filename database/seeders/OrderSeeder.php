<?php

namespace Database\Seeders;

use App\Models\order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        order::create([
            'customers_id' => '1',
            'pict_payment' => 'Banner.jpg',
            'date' => '2022-02-10',
            'total' => 2300000,
            'status' => 'Pending',
            'keterangan' => '-',
            'shipping' => 'JNE',
            'ongkir' => 6000
        ]);
    }
}
