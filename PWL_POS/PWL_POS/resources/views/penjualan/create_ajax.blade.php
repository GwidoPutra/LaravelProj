<form action="{{ url('/penjualan/ajax') }}" method="POST" id="form-tambah">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Anda Sebagai :</label>
                    <select name="user_id" id="user_id" class="form-control" disabled>
                        <option value="{{ $user->user_id }}" selected>{{ $user->nama }} ({{ $user->level->level_nama }})
                        </option>
                    </select>
                    <small id="error-user-id" class="error-text form-text text-danger"></small>

                    <!-- Ini input hidden agar user_id tetap dikirim ke server -->
                    <input type="hidden" name="user_id" value="{{ $user->user_id }}">

                </div>
                <div class="form-group">
                    <label>Pembeli</label>
                    <input value="" type="text" name="pembeli" id="pembeli" class="form-control" required>
                    <small id="error-pembeli" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Penjualan Kode</label>
                    <input type="text" name="penjualan_kode" id="penjualan_kode" class="form-control"
                        value="{{ old('penjualan_kode', $kode) }}" readonly required>
                    <small id="error-penjualan-kode" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="datetime-local" name="penjualan_tanggal" id="penjualan_tanggal" class="form-control"
                        required>
                    <small id="error-penjualan-tanggal" class="error-text form-text text-danger"></small>
                </div>
                <hr>
                <h6>Detail Barang</h6>
                <div id="detail-container">
                    <div class="form-row detail-item">
                        <div class="col-md-4">
                            <label>Barang</label>
                            <select name="barang_id[]" class="form-control">
                                <option value="">- Pilih Barang -</option>
                                @foreach ($barang as $b)
                                    <option value="{{ $b->barang_id }}" data-harga="{{ $b->harga_jual }}">{{ $b->barang_nama }} ({{ $b->stok_jumlah }}) </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Harga</label>
                            <input type="number" name="harga[]" class="form-control" readonly required>
                        </div>
                        <div class="col-md-2">
                            <label>Jumlah</label>
                            <input type="number" name="jumlah[]" class="form-control" required value="1">
                        </div>
                        <div class="col-md-2">
                            <label>Subtotal</label>
                            <input type="text" name="subtotal[]" class="form-control subtotal" readonly>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="button" class="btn btn-danger remove-detail">Hapus</button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary my-2 #btn-tambah-detail  w-100" id="btn-tambah-detail">+ Tambah Barang</button>
                <div class=" text-left mt-3 ">
                    <label><strong>Total Keseluruhan:</strong></label>
                    <input type="text" id="totalKeseluruhan" class="form-control font-weight-bold text-left" readonly>
                </div>
                
            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function () {
        $("#form-tambah").validate({
            rules: {
                user_id: { required: true },
                pembeli: { required: true, maxlength: 40 },
                penjualan_kode: { required: true, maxlength: 20 },
                penjualan_tanggal: { required: true }
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
                                text: response.message,
                                didClose: () => {
                                    // Ganti kode ini untuk memanggil modal dan menampilkan struk
                                    showStruk(response.struk_url);  // Panggil fungsi showStruk dengan URL struk
                                    dataPenjualan.ajax.reload();
                                }
                            });
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
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
<script>
    // // Tambah detail barang
    // $('#btn-tambah-detail').on('click', function () {
    //     let clone = $('.detail-item').first().clone();
    //     clone.find('input').val('');
    //     $('#detail-container').append(clone);
    // });

    // Hapus baris detail barang
    $(document).on('click', '.remove-detail', function () {
        if ($('.detail-item').length > 1) {
            $(this).closest('.detail-item').remove();
        }
    });

    // Saat barang berubah, isi harga otomatis
    $(document).on('change', 'select[name="barang_id[]"]', function () {
        let harga = $(this).find('option:selected').data('harga');
        $(this).closest('.detail-item').find('input[name="harga[]"]').val(harga);
    });

</script>

<script>
    function hitungSubtotalDanTotal() {
    let total = 0;
    $('.detail-item').each(function () {
        let harga = parseFloat($(this).find('input[name="harga[]"]').val()) || 0;
        let jumlah = parseFloat($(this).find('input[name="jumlah[]"]').val()) || 0;
        let subtotal = harga * jumlah;
        $(this).find('input[name="subtotal[]"]').val(subtotal.toLocaleString());
        total += subtotal;
    });
    $('#totalKeseluruhan').val(total.toLocaleString());
    }

    // Trigger hitung saat harga atau jumlah berubah
    $(document).on('input', 'input[name="harga[]"], input[name="jumlah[]"]', function () {
        hitungSubtotalDanTotal();
    });

    // Hitung juga saat select barang dipilih
    $(document).on('change', 'select[name="barang_id[]"]', function () {
        let harga = $(this).find('option:selected').data('harga');
        $(this).closest('.detail-item').find('input[name="harga[]"]').val(harga);
        hitungSubtotalDanTotal();
    });

    // Re-hitung saat tambah detail
    $('#btn-tambah-detail').on('click', function () {
        let clone = $('.detail-item').first().clone();

        clone.find('select[name="barang_id[]"]').val('');
        clone.find('input[name="harga[]"]').val('');
        clone.find('input[name="jumlah[]"]').val(1);
        clone.find('input[name="subtotal[]"]').val('');

        $('#detail-container').append(clone);
        hitungSubtotalDanTotal();
    });

    // buat isi otomatis tanggal
    $(document).ready(function () {
        let now = new Date();

        let year = now.getFullYear();
        let month = String(now.getMonth() + 1).padStart(2, '0'); 
        let day = String(now.getDate()).padStart(2, '0');
        let hours = String(now.getHours()).padStart(2, '0');
        let minutes = String(now.getMinutes()).padStart(2, '0');

        let formatted = `${year}-${month}-${day}T${hours}:${minutes}`;
        $('#penjualan_tanggal').val(formatted);
    });

</script>