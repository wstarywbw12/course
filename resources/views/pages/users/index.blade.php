@extends('layouts.master_app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between mb-3">
                <h4>Manajemen User</h4>
                <button class="btn btn-primary btn-sm btn-add">
                    <i class="bx bx-plus"></i> Tambah
                </button>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge bg-{{ $user->role == 'admin' ? 'danger' : 'secondary' }}">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td class="text-center">

                                <button class="btn btn-info btn-sm btn-edit" data-id="{{ $user->id }}"
                                    data-name="{{ $user->name }}" data-email="{{ $user->email }}"
                                    data-role="{{ $user->role }}">
                                    <i class="bx bx-edit"></i> Edit
                                </button>

                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                    class="d-inline form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm btn-delete">
                                        <i class="bx bx-trash"></i> Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <div class="modal fade" id="userModal">
        <div class="modal-dialog">
            <form method="POST" id="userForm">
                @csrf
                <input type="hidden" name="_method" id="formMethod">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Password (kosongkan jika tidak diubah)</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Role</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary"><i class="bx-check-circle"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            let modal = new bootstrap.Modal(document.getElementById('userModal'));
            let form = document.getElementById('userForm');

            // TAMBAH
            document.querySelector('.btn-add').addEventListener('click', function() {
                form.action = "{{ route('users.store') }}";
                document.getElementById('formMethod').value = '';
                form.reset();
                modal.show();
            });

            // EDIT
            document.querySelectorAll('.btn-edit').forEach(button => {
                button.addEventListener('click', function() {

                    let id = this.dataset.id;

                    form.action = "/users/update/" + id;
                    document.getElementById('formMethod').value = 'PUT';

                    document.getElementById('name').value = this.dataset.name;
                    document.getElementById('email').value = this.dataset.email;
                    document.getElementById('role').value = this.dataset.role;
                    document.getElementById('password').value = '';

                    modal.show();
                });
            });

            // DELETE SWEET ALERT
            document.querySelectorAll('.btn-delete').forEach(button => {
                button.addEventListener('click', function() {

                    let formDelete = this.closest('.form-delete');

                    Swal.fire({
                        title: 'Yakin hapus user?',
                        text: "Data tidak bisa dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            formDelete.submit();
                        }
                    });

                });
            });

        });
    </script>
    @if (Session::has('success'))
    <script>
        const message = "{{ Session::get('success') }}";

        Swal.fire({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            customClass: {
                popup: 'my-toast'
            },
            html: `
            <div class="toast-wrapper">
                <i class="ri-checkbox-circle-fill align-middle text-success"></i>
                <span class="text-success"><b>${message}</b></span>
                <i class="ri-close-line toast-close" onclick="Swal.close()"></i>
            </div>
        `
        });
    </script>
@endif
@endpush
