<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['supplier_kode' => 'S001', 'supplier_nama' => 'Supplier 1', 'supplier_alamat' => 'Jl. Supplier 1'],
            ['supplier_kode' => 'S002', 'supplier_nama' => 'Supplier 2', 'supplier_alamat' => 'Jl. Supplier 2'],
            ['supplier_kode' => 'S003', 'supplier_nama' => 'Supplier 3', 'supplier_alamat' => 'Jl. Supplier 3'],
        ];
        DB::table('m_supplier')->insert($data);
    }
}
