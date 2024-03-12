<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paiement;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PaiementController extends Controller
{
    public function processPayment(Request $request)
    {
        // Validez les données du formulaire
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'montant' => 'required|numeric',
            'numero_carte' => 'required|string',
            'date_expiration' => 'required|string',
            'code_securite' => 'required|string',
        ]);

        // Assurez-vous que l'utilisateur est authentifié
        if (Auth::check()) {
            // Récupérez l'ID de l'utilisateur authentifié
            $userId = Auth::id();

            // Créez le paiement associé à l'utilisateur
            $paiement = new Paiement([
                'user_id' => $userId,
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'montant' => $request->montant,
                'numero_carte' => $request->numero_carte,
                'date_expiration' => $request->date_expiration,
                'code_securite' => $request->code_securite,
            ]);

            // Sauvegardez le paiement dans la base de données
            $paiement->save();

            // Mettez à jour le solde de restauration de l'utilisateur
            $user = User::find($userId);
            $user->solde_restauration += $request->montant;
            $user->solde_restauration -= 3;
            $user->save();

            // Redirigez l'utilisateur vers une page de confirmation ou une autre page après le paiement
            return view('dashboard')->with('success', 'Paiement effectué avec succès.');
        } else {
            // Redirigez l'utilisateur vers la page de connexion s'il n'est pas authentifié
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour effectuer le paiement.');
        }
    }
}
