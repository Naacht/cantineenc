<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'montant',
        'numero_carte',
        'date_expiration',
        'code_securite',
        'user_id',
    ];

    /**
     * Définit la relation entre le paiement et l'utilisateur.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
