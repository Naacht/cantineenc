<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class InformationController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $soldeRestauration = $user->solde_restauration . '€';
        $prixRestauration = '3€';
        $reservations = Reservation::where('user_id', $user->id)->get();

        return view('pages.informations', compact('soldeRestauration', 'prixRestauration', 'reservations'));
    }
}
