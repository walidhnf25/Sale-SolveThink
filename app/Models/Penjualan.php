<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Penjualan extends Model
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $table = 'penjualan';
    protected $fillable = [
        'nama_pembeli',
        'no_pembeli',
        'alamat_pembeli',
        'pembelian',
        'total_harga',
        'bukti_pembayaran_pembeli',
        'pengambilan_barang_pembeli',
    ];
}
