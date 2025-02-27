<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use App\Models\m_barang;
use Database\Factories\m_barangFactory;
use Database\Factories\BarangFactory;

class m_barang extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $data = [
        //     ['kategori_id' => 1, 'barang_kode' => 'TV001', 'barang_nama' => 'TV Samsung', 'harga_beli' => 4000000, 'harga_jual' => 5000000],
        //     ['kategori_id' => 1, 'barang_kode' => 'HP002', 'barang_nama' => 'HP iPhone', 'harga_beli' => 8000000, 'harga_jual' => 9000000],
        //     ['kategori_id' => 2, 'barang_kode' => 'T001', 'barang_nama' => 'T-shirt', 'harga_beli' => 50000, 'harga_jual' => 100000],
        //     ['kategori_id' => 2, 'barang_kode' => 'J001', 'barang_nama' => 'Jaket', 'harga_beli' => 150000, 'harga_jual' => 200000],
        //     ['kategori_id' => 3, 'barang_kode' => 'M001', 'barang_nama' => 'Mie Instan', 'harga_beli' => 2500, 'harga_jual' => 5000],
        //     ['kategori_id' => 3, 'barang_kode' => 'M002', 'barang_nama' => 'Biskuit', 'harga_beli' => 8000, 'harga_jual' => 12000],
        //     ['kategori_id' => 4, 'barang_kode' => 'P001', 'barang_nama' => 'Kompor Gas', 'harga_beli' => 400000, 'harga_jual' => 600000],
        //     ['kategori_id' => 4, 'barang_kode' => 'P002', 'barang_nama' => 'Blender', 'harga_beli' => 300000, 'harga_jual' => 450000],
        //     ['kategori_id' => 5, 'barang_kode' => 'TOY1', 'barang_nama' => 'Boneka', 'harga_beli' => 100000, 'harga_jual' => 150000],
        //     ['kategori_id' => 5, 'barang_kode' => 'TOY2', 'barang_nama' => 'Mobil-Mobilan', 'harga_beli' => 50000, 'harga_jual' => 75000],
        // ];
        // DB::table('m_barang')->insert($data);
        m_barangFactory::factory(10)->create();
        BarangFactory::factory(10)->create();

    }
}
