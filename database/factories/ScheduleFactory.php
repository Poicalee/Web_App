<?php

namespace Database\Factories;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    protected $model = Schedule::class;

    public function definition()
    {
        return [
            'route_id' => \App\Models\Route::factory()->create()->name,
            'departure_time' => $this->faker->dateTimeBetween('+1 hour', '+1 week'),
            // Dodaj inne pola, jeśli istnieją
        ];
    }
}
