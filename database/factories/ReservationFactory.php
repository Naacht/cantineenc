<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    protected $model = Reservation::class;

    public function definition()
    {
        return [
            // Définir ici les attributs par défaut de votre modèle Reservation
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'date_reservation' => $this->faker->date(),
        ];
    }
}
