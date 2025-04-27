@empty($stok)
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
                <a href="{{ url('/barang') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@else
    <form action="{{ url('/stok/' . $stok->stok_id . '/update_ajax') }}" method="POST" id="form-edit">
        @csrf
        @method('PUT')
        <div id="modal-master" class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{-- <label>User</label>
                        <select name="user_id" id="user_id" class="form-control" required>
                            <option value="">- Pilih User -</option>
                            @foreach ($user as $s)
                            <option value="{{ $s->user_id }}">{{ $s->nama }}</option>
                            @endforeach
                        </select>
                        <small id="error-user-id" class="error-text form-text text-danger"></small> --}}

                        <label>Informasi Pengguna</label>
                        <select name="user_id" id="user_id" class="form-control" disabled>
                            <option value="{{ $user->user_id }}" selected>{{ $user->nama }} ({{ $user->level->level_nama }})</option>
                        </select>
                        <small id="error-user-id" class="error-text form-text text-danger"></small>
                        <small class="form-text text-muted">User sebelumnya : {{ $stok->user->nama }}</small>
    
                        <!-- Ini input hidden agar user_id tetap dikirim ke server -->
                        <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                    </div>
                    <div class="form-group">
                        <label>Barang</label>
                        <input value="{{ $stok->barang->barang_nama }}" type="text" name="barang_nama" id="barang_nama" class="form-control" disabled>
                        <small id="error-barang-nama" class="error-text form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input value="{{ $stok->stok_tanggal }}" type="datetime-local" name="stok_tanggal" id="stok_tanggal" class="form-control" required>
                        <small id="error-stok-tanggal" class="error-text form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input value="{{ $stok->stok_jumlah }}" type="text" name="stok_jumlah" id="stok_jumlah" class="form-control" required>
                        <small id="error-stok-jumlah" class="error-text form-text text-danger"></small>
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
        $(document).ready(function() {
            $("#form-edit").validate({
                rules: {
                    user_id: { required: true },
                    barang_id: { required: true },
                    stok_tanggal: { required: true },
                    stok_jumlah: { required: true }
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function(response) {
                            if (response.status) {
                                $('#myModal').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message
                                });
                                dataStok.ajax.reload();
                            } else {
                                $('.error-text').text('');
                                $.each(response.msgField, function(prefix, val) {
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
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endempty