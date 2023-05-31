<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Roti;

class Bayar extends Model
{
    use HasFactory;
    protected $table = 'bayar';
    protected $primaryKey = 'id';
    protected $guarded = [
        // 'id',
        'stok',
        'total_bayar',
        'id_roti',
        'alamat'
    ];

    public function beliRoti()
    {
        return $this->belongsTo(Roti::class, 'id_roti');
    }
}
