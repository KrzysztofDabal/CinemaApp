<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;

    protected $table = 'seances';

    protected $fillable = [
        'movie_id',
        'hall_id',
        'date',
        'time',
        'hall_res_time',
        'status',
        'created_by',
    ];

    protected $hidden = [
        'created_by',
    ];
}
