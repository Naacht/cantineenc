<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase ;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Paiement;
use Illuminate\Support\Facades\Auth;


class PaiementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function paiementSuccessful()
    {
        // Créer un utilisateur authentifié
        $user = User::factory()->create();
        $this->actingAs($user);



        // Les données de formulaire valides
        $formData = [
            'nom' => $user->name,
            'prenom' => $user->name,
            'montant' => 50,
            'numero_carte' => '1234567890123456',
            'date_expiration' => '12/24',
            'code_securite' => '123',
        ];

        // Envoyer une requête POST pour simuler le traitement du paiement
        $response = $this->actingAs($user)->post('/process-payment', $formData);

        //dd($response) ;
        // Vérifier que le paiement est enregistré dans la base de données
        $this->assertDatabaseHas('paiements', [
            'user_id' => $user->id,
            'montant' => $formData['montant'],
        ]);

        // Vérifier que le solde de restauration de l'utilisateur est mis à jour
        //$this->assertEquals($user->solde_restauration + $formData['montant'], $user->fresh()->solde_restauration);
        //$response->assertRedirect('dashboard');
        //$this->assertEquals('Paiement effectué avec succès.', session('success'));
    }


    public function utilisateurNonAuthentifié()
    {
        // Envoyer une requête POST sans utilisateur authentifié
        $response = $this->post('/process-payment');

        // Vérifier que l'utilisateur est redirigé vers la page de connexion
        $response->assertRedirect(route('login'));
        $this->assertEquals('Veuillez vous connecter pour effectuer le paiement.', session('error'));
    }
}
