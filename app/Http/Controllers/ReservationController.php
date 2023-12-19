<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        // Logique de réservation ici...
        $date = $request->input('date');

        // Vous pouvez enregistrer la réservation en base de données ou effectuer d'autres actions nécessaires.

        // Pour l'instant, nous allons simplement retourner une vue avec la date réservée.
        return view('reservation.success', compact('date'));
    }
}
