<?php

namespace App\Models;

use App\Models\Bayar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model
{
    use HasFactory;
    protected $table = 'tbl_driver';
    protected $primaryKey = 'id_driver';
    protected $fillable = [
        'id_pesanan'
    ];

    public function pesanan()
    {
        return $this->belongsTo(Bayar::class, 'id_pesanan');
    }
}
