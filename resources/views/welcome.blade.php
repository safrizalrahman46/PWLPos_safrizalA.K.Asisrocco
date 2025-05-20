{{--  <|DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PWL 2024</title>
    </head>
    <body>
        <h2>Pemrograman Web Lanjut 2024</h2>
        <h3>Semangat Belajar Laravel 10</h3>
        <h1>Pemrograman Web Lanjut 2024</h1>
        <p>Semangat Belajar Laravel 10</p>

        @if (isset($name))
            <p>Selamat datang, {{ $name }}!</p>
        @endif
    </body>
    </html>
  --}}


{{--  @extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Halo, apakabar !!!< /h3>
                    <div class="card-tools"></div>
        </div>
        <div class="card-body">
            Selamat datang semua, ini adalah halaman utama dari aplikasi ini.
        </div>
    </div>
@endsection  --}}


@extends('layouts.template')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Halo, apakabar !!!< /h3>
                <div class="card-tools"></div>
    </div>
    <div class="card-body">
        Selamat datang semua, ini adalah halaman utama dari aplikasi ini.
    </div>
</div>
<div class="row">
    <!-- Card 1: Jumlah User -->
    <div class="col-md-4">
        <div class="card text-white bg-danger mb-3">
            <div class="card-header">Total Pengguna</div>
            <div class="card-body">
                <h5 class="card-title">User Terdaftar</h5>
                <p class="card-text">{{ App\Models\UserModel::count() }} orang</p>
            </div>
        </div>
    </div>

    <!-- Card 2: Jumlah Barang -->
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-header">Total Barang</div>
            <div class="card-body">
                <h5 class="card-title">Barang Tersedia</h5>
                <p class="card-text">
                    {{ App\Models\BarangModel::count() }} item
                </p>
            </div>
        </div>
    </div>

    <!-- Card 3: Transaksi Terakhir -->
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">Transaksi Terakhir</div>
            <div class="card-body">
                <h5 class="card-title">Penjualan</h5>
                <p class="card-text">
                    @php
                        $lastSale = App\Models\t_penjualan::latest()->first();
                        echo $lastSale ? 'ID: '.$lastSale->penjualan_id : 'Belum ada transaksi';
                    @endphp
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Row 2 -->
<div class="row mt-3">
    <!-- Card 4: Kategori Barang -->
    <div class="col-md-4">
        <div class="card text-white bg-info mb-3">
            <div class="card-header">Kategori Barang</div>
            <div class="card-body">
                <h5 class="card-title">Jumlah Kategori</h5>
                <p class="card-text">
                    {{ App\Models\KategoriModel::count() }} kategori
                </p>
            </div>
        </div>
    </div>

    <!-- Card 5: Stok Barang -->
    <div class="col-md-4">
        <div class="card text-white bg-warning mb-3">
            <div class="card-header">Stok Barang</div>
            <div class="card-body">
                <h5 class="card-title">Total Stok</h5>
                <p class="card-text">
                    {{ App\Models\t_stok::sum('stok_jumlah') }} unit
                </p>
            </div>
        </div>
    </div>

    <!-- Card 6: Level User -->
    <div class="col-md-4">
        <div class="card text-white bg-secondary mb-3">
            <div class="card-header">Level Pengguna</div>
            <div class="card-body">
                <h5 class="card-title">Jumlah Level</h5>
                <p class="card-text">
                    {{ App\Models\LevelModel::count() }} level
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
