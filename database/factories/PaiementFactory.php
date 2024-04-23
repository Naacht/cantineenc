<?php

namespace Database\Factories;

use App\Models\Paiement;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaiementFactory extends Factory
    {
        protected $model = Paiement::class;

    public function definition()
    {
        return [
        'user_id' => function () {
        return \App\Models\User::factory()->create()->id;
        },
            'nom' => $this->faker->lastName,
        'prenom' => $this->faker->firstName,
        'montant' => $this->faker->numberBetween(10, 100),
        'numero_carte' => $this->faker->creditCardNumber,
        'date_expiration' => $this->faker->creditCardExpirationDate,
        'code_securite' => $this->faker->randomNumber(3),
        ];
    }
}
