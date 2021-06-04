<?php

namespace Database\Seeders;

use App\Models\detail_order;
use Illuminate\Database\Seeder;

class Detail_OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Detail_order::create([
            'orders_id' => '1',
            'products_id' => '1',
            // 'customers_id' => '1',
            'size'=>'S',
            'qty' => 2,
            'satuan' => 'buah',
            'subtotal' => 600000
        ]);
    }
}
