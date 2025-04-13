<div id="modal-master" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Data Penjualan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <tr>
                    <th>ID</th>
                    <td>{{ $penjualan->penjualan_id }}</td>
                </tr>
                <tr>
                    <th>Pembeli</th>
                    <td>{{ $penjualan->pembeli }}</td>
                </tr>
                <tr>
                    <th>Staf</th>
                    <td>{{ $penjualan->user->nama }} ({{ $penjualan->user->level->level_nama }})</td>
                </tr>
                <tr>
                    <th>Penjualan Kode</th>
                    <td>{{ $penjualan->penjualan_kode }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ $penjualan->penjualan_tanggal }}</td>
                </tr>
            </table>
            <p class="text-bold">Detail Penjualan :</p>
            <td>
                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Detail ID</th>
                            <th>Barang ID</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp

                        @foreach ($penjualan->detail as $d)
                                                @php
                                                    $subtotal = $d->harga * $d->jumlah;
                                                    $total += $subtotal;
                                                @endphp
                                                <tr>
                                                    <td>{{ $d->detail_id }}</td>
                                                    <td>{{ $d->barang->barang_nama }}</td>
                                                    <td>Rp.{{ number_format($d->harga, 0, ',', '.') }}</td>
                                                    <td>{{ $d->jumlah }}</td>
                                                    <td>Rp.{{ number_format($subtotal, 0, ',', '.') }}</td>
                                                </tr>
                        @endforeach

                        <tr>
                            <td colspan="4" class="text-end"><strong>Total</strong></td>
                            <td><strong>Rp.{{ number_format($total, 0, ',', '.') }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </div>
    </div>