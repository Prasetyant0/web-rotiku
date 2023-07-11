<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Bayar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HistoryController extends Controller
{
    public function storeTransaksi(Request $request, $id_pesanan)
    {
        $request->validate([
            'nama_penerima' => 'required',
            'alamat' => 'required',
            'total_harga' => 'required',
            'foto_bukti' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($request->hasFile('foto_bukti'))
        {
            $foto_bukti = $request->file('foto_bukti');
            $extension = $foto_bukti->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $foto_bukti->move('gallery', $fileName);

            try {

                $cari = Bayar::findOrFail($id_pesanan);
                $history = new History;
                $history->id_pesanan = $id_pesanan;
                $history->nama_penerima = $request->input('nama_penerima');
                $history->alamat = $request->input('alamat');
                $history->total_harga = $request->input('total_harga');
                $history->foto_bukti = $fileName;
                $history->save();
                return redirect()->route('driver.home')->with('success', 'Terimakasih telah mengirimkan pesanan.');
            } catch (ModelNotFoundException $e) {
                return redirect()->route('driver.home')->with('error', 'Gagal mengirim data ke admin!');
            }
        } else {
            return redirect()->back()->with('error', 'Submit data gagal!');
        }
    }
}
