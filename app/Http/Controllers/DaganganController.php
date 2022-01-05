<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dagangan;

class DaganganController extends Controller
{
    public function storeDagangan(Request $request)
    {
        $dagangan = new Dagangan();
        $dagangan->suplier = $request->suplier;
        $dagangan->nama_barang = $request->nama_barang;
        $dagangan->qunatity = $request->quantity;
        $dagangan->agen = $request->agen;
        $dagangan->save();
        return response()->json([
            'status' => true,
            'data' => $dagangan
        ]);
    }
}
