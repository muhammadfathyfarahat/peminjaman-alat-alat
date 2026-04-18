<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function store(Request $request)
    {
        $peminjaman = Peminjaman::findOrFail($request->peminjaman_id);
        $alat = Alat::find($peminjaman->alat_id);

        // tambah stok kembali
        $alat->jumlah += $peminjaman->jumlah;
        $alat->save();

        $peminjaman->status = 'selesai';
        $peminjaman->save();

        return Pengembalian::create($request->all());
    }
}