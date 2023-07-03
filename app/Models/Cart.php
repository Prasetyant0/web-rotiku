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
        'quantity'
    ];

    public function id_user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function id_roti()
    {
        return $this->belongsTo(Roti::class, 'id_roti');
    }
}
