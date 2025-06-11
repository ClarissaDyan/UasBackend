<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPenghuni extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nomor',
        'kamar',
        'alasan',
        'tanggal_masuk',
        'tanggal_keluar'
    ];

    protected $table = 'riwayat_penghuni';
}
