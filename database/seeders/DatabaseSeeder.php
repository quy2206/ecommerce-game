<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // $this->call(ProductSeeder::class);
        // $this->call(CateogySeeder::class);
        // $this->call(AdminSeeder::class);
        // $this->call(RoleSeeder::class);
        // $this->call(PaymentMethodSeeder::class);
        // $this->call(PromotionSeeder::class);
        // $this->call(UserSeeder::class);
        $this->call(OrderCustomerSeeder::class);
    }
}
