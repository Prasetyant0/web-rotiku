<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk_keluar extends Model
{
    use HasFactory;
    protected $table = 'produk_keluar';
    protected $primaryKey = 'id_keluar';
    protected $fillable = [
        'id_roti',
        'jumlah_keluar',
        'tanggal_keluar',
        'catatan'
    ];

    public function produkKeluar()
    {
        return $this->belongsTo(Roti::class, 'id_roti');
    }
}
