<?php

namespace Database\Factories;

use \App\Models\MarketItems;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MarketItems>
 */
class MarketItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = MarketItems::class;

    public function definition(): array
    {
        return [
            'seller_id' => $this->faker->numberBetween(1, 5), // Assuming there are 10 sellers
            'item_name' => $this->faker->word(2, true),
            'item_description' => $this->faker->sentence(3),
            'item_qty' => $this->faker->numberBetween(1, 100),
            'item_price' => $this->faker->randomFloat(2, 1, 1000), // Generating a random float between 1 and 1000
        ];
    }
}
