<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        return Peminjaman::with(['user','alat'])->get();
    }

    public function store(Request $request)
    {
        $alat = Alat::findOrFail($request->alat_id);

        // cek stok
        if ($alat->jumlah < $request->jumlah) {
            return response()->json(['message'=>'stok tidak cukup'],400);
        }

        $peminjaman = Peminjaman::create($request->all());

        return $peminjaman;
    }

    public function approve($id)
    {
        $data = Peminjaman::findOrFail($id);
        $alat = Alat::find($data->alat_id);

        $alat->jumlah -= $data->jumlah;
        $alat->save();

        $data->status = 'disetujui';
        $data->save();

        return $data;
    }

    public function reject($id)
    {
        $data = Peminjaman::findOrFail($id);
        $data->status = 'ditolak';
        $data->save();

        return $data;
    }
}