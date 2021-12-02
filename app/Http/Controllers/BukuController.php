<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Http\Client\Response;

class BukuController extends Controller
{
    public function storeBuku(Request $request)
    {
        $buku = new Buku();
        $buku->judul_buku = $request['judul'];
        $buku->pengarang = $request['pengarang'];
        $buku->penerbit = $request['penerbit'];
        $buku->harga = $request['harga'];
        $buku->save();

        return response()->json([
            'status' => true,
            'data' => "Berhasil"
        ]);
    }

    public function getBuku()
    {
        $buku = Buku::get();
        return response()->json([
            'status' => true,
            'data' => $buku
        ]);
    }

    public function deleteBuku(Request $request)
    {
        $buku = Buku::where('id', $request['idbuku'])->first();
        $buku->delete();
        return response()->json([
            'status' => true,
            'data' => "Berhasil"
        ]);  
    }

    public function editBuku(Request $request)
    {
        $buku = Buku::where('id', $request['id'])->first();
        return response()->json($buku);
    }

    public function update(Request $request)
    {
        $buku = Buku::where('id', $request['idBuku'])->first();
        $buku->judul_buku = $request['judul'];
        $buku->pengarang = $request['pengarang'];
        $buku->penerbit = $request['penerbit'];
        $buku->harga = $request['harga'];
        $buku->save();

        return response()->json([
            'status' => true,
            'data' => "Berhasil"
        ]);
    }
}
