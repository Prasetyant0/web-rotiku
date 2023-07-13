<?php

namespace App\Models;

use App\Models\Roti;
use App\Models\Driver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bayar extends Model
{
    use HasFactory;
    protected $table = 'bayar';
    protected $primaryKey = 'id_pesanan';
    protected $incrementing = false;
    protected $keyType = 'string';
    protected $prefix = 'TRS';
    protected $fillable = [
        'nama_user',
        'quantity',
        'total_bayar',
        'id_roti',
        'alamat',
        'visibility'
    ];

    public function beliRoti()
    {
        return $this->belongsTo(Roti::class, 'id_roti');
    }

    public function pesanan()
    {
        return $this->hasMany(Driver::class, 'id_pesanan');
    }

    public function hisPesanan()
    {
        return $this->hasMany(History::class, 'id_pesanan');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id_history = $model->prefix . str_pad(static::max('id_history') + 1, 3, '0', STR_PAD_LEFT);
        });
    }
}
