<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations'; // Assurez-vous que le nom de la table est correct
    protected $fillable = [
        'user_id',
        'date_reservation'
    ];
}
