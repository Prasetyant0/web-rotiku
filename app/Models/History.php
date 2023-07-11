<?php

namespace App\Models;

use App\Models\Bayar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends Model
{
    use HasFactory;
    protected $table = 'tbl_history';
    protected $primaryKey = 'id_history';
    protected $fillable = [
        'id_history',
        'id_pesanan',
        'nama_penerima',
        'alamat',
        'total_harga',
        'foto_bukti'
    ];

    public function hisPesanan()
    {
        return $this->belongsTo(Bayar::class, 'id_pesanan');
    }

}
