@extends('layouts.master_app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between mb-3">
                <h4>Setting About</h4>
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
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($abouts as $key => $item)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td><i class="{{ $item->icon }}"></i> {{ $item->icon }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->sub_title }}</td>
                            <td class="text-center">
                                <button class="btn btn-info btn-sm btn-edit" data-id="{{ $item->id }}"
                                    data-title="{{ $item->title }}" data-sub_title="{{ $item->sub_title }}"
                                    data-icon="{{ $item->icon }}">
                                    Edit
                                </button>

                                <form action="{{ route('setting.about.destroy', $item->id) }}" method="POST"
                                    class="d-inline form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm btn-delete">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- MODAL DINAMIS --}}
    <div class="modal fade" id="aboutModal">
        <div class="modal-dialog">
            <form method="POST" id="aboutForm">
                @csrf
                <input type="hidden" name="_method" id="formMethod">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form About</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Icon (contoh: fas fa-book)</label>
                            <input type="text" name="icon" id="icon" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Sub Title</label>
                            <input type="text" name="sub_title" id="sub_title" class="form-control" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            let modal = new bootstrap.Modal(document.getElementById('aboutModal'));
            let form = document.getElementById('aboutForm');

            // BUTTON TAMBAH
            document.querySelector('.btn-add').addEventListener('click', function() {
                form.action = "{{ route('setting.about.store') }}";
                document.getElementById('formMethod').value = '';
                form.reset();
                modal.show();
            });

            // BUTTON EDIT
            document.querySelectorAll('.btn-edit').forEach(button => {
                button.addEventListener('click', function() {

                    let id = this.dataset.id;

                    form.action = "/setting-about/update/" + id;
                    document.getElementById('formMethod').value = 'PUT';

                    document.getElementById('title').value = this.dataset.title;
                    document.getElementById('sub_title').value = this.dataset.sub_title;
                    document.getElementById('icon').value = this.dataset.icon;

                    modal.show();
                });
            });

        });

        // DELETE SWEET ALERT
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {

                let form = this.closest('.form-delete');

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
                        form.submit();
                    }
                });

            });
        });
    </script>
@endpush
