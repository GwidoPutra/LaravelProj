<form action="{{ url('/user/ajax') }}" method="POST" id="form-tambah">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Level Pengguna</label>
                                <select name="level_id" id="level_id" class="form-control" required>
                                    <option value="">- Pilih Level -</option>
                                    @foreach($level as $l)
                                    <option value="{{ $l->level_id }}">{{ $l->level_nama }}</option>
                                    @endforeach
                                </select>
                                <small id="error-level_id" class="error-text form-text text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                                <small id="error-username" class="error-text form-text text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" required>
                                <small id="error-nama" class="error-text form-text text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                                <small id="error-password" class="error-text form-text text-danger"></small>
                            </div>
                        </div>

                        <div class="col-md-4 text-center">
                            <label for="profile_picture" class="position-relative d-block"
                                style="width: 150px; height: 150px; margin: 0 auto; clip-path: circle(50% at 50% 50%);">
                                <img src="{{ asset('profile_default.png') }}"
                                    alt="Profile Picture" class="rounded-circle w-100">
                                <div class="overlay rounded-circle"
                                    style="opacity: 0; transition: opacity 0.15s; cursor: pointer;"
                                    onmouseover="this.style.opacity = 1;" onmouseout="this.style.opacity = 0;">
                                    <i class="fas fa-upload position-absolute text-white"
                                        style="top: 50%; left: 50%; transform: translate(-50%, -50%);"></i>
                                </div>
                            </label>
                            <p class="mt-2 mb-1 text-muted" style="font-size: 14px;">Upload Foto Profil</p>
                            <input type="file" name="profile_picture" id="profile_picture" class="d-none"
                                accept="image/jpeg, image/jpg, image/png"
                                onchange="this.parentNode.querySelector('label').querySelector('img').src = window.URL.createObjectURL(this.files[0]);">
                            <small id="error-profile_picture" class="error-text form-text text-danger"></small>
                        </div>
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
        $("#form-tambah").validate({
            rules: {
                level_id: {
                    required: true,
                    number: true
                },
                username: {
                    required: true,
                    minlength: 3,
                    maxlength: 20
                },
                nama: {
                    required: true,
                    minlength: 3,
                    maxlength: 100
                },
                password: {
                    required: true,
                    minlength: 5,
                    maxlength: 20
                },
                profile_picture: {
                    required: false,
                    accept: 'image/jpeg, image/jpg, image/png',
                    filesize: 2048
                }
            },
            submitHandler: function(form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status) {
                            $('#myModal').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            });
                            dataUser.ajax.reload();
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