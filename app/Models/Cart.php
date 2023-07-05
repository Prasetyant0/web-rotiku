<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Roti;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';
    protected $primaryKey = 'id_cart';
    protected $fillable =
    [
        'id_cart',
        'id_user',
        'id_roti',
        'jumlah',
        'total_harga'
    ];

    public function cartItem()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function itemRoti()
    {
        return $this->belongsTo(Roti::class, 'id_roti');
    }
}
