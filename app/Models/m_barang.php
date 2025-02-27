<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\Factory;
use database\Factories\m_barangFactory;

class m_barang extends Model
{


    use HasFactory;
    // protected static function newFactory(): Factory
    // {
    //     return m_barangFactory::new();
    // }
    protected $fillable = [
        'kategori_id',
        'barang_kode',
        'barang_nama',
        'harga_beli',
        'harga_jual',
        'created_at',
        'updated_at'
    ];
}
