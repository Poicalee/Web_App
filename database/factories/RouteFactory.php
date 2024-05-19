<?php

namespace Database\Factories;

use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;

class RouteFactory extends Factory
{
    protected $model = Route::class;

    public function definition()
    {
        return [
            'start_point' => $this->faker->city,
            'end_point' => $this->faker->city,
            'distance' => $this->faker->numberBetween(1, 100),
            'departure_time' => $this->faker->dateTimeBetween(1,100),
            'arrival_time' => $this->faker->dateTimeBetween(1,100),
        ];
    }
}
