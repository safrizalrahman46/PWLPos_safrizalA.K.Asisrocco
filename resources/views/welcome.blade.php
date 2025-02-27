<|DOCTYPE html>
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

        @if(isset($name))
            <p>Selamat datang, {{ $name }}!</p>
        @endif
    </body>
    </html>

