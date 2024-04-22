<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        // Vérifier si l'utilisateur est authentifié
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::findOrFail($userId);

            // Vérifier si l'utilisateur a suffisamment de fonds pour la réservation
            if ($user->solde_restauration >= 3) {
                $user->solde_restauration -= 3;
                $user->save();

                // Enregistrer la réservation en base de données
                $reservation = new Reservation();
                $reservation->user_id = $userId;
                $reservation->date_reservation = $request->input('date');
                $reservation->save();

                return redirect()->route('informations')->with('success', 'Réservation effectuée avec succès.');
            } else {
                return back()->with('error', 'Vous n\'avez pas les fonds nécessaires pour effectuer une réservation.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour effectuer une réservation.');
        }

    }

        public function annuler($id)
    {
        $reservation = Reservation::findOrFail($id);
        $userId = $reservation->user_id;
        $user = User::findOrFail($userId);

        // Rembourser l'utilisateur de 3 euros
        $user->solde_restauration += 3;
        $user->save();

        // Annuler la réservation
        $reservation->delete();

        return redirect()->route('informations')->with('success', 'Réservation annulée avec succès.');
    }

}
