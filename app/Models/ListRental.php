<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListRental extends Model
{
    use HasFactory;

    protected $fillable =[
        'nama_peminjam',
        'no_hp',
        'mobil_pinjam',
        'tanggal_pinjam',
        'tanggal_kembali',
        'total_bayar'
    ];
}
