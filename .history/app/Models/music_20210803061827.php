<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $fillable = [
        'artiste',
        'titre',
        'album',
        'duree_total',
        'duree_total_seconde',
        'illustration',
        'genre',
        'compositeur',
        'numero_album',
        'copyright',
        'format',
        'image',
    ];
}
