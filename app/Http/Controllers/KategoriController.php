<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return Kategori::all();
    }

    public function store(Request $request)
    {
        return Kategori::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $data = Kategori::findOrFail($id);
        $data->update($request->all());
        return $data;
    }

    public function destroy($id)
    {
        Kategori::destroy($id);
        return response()->json(['message' => 'deleted']);
    }
}