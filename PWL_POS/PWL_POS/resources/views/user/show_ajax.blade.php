<div id="modal-master" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Data User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="d-flex align-items-start align-items-center">
                <div class="mr-4">
                    <img src="{{ $user->profile_picture ?? asset('profile_default.png') }}" alt="Foto Profil" class="rounded-circle"
                        style="width: 150px; height: 150px; object-fit: cover;">
                </div>

                <div class="flex-grow-1">
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <tr>
                            <th class="text-nowrap" style="width: 90px;">ID</th>
                            <td>{{ $user->user_id }}</td>
                        </tr>
                        <tr>
                            <th class="text-nowrap">Level</th>
                            <td>{{ $user->level->level_nama }}</td>
                        </tr>
                        <tr>
                            <th class="text-nowrap">Username</th>
                            <td>{{ $user->username }}</td>
                        </tr>
                        <tr>
                            <th class="text-nowrap">Nama</th>
                            <td>{{ $user->nama }}</td>
                        </tr>
                        <tr>
                            <th class="text-nowrap">Password</th>
                            <td>********</td>
                        </tr>
                    </table>
                </div>
            </div>
    </div>
</div>