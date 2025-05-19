<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function index(){
        return BarangModel::all();
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'barang_kode' => 'required|unique:m_barang,barang_kode',
            'barang_nama' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'kategori_id' => 'required|exists:m_kategori,kategori_id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $barang = BarangModel::create([
            'barang_kode' => $request->barang_kode,
            'barang_nama' => $request->barang_nama,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'kategori_id' => $request->kategori_id,
            // 'image' => $request->image->hashName()
                'image' => $request->image ?? 'default.jpg', // <-- tambahkan ini

        ]);

        if ($barang) {
            return response()->json([
                'success' => true,
                'message' => 'Barang registered successfully',
                'barang' => $barang,
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Barang registration failed',
            ], 409);
        }
    }

    public function show(BarangModel $barang){
        return BarangModel::find($barang);
    }

    public function update(Request $request, BarangModel $barang){
        $barang->update($request->all());
        return BarangModel::find($barang);
    }

    public function destroy(BarangModel $barang){
        $barang->delete();
        return response()->json([
            'success' => true,
            'message' => 'Barang deleted successfully',
        ]);
    }
}
