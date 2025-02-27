<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class t_stok extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // Ambil barang yang tersedia
            $barang = DB::table('m_barang')->pluck('barang_id')->toArray();

            if (empty($barang)) {
                $this->command->warn('Tidak ada barang di m_barang, seeder dihentikan.');
                return;
            }

            // Seed data untuk t_stok
            for ($i = 0; $i < 10; $i++) {
                DB::table('t_stok')->insert([
                    'barang_id'    => $barang[array_rand($barang)], // Pilih barang acak
                    'user_id'      => 1, // Ganti sesuai dengan user_id yang ada
                    'stok_tanggal' => Carbon::now()->subDays(rand(1, 30)),
                    'stok_jumlah'  => rand(5, 50),
                    'created_at'   => now(),
                    'updated_at'   => now(),
                ]);
            }
        }
}
