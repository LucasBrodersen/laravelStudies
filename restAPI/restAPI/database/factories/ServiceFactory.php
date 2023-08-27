<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = $this->faker;
        $status = $faker->randomElement(['A', 'C', 'P']); // P nesse caso é só um teste para Paid, Active e Closed são reais

        return [
            'customer_id' => Customer::factory(),
            'cost' => $faker->numberBetween(100, 20000),
            'status' => $status,
            'billed_date' => $faker->dateTimeThisDecade()->format('Y-m-d H:i:s'),
            'paid_date' => $status == 'P' ? $faker->dateTimeThisDecade()->format('Y-m-d H:i:s') : NULL
        ];
    }
}
