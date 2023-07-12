<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use App\Models\Roti;
use Illuminate\Support\Js;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('id_user', Auth::id() )->with('cartItem', 'itemRoti')->get();
        $cartQuantityItems = $cart->count();
        $subtotal = $cart->sum('total_harga');
        $biayaLayanan = 1000;
        // dd($cart);
        return view('frontend.cart', compact('cart', 'cartQuantityItems', 'subtotal', 'biayaLayanan'));
    }

    public function addToCart(Request $request)
    {
        $jumlah = $request->input('jumlah');
        $totalHarga = $request->input('totalHarga');
        $userId = auth()->id();
        $idRoti = $request->input('id_roti');
        $cartItem = Cart::where('id_roti', $idRoti)
            ->where('id_user', $userId)
            ->first();

        if ($cartItem) {
            $cartItem->jumlah += $jumlah;
            $cartItem->save();
        } else {
            Cart::create([
                'id_user' => $userId,
                'id_roti' => $idRoti,
                'jumlah' => $jumlah,
                 'total_harga' => $totalHarga
            ]);
        }

        return redirect()->route('invoice.menu', ['id_roti' => $idRoti])->with('message', 'Produk berhasil dimasukkan ke keranjang');

    }
}
