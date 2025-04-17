<?php

namespace App\Http\Controllers;

use App\Models\t_penjualan;
use App\Models\m_barang;
use App\Models\t_penjualan_detail;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PenjualanDetailController extends Controller
{
    // Halaman utama detail penjualan
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Detail Penjualan',
            'list' => ['Home', 'Penjualan', 'Detail']
        ];

        $page = (object) [
            'title' => 'Daftar Detail Penjualan'
        ];

        $penjualan = t_penjualan::all();
        $activeMenu = 'penjualan_detail';
        $barangs = m_barang::all();

        return view('penjualan_detail.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'penjualan' => $penjualan,
            'barangs' => $barangs,
            'activeMenu' => $activeMenu
        ]);
    }

    // List untuk DataTables
    public function list(Request $request)
    {
        $data = t_penjualan_detail::with(['penjualan', 'barang']);

        if ($request->filled('penjualan_id')) {
            $data->where('penjualan_id', $request->penjualan_id);
        }

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('penjualan_id', function ($row) {
                return $row->penjualan ? $row->penjualan->penjualan_kode : '-';
            })
            // ->addColumn('barang_id', function ($row) {
            //     return $row->barang ? $row->barang->nama_barang : '-';
            // })
              // ->addColumn('barang_id', function ($row) {
            //     return $row->barang ? $row->barang->nama_barang : '-';
            // })
            ->addColumn('barang_id', function ($row) {
                return $row->barang_id ? $row->barang->barang_nama : 'NO RELATION';
            })

            ->addColumn('subtotal', fn($row) => $row->jumlah * $row->harga)
            ->addColumn('aksi', function ($row) {
                $btn  = '<button onclick="modalAction(\'' . url('/penjualan-detail/' . $row->detail_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/penjualan-detail/' . $row->detail_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/penjualan-detail/' . $row->detail_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }


    // Tampilkan form create via modal
    public function create_ajax()
    {
        $penjualan = t_penjualan::all();
        $barangs = m_barang::all(); // <- Tambahkan ini

        return view('penjualan_detail.create_ajax', compact('penjualan', 'barangs'));
    }

    // Simpan detail baru via AJAX
    public function store_ajax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'penjualan_id' => 'required|exists:t_penjualan,penjualan_id',
            'barang_id'    => 'required|string|max:100',
            'jumlah'       => 'required|integer',
            'harga'        => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'msgField' => $validator->errors()]);
        }

        t_penjualan_detail::create($request->all());
        return response()->json(['status' => true, 'message' => 'Detail penjualan berhasil disimpan']);
    }

    // Tampilkan detail via modal
    public function show_ajax($id)
    {
        $data = t_penjualan_detail::with(['penjualan', 'barang'])->find($id);
        return view('penjualan_detail.show_ajax', compact('data'));
    }

    // Form edit via modal
    public function edit_ajax($id)
    {
        $data = t_penjualan_detail::find($id);
        $penjualan = t_penjualan::all();
        $barangs = m_barang::all(); // Tambahkan ini

        return view('penjualan_detail.edit_ajax', [
            'penjualanDetail' => $data,
            'penjualan' => $penjualan,
            'barangs' => $barangs // Tambahkan ini juga ke view
        ]);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Detail Penjualan',
            'list' => ['Home', 'Penjualan Detail', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah data detail penjualan baru'
        ];

        $penjualan = t_penjualan::all(); // Ambil semua penjualan untuk dropdown
        $barangs = m_barang::all(); // ← Tambahkan ini
        $activeMenu = 'penjualan_detail';

        return view('penjualan_detail.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'penjualan' => $penjualan,
            'barangs' => $barangs, // ← Tambahkan ini
            'activeMenu' => $activeMenu
        ]);
    }




    // Update detail via AJAX
    public function update_ajax(Request $request, $id)
    {
        $data = t_penjualan_detail::find($id);
        if (!$data) return response()->json(['status' => false, 'message' => 'Data tidak ditemukan']);

        $validator = Validator::make($request->all(), [
            'penjualan_id' => 'required|exists:t_penjualan,penjualan_id',
            'barang_id'    => 'required|string|max:100',
            'jumlah'       => 'required|integer',
            'harga'        => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'msgField' => $validator->errors()]);
        }

        $data->update($request->all());
        return response()->json(['status' => true, 'message' => 'Data berhasil diperbarui']);
    }

    // Hapus detail via AJAX
    public function delete_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $data = t_penjualan_detail::find($id);

            if ($data) {
                try {
                    $data->delete();
                    return response()->json(['status' => true, 'message' => 'Data berhasil dihapus']);
                } catch (\Exception $e) {
                    return response()->json(['status' => false, 'message' => 'Gagal menghapus data']);
                }
            }

            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan']);
        }

        return redirect('/');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'penjualan_id' => 'required|exists:t_penjualan,penjualan_id',
            'barang_id'    => 'required|string|max:100',
            'jumlah'       => 'required|integer',
            'harga'        => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        t_penjualan_detail::create($request->all());

        return redirect()->route('penjualan-detail.index')->with('success', 'Data berhasil disimpan');
    }

    public function show($id)
    {
        $data = t_penjualan_detail::with(['penjualan', 'barang'])->find($id);
        if (!$data) return redirect()->back()->with('error', 'Data tidak ditemukan');

        $breadcrumb = (object) [
            'title' => 'Detail Data Penjualan',
            'list' => ['Home', 'Penjualan Detail', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Data Penjualan'
        ];

        return view('penjualan_detail.show', compact('data', 'breadcrumb', 'page'));
    }

    public function confirm_ajax($id)
{
    $penjualanDetail = t_penjualan_detail::find($id);

    return view('penjualan_detail.confirm_ajax', compact('penjualanDetail'));
}

}
