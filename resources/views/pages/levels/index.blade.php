@extends('layouts.master_app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between mb-3">
                <h4>Manajemen Level</h4>
                <button class="btn btn-primary btn-sm btn-add">
                    <i class="bx bx-plus"></i> Tambah
                </button>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Icon</th>
                        <th>Level</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($levels as $key => $item)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td>
                                @if ($item->icon)
                                    <i class="{{ $item->icon }}"></i> {{ $item->icon }}
                                @endif
                            </td>
                            <td>{{ $item->level }}</td>
                            <td class="text-center">

                                <button class="btn btn-info btn-sm btn-edit" data-id="{{ $item->id }}"
                                    data-level="{{ $item->level }}" data-icon="{{ $item->icon }}">
                                    <i class="bx bx-edit"></i> Edit
                                </button>

                                <form action="{{ route('levels.destroy', $item->id) }}" method="POST"
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

    {{-- MODAL --}}
    <div class="modal fade" id="levelModal">
        <div class="modal-dialog">
            <form method="POST" id="levelForm">
                @csrf
                <input type="hidden" name="_method" id="formMethod">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Level</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <div class="mb-3">
                            <label>Level</label>
                            <input type="text" name="level" id="level" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Icon (contoh: bx bx-star)</label>
                            <input type="text" name="icon" id="icon" class="form-control">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary">
                            <i class="bx bx-check-circle"></i> Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            let modal = new bootstrap.Modal(document.getElementById('levelModal'));
            let form = document.getElementById('levelForm');

            // TAMBAH
            document.querySelector('.btn-add').addEventListener('click', function() {
                form.action = "{{ route('levels.store') }}";
                document.getElementById('formMethod').value = '';
                form.reset();
                modal.show();
            });

            // EDIT
            document.querySelectorAll('.btn-edit').forEach(button => {
                button.addEventListener('click', function() {

                    let id = this.dataset.id;

                    form.action = "/levels/update/" + id;
                    document.getElementById('formMethod').value = 'PUT';

                    document.getElementById('level').value = this.dataset.level;
                    document.getElementById('icon').value = this.dataset.icon ?? '';

                    modal.show();
                });
            });

            // DELETE
            document.querySelectorAll('.btn-delete').forEach(button => {
                button.addEventListener('click', function() {

                    let formDelete = this.closest('.form-delete');

                    Swal.fire({
                        title: 'Yakin hapus level?',
                        text: "Data tidak bisa dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
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
