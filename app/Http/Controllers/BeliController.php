<?php

namespace App\Http\Controllers;

use App\Models\Roti;
use App\Models\Bayar;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class BeliController extends Controller
{
    public function index(Request $request)
    {
        $bayar = $request->session()->get('bayar');
        $roti = Roti::findOrFail($bayar['id_roti']);
        return view('frontend.beli', compact('bayar', 'roti'));
    }

    public function beli(Request $request)
    {
        $request->validate([
            'id_roti' => 'required|exists:roti,id_roti',
            'quantity' => 'required|integer|min:1',
            'alamat' => 'required',
        ]);

        $roti = Roti::findOrFail($request->input('id_roti'));
        $quantity = $request->input('quantity');
        $hargaTotal = $roti->harga * $quantity;
        $alamat = $request->input('alamat');

        $bayar = [
            'id_roti' => $roti->id_roti,
            'quantity' => $quantity,
            'total_bayar' => $hargaTotal,
            'alamat' => $alamat,
        ];

       $request->session()->put('bayar', $bayar);

        return redirect()->route('beli');
    }

    public function bayar(Request $request) {
        $request->validate([
            'alamat' => 'required',
        ]);

        $bayarData = $request->session()->get('bayar');

        $bayar = new Bayar();
        // $bayar->id_pesanan = rand(11111,99999);
        $bayar->id_roti = $bayarData['id_roti'];
        $bayar->nama_user = Auth::user()->name;
        $bayar->quantity = $bayarData['quantity'];
        $bayar->alamat = $request->input('alamat');
        $bayar->total_bayar = $bayarData['total_bayar'];
        $bayar->save();

        $request->session()->forget('bayar');

        return redirect('menu')->with('success', 'Pesanan berhasil di kirim, harap tunggu dan siapkan uang pas!');

    }
}
