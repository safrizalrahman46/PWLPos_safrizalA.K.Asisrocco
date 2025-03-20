<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Models\m_level;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {

        $breadcrumb = (object) [
            'title' => 'User',
            'list' => ['Home', 'User']
        ];
        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];
        $activeMenu = 'user';

        $level = m_level::all();
        return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    // Ambil data user dalam bentuk json untuk datatables
    public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
            ->with('level');

        if ($request->ajax()) {
            if ($request->level_id) {
                $users->where('level_id', $request->level_id);
            }
        }

        return DataTables::of($users)
            // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addIndexColumn()
            // ->addColumn('aksi', function ($user) { // menambahkan kolom aksi
            //     $btn = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
            //     $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
            //     $btn .= '<form class="d-inline-block" method="POST" action="' . url('/user/' . $user->user_id) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\')">Hapus</button></form>';
            //     return $btn;
            // })
            ->addColumn('aksi', function ($user) { // Menambahkan kolom aksi
                // Tombol Detail
                $btn = '<button onclick="modalAction(\'' . url('/user/' . $user->user_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';

                // Tombol Edit
                $btn .= '<button onclick="modalAction(\'' . url('/user/' . $user->user_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';

                // Tombol Hapus
                $btn .= '<button onclick="modalAction(\'' . url('/user/' . $user->user_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';

                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }



    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah User',
            'list' => ['Home', 'User', 'Tambah']
        ];
        $page = (object) [
            'title' => 'Tambah user baru'
        ];
        $level = m_level::all();
        $activeMenu = 'user';
        return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'level_id' => 'required | integer',
            'username' => 'required | string | min:3 | unique:m_user,username',
            'nama' => 'required | string | max:100',
            'password' => 'required | min:5'
        ]);

        UserModel::create([
            'level_id' => $request->level_id,
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/user')->with('success', 'Data user berhasil ditambahkan');
    }

    public function show($id)
    {
        $breadcrumb = (object) [
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Detail']
        ];
        $page = (object) [
            'title' => 'Detail user'
        ];
        $user = UserModel::with('level')->find($id);
        $activeMenu = 'user';
        return view('user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function edit(string $id)
    {
        $user = UserModel::find($id);
        $level = m_level::all();
        $breadcrumb = (object) [
            'title' => 'Edit User',
            'list' => ['Home', 'User', 'Edit']
        ];
        $page = (object) [
            'title' => 'Edit user'
        ];
        $activeMenu = 'user';
        return view('user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'level_id' => 'required | integer',
            'username' => 'required | string | min:3 | unique:m_user,username,' . $id . ',user_id',
            'nama' => 'required | string | max:100',
            'password' => 'nullable | min:5'
        ]);

        $user = UserModel::find($id);
        $user->level_id = $request->level_id;
        $user->username = $request->username;
        $user->nama = $request->nama;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect('/user')->with('success', 'Data user berhasil diubah');
    }

    public function destroy(int $id)
    {
        $check = UserModel::find($id);
        if (!$check) {
            return redirect('/user')->with('error', 'Data user tidak ditemukan');
        }
        try {
            UserModel::destroy($id);
            return redirect('/user')->with('success', 'Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/user')->with('error', 'Data user tidak bisa dihapus karena masih terdapat data terkait');
        }
    }

    public function create_ajax()
    {
        $level = m_level::select('level_id', 'level_nama')->get();

        return view('user.create_ajax')
            ->with('level', $level);
    }

    public function store_ajax(Request $request)
    {
        // Cek apakah request berupa ajax
        if ($request->ajax() || $request->wantsJson()) {
            // Aturan validasi
            $rules = [
                'level_id' => 'required|integer',
                'username' => 'required|string|min:3|unique:m_user,username',
                'nama' => 'required|string|max:100',
                'password' => 'required|min:6'
            ];

            // Validasi input
            $validator = Validator::make($request->all(), $rules);

            // Jika validasi gagal
            if ($validator->fails()) {
                return response()->json([
                    'status' => false, // Status response, false: error/gagal
                    'message' => 'Validasi Gagal',
                    'msgfield' => $validator->errors(), // Pesan error validasi
                ]);
            }

            // Simpan data ke database
            UserModel::create($request->all());

            // Response jika berhasil
            return response()->json([
                'status' => true,
                'message' => 'Data user berhasil disimpan'
            ]);
        }

        // Redirect jika request bukan ajax
        return redirect('/');
    }

    // Menampilkan halaman form edit user ajax
    public function edit_ajax(string $id)
    {
        $user = UserModel::find($id);
        $level = m_level::select('level_id', 'level_nama')->get();

        return view('user.edit_ajax', ['user' => $user, 'level' => $level]);
    }


    public function update_ajax(Request $request, $id)
    {
        // cek apakah request dari ajax
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_id' => 'required|integer',
                'username' => 'required|max:20|unique:m_user,username,' . $id . ',user_id',
                'nama'     => 'required|max:100',
                'password' => 'nullable|min:6|max:20'
            ];

            // use Illuminate\Support\Facades\Validator;
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status'   => false,    // respon json, true: berhasil, false: gagal
                    'message'  => 'Validasi gagal.',
                    'msgField' => $validator->errors()  // menunjukkan field mana yang error
                ]);
            }

            $check = UserModel::find($id);
            if ($check) {
                if (!$request->filled('password')) { // jika password tidak diisi, maka hapus dari    request

                    $request->request->remove('password');
                }

                $check->update($request->all());
                return response()->json([
                    'status'  => true,
                    'message' => 'Data berhasil diupdate'
                ]);
            } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
    }

    public function confirm_ajax(string $id)
    {
        $user = UserModel::find($id);

        return view('user. confirm_ajax', ['user' => $user]);
    }

    public function delete_ajax(Request $request, $id)
    {
        // cek apakah request dari ajax
        if ($request->ajax() || $request->wantsJson()) {
            $user = UserModel::find($id);
            if ($user) {
                $user->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil dihapus'

                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'

                ]);
            }
        }
        return redirect('/');
    }
}
