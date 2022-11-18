<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';

    protected $fillable = [
        'title',
        'slug',
        'director',
        'scriptwriter',
        'length',
        'description',
        'image',
        'rating',
        'category',
    ];
}
