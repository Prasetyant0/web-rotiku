<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk_masuk extends Model
{
    use HasFactory;
    protected $table = 'produk_masuk';
    protected $primaryKey = 'id_pemasukan';
    protected $fillable = [
        'id_roti',
        'jumlah_masuk',
        'tanggal_masuk',
        'catatan'
    ];

    public function produkMasuk()
    {
        return $this->belongsTo(Roti::class, 'id_roti');
    }
}
