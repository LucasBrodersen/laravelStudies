<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory()
            ->count(25)
            ->hasServices(10)
            ->create();

        Customer::factory()
            ->count(100)
            ->hasServices(5)
            ->create();

        Customer::factory()
            ->count(100)
            ->hasServices(3)
            ->create();

        Customer::factory()
            ->count(5)
            ->create();
    }
}
