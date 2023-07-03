<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bayar;

class Roti extends Model
{
    use HasFactory;
    protected $table = 'roti';
    protected $primaryKey = 'id_roti';
    protected $fillable = [
        'id_roti',
        'roti',
        'description',
        'id_kategori',
        'gambar',
        'harga',
        'stok'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public static function totalStok()
    {
        return self::sum('stok');
    }

    public function bayar()
    {
        return $this->hasMany(Bayar::class, 'id_roti');
    }

    public function id_roti()
    {
        return $this->hasMany(Cart::class, 'id_roti');
    }
}
