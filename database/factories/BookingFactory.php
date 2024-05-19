<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition()
    {
        return [
            // Definicja struktury danych dla modelu Booking
            'user_id' => $this->faker->name,
            'route_id' => $this->faker->numberBetween(1,100),
            'booking_date' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            // Dodaj inne kolumny, jeśli istnieją
        ];
    }
}
