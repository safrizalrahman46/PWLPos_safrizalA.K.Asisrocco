<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PenjualanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenjualanController extends Controller
{
    public function index()
    {
        return PenjualanModel::all();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer|exists:m_user,user_id',
            'penjualan_kode' => 'required|string|min:3|unique:t_penjualan,penjualan_kode',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $penjualan = PenjualanModel::create([
            'user_id' => $request->user_id,
            'penjualan_kode' => $request->penjualan_kode,
            'penjualan_tanggal' => $request->now(),
        ]);

        if ($penjualan) {
            return response()->json([
                'success' => true,
                'message' => 'Penjualan registered successfully',
                'penjualan' => $penjualan,
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Penjualan registration failed',
            ], 409);
        }
    }

    public function show(PenjualanModel $penjualan)
    {
        $penjualan->load('details'); // Mengambil data penjualan beserta detail-nya
        return response()->json($penjualan);
    }

    public function update(Request $request, PenjualanModel $penjualan)
    {
        $penjualan->update($request->all());
        return PenjualanModel::find($penjualan);
    }

    public function destroy(PenjualanModel $penjualan)
    {
        $penjualan->delete();
        return response()->json([
            'success' => true,
            'message' => 'Penjualan deleted successfully',
        ]);
    }
}
