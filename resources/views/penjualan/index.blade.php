@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('penjualan/create') }}">Tambah</a>
                <button onclick="modalAction('{{ url('penjualan/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah
                    Ajax</button>
            </div>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            {{-- 🔽 Filter Dropdown User --}}
            <div class="mb-3">
                <label for="filter_user">Filter User:</label>
                <select id="filter_user" class="form-control form-control-sm" style="width: 200px; display: inline-block;">
                    <option value="">- Semua User -</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->user_id }}">{{ $user->nama }}</option>
                    @endforeach
                </select>
            </div>

            <table class="table table-bordered table-striped table-hover table-sm" id="table_penjualan">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Pembeli</th>
                        <th>User</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    {{-- Modal untuk aksi AJAX --}}
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static"
        data-keyboard="false" data-width="75%" aria-hidden="true"></div>
@endsection

@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }

        var dataPenjualan;
        $(document).ready(function () {
            $('#filter_user').change(function () {
                dataPenjualan.ajax.reload(); // reload saat filter berubah
            });

            dataPenjualan = $('#table_penjualan').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('penjualan/list') }}",
                    type: "POST",
                    data: function (d) {
                        d.user_id = $('#filter_user').val(); // kirim user_id ke controller
                    }
                },
                columns: [
                    {
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "penjualan_kode",
                        className: "text-center"
                    },
                    {
                        data: "pembeli"
                    },
                    {
                        data: "user"
                    },
                    {
                        data: "penjualan_tanggal",
                        className: "text-center"
                    },
                    {
                        data: "aksi",
                        orderable: false,
                        searchable: false,
                        className: "text-center"
                    }
                ]
            });
        });

    </script>
@endpush
