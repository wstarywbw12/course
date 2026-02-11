@extends('layouts.app')
@section('content')
    <div class="container">

    <div class="card mb-3">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Manage Level</h5>
            <button class="btn btn-primary" onclick="openCreateModal()">Tambah Level</button>
        </div>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="20%">Keterangan</th>
                        <th>Icon</th>
                        <th width="20%" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($levels as $level)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $level->level }}</td>
                            <td>{{ $level->icon }}</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-warning"
                                    onclick='openEditModal(@json($level))'>
                                    Edit
                                </button>

                                <button class="btn btn-sm btn-danger"
                                    onclick="confirmDelete({{ $level->id }}, 'delete-level')">
                                    Delete
                                </button>

                                <form id="delete-level-{{ $level->id }}"
                                      action="{{ route('levels.destroy', $level->id) }}"
                                      method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                Belum ada data level
                            </td>
                        </tr>
                    @endforelse
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

    @include('pages.levels.modal')
@endsection


@push('scripts')
<script>
    const levelModal = new bootstrap.Modal(
        document.getElementById('levelModal')
    );

    // =====================
    // CREATE
    // =====================
    window.openCreateModal = function () {
        document.getElementById('modalTitle').innerText = 'Tambah Level';
        document.getElementById('levelForm').action = "{{ route('levels.store') }}";
        document.getElementById('formMethod').value = 'POST';

        document.getElementById('level').value = '';
        document.getElementById('icon').value = '';

        levelModal.show();
    };

    // =====================
    // EDIT
    // =====================
    window.openEditModal = function (level) {
        document.getElementById('modalTitle').innerText = 'Edit Level';
        document.getElementById('levelForm').action = `/levels/${level.id}`;
        document.getElementById('formMethod').value = 'PUT';

        document.getElementById('level').value = level.level;
        document.getElementById('icon').value = level.icon ?? '';

        levelModal.show();
    };
</script>
@endpush
