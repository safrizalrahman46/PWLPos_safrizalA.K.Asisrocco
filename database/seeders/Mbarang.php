<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\m_barang;  // Make sure this points to the correct model
use Database\Factories\BarangFactory;

class Mbarang extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        BarangFactory::factory(10)->create();  // or your seeding logic
    }
}
