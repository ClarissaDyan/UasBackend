<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManajemanPenghuni extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nomor',
        'kamar',
        'masaSewa',
    ];

    protected $table = 'penghuni';
}
