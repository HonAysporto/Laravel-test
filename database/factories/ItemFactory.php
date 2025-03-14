<?php

namespace Database\Factories;

use App\Models\item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = item::class;

    public function definition(): array
    {
        return [
            'name'=>$this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2,5,100)
        ];
    }
}
