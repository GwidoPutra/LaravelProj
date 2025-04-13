@empty($penjualan)
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                    Data yang anda cari tidak ditemukan
                </div>
                <a href="{{ url('/penjualan') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@else
    <form action="{{ url('/penjualan/' . $penjualan->penjualan_id . '/update_ajax') }}" method="POST" id="form-edit">
        @csrf
        @method('PUT')
        <div id="modal-master" class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Penjualan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                    <div class="form-group">
                        <label>Kode Penjualan</label>
                        <input type="text" name="penjualan_kode" class="form-control" value="{{ $penjualan->penjualan_kode }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Pembeli</label>
                        <input type="text" name="pembeli" id="pembeli" class="form-control" value="{{ $penjualan->pembeli }}" required>
                        <small id="error-pembeli" class="error-text form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Penjualan</label>
                        <input type="date" name="penjualan_tanggal" id="penjualan_tanggal" class="form-control" value="{{ \Carbon\Carbon::parse($penjualan->penjualan_tanggal)->format('Y-m-d') }}" readonly>
                        <small id="error-penjualan_tanggal" class="error-text form-text text-danger"></small>
                    </div>

                    <!-- Barang Table -->
                    <div class="form-group">
                        <label>Barang</label>
                        <div id="barang-container">
                            @foreach ($penjualan->detail as $detail)
                                <div class="barang-item">
                                    <div class="row">
                                        <div class="col-5">
                                            <select name="barang_id[]" class="form-control select-barang" required>
                                                @foreach ($barang as $b)
                                                    <option value="{{ $b->barang_id }}" 
                                                            data-harga="{{ $b->barang_harga }}"
                                                            {{ $b->barang_id == $detail->barang_id ? 'selected' : '' }}>
                                                        {{ $b->barang_nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <input type="number" name="jumlah[]" class="form-control" value="{{ $detail->jumlah }}" required>
                                        </div>
                                        <div class="col-3">
                                            <input type="text" name="harga[]" class="form-control" value="{{ $detail->harga }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function () {
            // Function to update the price based on quantity and selected item
            function updateHarga($row) {
                let selectedOption = $row.find('select option:selected');
                let hargaSatuan = selectedOption.data('harga') || 0;
                let jumlah = parseInt($row.find('input[name="jumlah[]"]').val()) || 0;
                let total = hargaSatuan * jumlah;
                $row.find('input[name="harga[]"]').val(total);
            }

            // Trigger update harga when quantity changes
            $(document).on('input', 'input[name="jumlah[]"]', function () {
                let $row = $(this).closest('.barang-item');
                updateHarga($row);
            });

            $(document).on('change', 'select[name="barang_id[]"]', function () {
                let $row = $(this).closest('.barang-item');
                updateHarga($row);
            });

            $("#form-edit").validate({
                rules: {
                    pembeli: { required: true, maxlength: 40 },
                    penjualan_tanggal: { required: true, date: true }
                },
                submitHandler: function (form) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function (response) {
                            if (response.status) {
                                $('#myModal').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message
                                });
                                dataPenjualan.ajax.reload();
                            } else {
                                $('.error-text').text('');
                                $.each(response.msgField, function (prefix, val) {
                                    $('#error-' + prefix).text(val[0]);
                                });
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Terjadi Kesalahan',
                                    text: response.message
                                });
                            }
                        }
                    });
                    return false;
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endempty
