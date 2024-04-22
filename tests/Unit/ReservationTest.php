<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReservationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function reservationSuccessful()
    {
        // Créer un utilisateur avec un solde de restauration suffisant
        $user = User::factory()->create(['solde_restauration' => 10]);

        // Simuler une requête de réservation avec une date spécifique
        $reservationDate = '2024-04-15';
        $response = $this->actingAs($user)->post('/reservation', ['date' => $reservationDate]);

        // Vérifier que la réservation a été créée en base de données
        $this->assertDatabaseHas('reservations', [
            'user_id' => $user->id,
            'date_reservation' => $reservationDate
        ]);

        // Vérifier que le solde de restauration de l'utilisateur a été débité de 3 euros
        $this->assertEquals(7, $user->fresh()->solde_restauration);

        // Vérifier que l'utilisateur est redirigé vers la page d'informations
        $response->assertRedirect(route('informations'));

        // Vérifier que la session contient un message de succès
        $this->assertEquals('Réservation effectuée avec succès.', session('success'));

    }

    /** @test */
    public function reservationFail()
    {
        // Créer un utilisateur avec un solde de restauration insuffisant
        $user = User::factory()->create(['solde_restauration' => 2]);

        // Simuler une requête de réservation avec une date spécifique
        $reservationDate = '2024-04-15';
        $response = $this->actingAs($user)->post('/reservation', ['date' => $reservationDate]);


        // Vérifier que la réservation n'a pas été créée en base de données
        $this->assertDatabaseMissing('reservations', ['user_id' => $user->id]);

        // Vérifier que le solde de restauration de l'utilisateur n'a pas changé
        $this->assertEquals(2, $user->fresh()->solde_restauration);

        // Vérifier que l'utilisateur est redirigé vers la page précédente avec un message d'erreur
        $response->assertRedirect();
        $this->assertEquals('Vous n\'avez pas les fonds nécessaires pour effectuer une réservation.', session('error'));
    }

    /** @test */
    public function rembourserSiAnnuler()
    {
        // Créer un utilisateur avec une réservation
        $user = User::factory()->create();
        $reservation = Reservation::factory()->create(['user_id' => $user->id]);

        // Simuler une requête d'annulation de réservation
        $response = $this->actingAs($user)->post('/reservation/annuler/'.$reservation->id);

        // Vérifier que la réservation a été supprimée de la base de données
        if (!Reservation::all()->isEmpty()) {
            $this->assertDatabaseMissing('reservations', ['id' => $reservation->id]);
        }

        // Vérifier que le solde de restauration de l'utilisateur a été crédité de 3 euros
        $expectedSolde = $user->fresh()->solde_restauration + 3;
    $this->assertEquals($expectedSolde, optional($reservation->user)->solde_restauration);

        // Vérifier que l'utilisateur est redirigé vers la page d'informations avec un message de succès
        $response->assertRedirect(route('informations'));
        $this->assertEquals('Réservation annulée avec succès.', session('success'));
    }
}
