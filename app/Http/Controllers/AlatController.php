<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlatController extends Controller
{
   public function index()
{
    $alat = \App\Models\Alat::with('kategori')->get();
    return view('alat.index', compact('alat'));
}

    public function store(Request $request)
    {
        return Alat::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $alat = Alat::findOrFail($id);
        $alat->update($request->all());
        return $alat;
    }
   

    public function destroy($id)
    {
        Alat::destroy($id);
        return response()->json(['message'=>'deleted']);
    }
}