<?php

namespace Database\Factories;

use App\Models\m_barang;
use Illuminate\Database\Eloquent\Factories\Factory;
// use App\Models\m_barang;

// use App\m_barangFactory;
use Faker\Generator as faker;


// /**
//  * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
//  */
class m_barangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    // protected $model = m_barang::class;
    // protected $model = m_barang::class;

    public function definition(): array
    {
        return [
            'kategori_id' => rand(1, 5),
            'barang_kode' => $this->faker->unique()->bothify('B####'),
            'barang_nama' => $this->faker->word(),
            'harga_beli'  => rand(50000, 900000),
            'harga_jual'  => rand(70000, 1200000),
            'created_at'  => now(),
            'updated_at'  => now(),
        ];
    }
}
