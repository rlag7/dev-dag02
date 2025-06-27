<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Allergy;
use Illuminate\Database\Seeder;

class CustomerAllergySeeder extends Seeder
{
    public function run(): void
    {
        $allergies = Allergy::all();

        Customer::all()->each(function ($customer) use ($allergies) {
            $customer->allergies()->attach(
                $allergies->random(rand(0, 2))->pluck('id')->toArray()
            );
        });
    }
}
