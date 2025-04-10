@empty($penjualan)
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kesalahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                    Data penjualan tidak ditemukan.
                </div>
                <a href="{{ url('/penjualan') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@else
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Data Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="alert alert-info">
                    <h5><i class="icon fas fa-info-circle"></i> Informasi</h5>
                    Berikut adalah detail data penjualan yang dipilih.
                </div>

                <table class="table table-sm table-bordered table-striped">
                    <tr>
                        <th class="text-right col-4">Kode Penjualan:</th>
                        <td class="col-8">{{ $penjualan->penjualan_kode }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-4">Tanggal Penjualan:</th>
                        <td class="col-8">{{ $penjualan->penjualan_tanggal }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-4">Pembeli:</th>
                        <td class="col-8">{{ $penjualan->pembeli }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-4">User:</th>
                        <td class="col-8">{{ $penjualan->user->nama ?? '-' }}</td>
                    </tr>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
@endempty
