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
        'stok',
        'visibility'
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

    public function itemRoti()
    {
        return $this->hasMany(Cart::class, 'id_roti');
    }

    public function getRotiData($id_roti)
    {
        $roti = $this->find($id_roti);

        if (!$roti) {
            return [
                'roti' => null,
                'description' => null,
                'id_kategori' => null,
                'gambar' => null,
                'harga' => null,
                'stok' => null,
            ];
        }

        $rotiData = [
            'roti' => $roti->roti,
            'description' => $roti->description,
            'id_kategori' => $roti->id_kategori,
            'gambar' => $roti->gambar,
            'harga' => $roti->harga,
            'stok' => $roti->stok,
        ];

        return $rotiData;
    }
}
