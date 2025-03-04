<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        table {
            margin: 0 auto;
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>Data User</h1>

    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>ID Level Pengguna</th>
            <th>Jumlah Pengguna</th> <!-- Tambahkan data di kolom ini -->
        </tr>
        {{--  @foreach ($users as $user)  --}}
        <tr>
            <td>{{ $data->user_id }}</td>
            <td>{{ $data->username }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->level_id }}</td>
            {{--  <td>
                {{ $users->where('level_id', $user->level_id)->count() }} <!-- Menampilkan jumlah pengguna dengan level yang sama -->
            </td>  --}}
        </tr>
        {{--  @endforeach  --}}
    </table>

    {{--  <h2>Jumlah Pengguna dengan Level 2: {{ $jumlah_pengguna }}</h2>  --}}
</body>
</html>


<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        table {
            margin: 0 auto;
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>Data User</h1>

    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>ID Level Pengguna</th>
            <th>Jumlah Pengguna</th> <!-- Tambahkan data di kolom ini -->
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->user_id }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->nama }}</td>
            <td>{{ $user->level_id }}</td>
            <td>
                {{ $users->where('level_id', $user->level_id)->count() }} <!-- Menampilkan jumlah pengguna dengan level yang sama -->
            </td>
        </tr>
        @endforeach
    </table>

    <h2>Jumlah Pengguna dengan Level 2: {{ $jumlah_pengguna }}</h2>
</body>
</html>
