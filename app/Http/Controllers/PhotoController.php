<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        return "Menampilkan daftar foto";
    }

    public function create()
    {
        return "Form untuk menambahkan foto";
    }

    public function store(Request $request)
    {
        return "Menyimpan foto ";
    }

    public function show($id)
    {
        return "Menampilkan foto dengan ID " . $id;
    }

    public function edit($id)
    {
        return "Form untuk mengedit foto dengan ID " . $id;
    }

    public function update(Request $request, $id)
    {
        return "Mengupdate foto dengan ID " . $id;
    }

    public function destroy($id)
    {
        return "Menghapus foto dengan ID " . $id;
    }
}
