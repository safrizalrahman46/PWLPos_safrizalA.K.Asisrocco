<?php

namespace App\Http\Controllers;

use App\Models\t_penjualan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Models\UserModel;

class PenjualanController extends Controller
{
    // Halaman utama penjualan
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Penjualan',
            'list' => ['Home', 'Penjualan']
        ];
        $page = (object) [
            'title' => 'Daftar Penjualan yang terdaftar dalam sistem'
        ];
        $kategori = t_penjualan::all();
        $users = UserModel::all();
        $activeMenu = 'penjualan';

        return view('penjualan.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'kategori' => $kategori,
            'activeMenu' => $activeMenu,
            'users' => $users
        ]);
    }


    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Penjualan',
            'list' => ['Home', 'Penjualan', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah data penjualan baru'
        ];

        $users = UserModel::all(); // ambil user dari tabel m_user
        $activeMenu = 'penjualan';

        return view('penjualan.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'users' => $users,
            'activeMenu' => $activeMenu
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'pembeli' => 'required|string|min:3',
            'penjualan_kode' => 'required|unique:t_penjualan,penjualan_kode',
            'penjualan_tanggal' => 'required|date',
        ]);

        t_penjualan::create($request->all());

        return redirect('/penjualan')->with('success', 'Data penjualan berhasil disimpan');
    }


    // Konfirmasi data penjualan via modal (AJAX)
    public function confirm_ajax($id)
    {
        $penjualan = t_penjualan::find($id);

        if (!$penjualan) {
            return view('penjualan.error_modal'); // atau langsung lempar view modal error
        }

        return view('penjualan.confirm_ajax', compact('penjualan'));
    }


    // List data penjualan untuk DataTables AJAX
    public function list(Request $request)
    {
        $data = t_penjualan::with(relations: 'user')->select('*');

        if ($request->filled('user_id')) {
            $data->where('user_id', $request->user_id);
        }

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('user', function ($row) {
                return $row->user->nama ?? '-';
            })
            ->addColumn('aksi', function ($row) {
                $btn  = '<button onclick="modalAction(\'' . url('/penjualan/' . $row->penjualan_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/penjualan/' . $row->penjualan_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/penjualan/' . $row->penjualan_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    // Simpan data baru via AJAX
    public function store_ajax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:m_user,user_id', // ganti ini
            'pembeli' => 'required|string|min:3',
            'penjualan_kode' => 'required|unique:t_penjualan,penjualan_kode',
            'penjualan_tanggal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'msgField' => $validator->errors()]);
        }

        t_penjualan::create($request->all());
        return response()->json(['status' => true, 'message' => 'Data penjualan berhasil disimpan']);
    }


    // Tampilkan detail via modal
    public function show_ajax($id)
{
    $penjualan = t_penjualan::with('user')->find($id); // tambahkan relasi user
    return view('penjualan.show_ajax', compact('penjualan'));
}


    // Edit data penjualan via modal
    public function edit_ajax($id)
    {
        $penjualan = t_penjualan::find($id);
        $users = UserModel::all();
        return view('penjualan.edit_ajax', compact('penjualan', 'users'));
    }

    // Update data penjualan via AJAX
    public function update_ajax(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'pembeli' => 'required|string|min:3',
            'penjualan_kode' => "required|unique:t_penjualan,penjualan_kode,{$id},penjualan_id",
            'penjualan_tanggal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'msgField' => $validator->errors()
            ]);
        }

        $penjualan = t_penjualan::find($id);
        $penjualan->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diperbarui'
        ]);
    }

    // Hapus data penjualan via AJAX

    // Form create via modal (AJAX)
    public function create_ajax()
    {
        $users = UserModel::all();
        return view('penjualan.create_ajax', compact('users'));
    }


    public function delete_ajax(Request $request, $id)
    {
        // Pastikan hanya terima request dari AJAX atau JSON
        if ($request->ajax() || $request->wantsJson()) {
            // Ambil data penjualan berdasarkan ID
            $penjualan = t_penjualan::find($id);

            if ($penjualan) {
                try {
                    // Coba hapus datanya
                    $penjualan->delete();

                    return response()->json([
                        'status' => true,
                        'message' => 'Data berhasil dihapus'
                    ]);
                } catch (\Illuminate\Database\QueryException $e) {
                    // Tangani error karena relasi ke tabel lain
                    return response()->json([
                        'status' => false,
                        'message' => 'Data gagal dihapus karena masih terkait dengan data lain'
                    ]);
                }
            } else {
                // Data tidak ditemukan
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }

        // Jika bukan AJAX/JSON, redirect ke halaman utama
        return redirect('/');
    }

}
