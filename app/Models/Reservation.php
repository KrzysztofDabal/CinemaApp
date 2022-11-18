<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $fillable = [
        'user_id',
        'seance_id',
        'name',
        'surname',
        'slug',
        'email',
        'phone_number',
        'seat_row',
        'seat_column',
    ];
}
