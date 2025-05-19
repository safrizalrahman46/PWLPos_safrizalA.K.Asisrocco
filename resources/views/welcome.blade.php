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
    <!-- Card Merah -->
    <div class="col-md-4">
        <div class="card text-white bg-danger mb-3">
            <div class="card-header">Profil</div>
            <div class="card-body">
                <h5 class="card-title">Nama</h5>
                <p class="card-text">Diana</p>
            </div>
        </div>
    </div>

    <!-- Card Hijau -->
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-header">Status</div>
            <div class="card-body">
                <h5 class="card-title">Aktif</h5>
                <p class="card-text">Mahasiswa semester 6</p>
            </div>
        </div>
    </div>

    <!-- Card Biru -->
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">Motivasi</div>
            <div class="card-body">
                <h5 class="card-title">Belajar Laravel</h5>
                <p class="card-text">Ingin menjadi web developer handal.</p>
            </div>
        </div>
    </div>
</div>
@endsection
