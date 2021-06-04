<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            ProfileSeeder::class,
            UserSeeder::class,
            BannerSeeder::class,
            ProductSeeder::class,
            CustomerSeeder::class,
            MaterialSeeder::class,
            RecipeSeeder::class,
            StokProductSeeder::class,
            SupplierSeeder::class,
            DiscountSeeder::class,
            OrderSeeder::class,
            Detail_OrderSeeder::class
        ]);
    }
}
