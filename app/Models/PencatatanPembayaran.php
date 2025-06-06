<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PencatatanPembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nomor',
        'kamar',
        'hargaSewa',
        'tanggal',
        'status',
    ];

    protected $table = 'pembayaran';
}
