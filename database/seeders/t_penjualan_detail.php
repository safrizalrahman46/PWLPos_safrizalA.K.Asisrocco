<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class t_penjualan_detail extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil daftar penjualan dan barang dari database
        $penjualan = DB::table('t_penjualan')->pluck('penjualan_id')->toArray();
        $barang = DB::table('m_barang')->pluck('barang_id')->toArray();

        if (empty($penjualan) || empty($barang)) {
            $this->command->warn('Tidak ada data di t_penjualan atau m_barang, seeder dihentikan.');
            return;
        }

        // Loop untuk menambahkan detail penjualan
        foreach ($penjualan as $penjualan_id) {
            DB::table('t_penjualan_detail')->insert([
                'penjualan_id' => $penjualan_id,
                'barang_id'    => $barang[array_rand($barang)], // Ambil barang secara acak
                'harga'        => rand(5000, 50000),
                'jumlah'       => rand(1, 5),
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }
    }
}
