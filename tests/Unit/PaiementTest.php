<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Paiement;
use Illuminate\Support\Facades\Auth;


class PaiementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_processes_payment_when_user_is_authenticated_and_form_data_is_valid()
    {
        // Créer un utilisateur authentifié
        $user = User::factory()->create();
        $this->actingAs($user);

        // Les données de formulaire valides
        $formData = [
            'nom' => 'Admin',
            'prenom' => 'Test',
            'montant' => 50,
            'numero_carte' => '1234567890123456',
            'date_expiration' => '08/24',
            'code_securite' => '123',
        ];

        // Envoyer une requête POST pour simuler le traitement du paiement
        $response = $this->post('/process-payment', $formData);

        // Vérifier que le paiement est enregistré dans la base de données
        $this->assertDatabaseHas('paiements', [
            'user_id' => $user->id,
            'montant' => $formData['montant'],
        ]);

        // Vérifier que le solde de restauration de l'utilisateur est mis à jour
        $this->assertEquals($user->solde_restauration + $formData['montant'], $user->fresh()->solde_restauration);

        // Vérifier que l'utilisateur est redirigé vers la page de tableau de bord avec un message de succès
        $response->assertRedirect('dashboard');
        $this->assertEquals('Paiement effectué avec succès.', session('success'));
    }

    // Autres tests pour les cas de données de formulaire non valides et d'utilisateur non authentifié

    public function utilisateurNonAuthentifié()
    {
        // Envoyer une requête POST sans utilisateur authentifié
        $response = $this->post('/process-payment');

        // Vérifier que l'utilisateur est redirigé vers la page de connexion
        $response->assertRedirect(route('login'));

        // Vérifier que la session contient un message d'erreur approprié
        $this->assertEquals('Veuillez vous connecter pour effectuer le paiement.', session('error'));
    }
}
