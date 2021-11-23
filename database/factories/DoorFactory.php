<?php

namespace Database\Factories;

use App\Models\Door;
use App\Models\Zone;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Door::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /**
         * Ensure factory created doors are only in zone 3+. To not mess with original test seeds.
         */
        return [
            'name' => 'Door ' . $this->faker->unique()->randomNumber(3),
        ];
    }
}
