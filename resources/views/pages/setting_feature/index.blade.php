@extends('layouts.master_app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between mb-3">
                <h4>Setting Feature</h4>
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
                            <th>Icon</th>
                            <th>Title</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($features as $key => $item)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td><i class="{{ $item->icon }}"></i> {{ $item->icon }}</td>
                                <td>{{ $item->title }}</td>
                                <td class="text-center">

                                    <button class="btn btn-info btn-sm btn-edit" data-id="{{ $item->id }}"
                                        data-title="{{ $item->title }}" data-icon="{{ $item->icon }}">
                                        <i class="bx bx-edit"></i> Edit
                                    </button>

                                    <form action="{{ route('setting.feature.destroy', $item->id) }}" method="POST"
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

    {{-- MODAL DINAMIS --}}
    <div class="modal fade" id="featureModal">
        <div class="modal-dialog">
            <form method="POST" id="featureForm">
                @csrf
                <input type="hidden" name="_method" id="formMethod">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Feature</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <div class="mb-3">
                            <label>Icon (contoh: fas fa-star)</label>
                            <input type="text" name="icon" id="icon" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary"><i class="bx bx-check-circle"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            let modal = new bootstrap.Modal(document.getElementById('featureModal'));
            let form = document.getElementById('featureForm');

            // TAMBAH
            document.querySelector('.btn-add').addEventListener('click', function() {
                form.action = "{{ route('setting.feature.store') }}";
                document.getElementById('formMethod').value = '';
                form.reset();
                modal.show();
            });

            // EDIT
            document.querySelectorAll('.btn-edit').forEach(button => {
                button.addEventListener('click', function() {

                    let id = this.dataset.id;

                    form.action = "/setting-feature/update/" + id;
                    document.getElementById('formMethod').value = 'PUT';

                    document.getElementById('title').value = this.dataset.title;
                    document.getElementById('icon').value = this.dataset.icon;

                    modal.show();
                });
            });

            // DELETE SWEET ALERT
            document.querySelectorAll('.btn-delete').forEach(button => {
                button.addEventListener('click', function() {

                    let formDelete = this.closest('.form-delete');

                    Swal.fire({
                        title: 'Yakin hapus data?',
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
@endpush
