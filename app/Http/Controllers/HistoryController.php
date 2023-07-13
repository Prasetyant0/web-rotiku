<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Bayar;
use App\Models\Roti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HistoryController extends Controller
{

    public function index() {
        $history = History::paginate(10);
        return view('admin.history', compact('history'));
    }

    public function detail($id_history)
    {
        // $data = History::with('hisPesanan')->findOrFail($id_history);
        // die($data);

        $data = History::where('id_history', $id_history)->first();
        $id = $data->id_pesanan;
        $data2 = Bayar::find($id)->first();
        $dataRoti = Roti::find($data2->id_roti)->first();
        return view('admin.detailhistory', compact('data2', 'dataRoti'));
    }

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

                $history = new History;
                $history->id_pesanan = $id_pesanan;
                $history->nama_penerima = $request->input('nama_penerima');
                $history->alamat = $request->input('alamat');
                $history->total_harga = $request->input('total_harga');
                $history->foto_bukti = $fileName;
                $history->save();
                
                $cari = Bayar::findOrFail($id_pesanan);
                $cari->visibility = 2;
                $cari->save();
                return redirect()->route('driver.dashboard')->with('success', 'Terimakasih telah mengirimkan pesanan.');
            } catch (ModelNotFoundException $e) {
                return redirect()->route('driver.dashboard')->with('error', 'Gagal mengirim data ke admin!');
            }
        } else {
            return redirect()->back()->with('error', 'Submit data gagal!');
        }
    }

}
