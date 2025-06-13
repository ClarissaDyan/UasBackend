<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManajemenKamarKos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomorkamar',
        'status',
        'hargaSewa',
        'fasilitas'
    ];

    protected $table = 'kamarkos';
}
