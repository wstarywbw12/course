@extends('layouts.master_app')

@section('content')
    <div class="container">

        <div class="card mb-3">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h5>Detail Course</h5>
                <a href="{{ route('courses.index') }}" class="btn btn-secondary">
                    <i class="bx bx-arrow-left"></i> Back
                </a>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body d-flex justify-content-between ">

                <div>
                    <h4 class="fw-bold">{{ $course->title }}</h4>
                    <p class="text-muted">
                       {!! $course->description !!}
                    </p>
                </div>

                <div class="mb-3">
                    <span class="badge bg-primary">
                        Level: {{ $course->level->level }}
                    </span>
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Materi Course</h5>
                    <div>
                        <button class="btn btn-primary btn-sm" onclick="openCreateMateri()">
                            <i class="bx bx-plus"></i> Tambah Materi
                        </button>

                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Materi</th>
                            <th>Time</th>
                            <th>Type</th>
                            <th>content</th>
                            <th class="text-end"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($course->materials as $materi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td >{{ $materi->title }}</td>
                                <td class="text-center">{{ $materi->time }}</td>
                                <td>
                                    <span class="badge bg-{{ $materi->type === 'video' ? 'danger' : 'success' }}">
                                        {{ strtoupper($materi->type) }}
                                    </span>
                                </td>
                                <td class="text-truncate" style="max-width:250px">
                                    {{ $materi->content }}
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-warning"
                                        onclick='openEditMateri(@json($materi))'>
                                        <i class="bx bx-pencil"></i>
                                    </button>

                                    <form id="delete-form-{{ $materi->id }}"
                                        action="{{ route('materials.destroy', $materi->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="confirmDelete({{ $materi->id }})">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    Belum ada materi
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>

    </div>

    @include('pages.courses.modal_detail')
    @include('pages.courses.modal_add_materi')
@endsection


@push('scripts')
    <script>
        const materiModal = new bootstrap.Modal('#materiModal');

        function openCreateMateri() {
            document.getElementById('materiModalTitle').innerText = 'Tambah Materi';
            document.getElementById('materiForm').action =
                "{{ route('materials.store', $course->id) }}";
            document.getElementById('materiMethod').value = 'POST';

            ['materi_title', 'materi_content'].forEach(id => document.getElementById(id).value = '');
            materiModal.show();
        }

        function openEditMateri(materi) {
            document.getElementById('materiModalTitle').innerText = 'Edit Materi';
            document.getElementById('materiForm').action = `/materials/${materi.id}`;
            document.getElementById('materiMethod').value = 'PUT';

            document.getElementById('materi_title').value = materi.title;
            document.getElementById('materi_type').value = materi.type;
            document.getElementById('materi_time').value = materi.time;
            document.getElementById('materi_content').value = materi.content;

            materiModal.show();
        }
    </script>
@endpush
