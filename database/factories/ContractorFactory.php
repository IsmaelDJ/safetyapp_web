<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contractor>
 */
class ContractorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->text(8),
            'phone'=>$this->faker->phoneNumber(),
            'address'=>$this->faker->address(),
            'nif'=>$this->faker->text(5) . $this->faker->numberBetween(1000,9999)
        ];
    }
}
