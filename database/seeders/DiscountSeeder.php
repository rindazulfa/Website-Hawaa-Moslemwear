<?php

namespace Database\Seeders;

use App\Models\discount;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        discount::create([
            'name_disc' => 'Shoppay',
            'discount' => 0.01,
            'status' => 'ribuan'
        ]);
    }
}
