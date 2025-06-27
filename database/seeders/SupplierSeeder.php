<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            Supplier::create([
                'company_name' => $faker->company,
                'address' => $faker->address,
                'contact_name' => $faker->name,
                'contact_email' => $faker->unique()->safeEmail,
                'phone' => $faker->optional()->phoneNumber,
                'next_delivery' => $faker->optional()->dateTimeBetween('now', '+1 month'),
            ]);
        }
    }
}

