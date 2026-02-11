@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="card mb-3">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Manage User</h5>
                <button class="btn btn-primary" onclick="openCreateModal()">Tambah User</button>
            </div>
        </div>

        <div class="card">
            <div class="card-body table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th width="10%">Role</th>
                            <th width="20%" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-nowrap">{{ $user->name }}</td>
                                <td class="text-nowrap">{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-warning"
                                        onclick='openEditModal(@json($user))'>
                                        Edit
                                    </button>

                                    <button class="btn btn-sm btn-danger" onclick="confirmDelete({{ $user->id }})">
                                        Delete
                                    </button>

                                    <form id="delete-form-{{ $user->id }}"
                                        action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        @if ($users->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    Tidak ada data user
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f3f5f7;
            min-height: 100vh;
        }

        .text-logo {
            color: #1e4ed8;
        }

        .text-brand {
            color: #1e4ed8;
        }

        a.text-nav {
            color: #1e4ed8 !important;
            text-decoration: none;
        }

        .text-sub {
            color: #1e4ed8 !important;
        }

        .custom-tabs {
            background-color: #1e63ff;
            border-radius: 8px;
            padding: 6px;
            display: flex;
            gap: 6px;
            width: 100%;
        }

        .custom-tabs .nav-link {
            color: #fff;
            font-weight: 600;
            border-radius: 6px;
            padding: 8px 16px;
            text-align: center;
            width: 100%;
        }

        .custom-tabs .nav-link.active {
            background-color: #fff;
            color: #1e63ff !important;
        }

        @media (min-width: 992px) {
            .custom-tabs {
                width: fit-content;
            }

            .custom-tabs .nav-link {
                padding: 6px 48px;
                width: auto;
            }
        }





        .nav-pills-materi {
            display: flex;
            width: 100%;
            gap: 12px;
        }

        .nav-pills-materi .nav-item {
            flex: 1;
        }

        /* default = btn-outline-secondary */
        .nav-pills-materi .nav-link {
            width: 100%;
            text-align: center;
            background-color: transparent;
            color: #2b2c2d !important;
            border: 2px solid #6c757d;
            border-radius: 12px;
            transition: all .2s ease;
        }

        /* hover efek */
        .nav-pills-materi .nav-link:hover {
            background-color: #6c757d;
            color: #fff !important;
        }

        /* active = btn-primary */
        .nav-pills-materi .nav-link.active {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: #fff !important;
        }
    </style>

    @include('pages.users.modal')

    @if (session('success'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        </script>
    @endif
@endsection


@push('scripts')
    <script>
        const userModalEl = document.getElementById('userModal');
        const userModal = new bootstrap.Modal(userModalEl);

        // =====================
        // CREATE
        // =====================
        window.openCreateModal = function() {
            document.getElementById('modalTitle').innerText = 'Tambah User';
            document.getElementById('userForm').action = "{{ route('users.store') }}";
            document.getElementById('formMethod').value = 'POST';

            ['name', 'email', 'password'].forEach(id => {
                document.getElementById(id).value = '';
            });

            document.getElementById('role').value = 'user';

            userModal.show();
        };

        // =====================
        // EDIT
        // =====================
        window.openEditModal = function(user) {
            document.getElementById('modalTitle').innerText = 'Edit User';
            document.getElementById('userForm').action = `/users/${user.id}`;
            document.getElementById('formMethod').value = 'PUT';

            document.getElementById('name').value = user.name;
            document.getElementById('email').value = user.email;
            document.getElementById('role').value = user.role;
            document.getElementById('password').value = '';

            userModal.show();
        };

        // =====================
        // DELETE CONFIRM
        // =====================
        window.confirmDelete = function(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: 'Data user akan dihapus permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${id}`).submit();
                }
            });
        };
    </script>
@endpush
