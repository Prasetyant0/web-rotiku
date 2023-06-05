<?php

namespace App\Http\Controllers;

use App\Models\Bayar;
use App\Models\Roti;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
            'stok' => 'required|integer|min:1',
            'alamat' => 'required',
        ]);

        $roti = Roti::findOrFail($request->input('id_roti'));
        $stok = $request->input('stok');
        $hargaTotal = $roti->harga * $stok;
        $alamat = $request->input('alamat');

        $bayar = [
            'id_roti' => $roti->id_roti,
            'stok' => $stok,
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
        $bayar->id_roti = $bayarData['id_roti'];
        $bayar->stok = $bayarData['stok'];
        $bayar->alamat = $request->input('alamat');
        $bayar->total_bayar = $bayarData['total_bayar'];
        $bayar->save();

        $request->session()->forget('bayar');

        return redirect()->route('menu');
        // ->with('success', 'Pesanan berhasil dikirim, harap tunggu dan siapkan uang pas!')
    }
}
