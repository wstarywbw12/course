@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="card mb-3">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h5>Manage Course</h5>
                <button class="btn btn-primary" onclick="openCreateModal()">Tambah Course</button>
            </div>
        </div>

        <div class="card">
            <div class="card-body table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Title</th>
                            <th>Level</th>
                            <th>Description</th>
                            <th class="text-end"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $course->title }}</td>
                                <td>{{ $course->level->level }}</td>
                                <td>{{ Str::limit($course->description, 50) }}</td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-warning"
                                        onclick='openEditModal(@json($course))'>
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>

                                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-eye"></i> Materi
                                    </a>

                                     <a href="{{ route('quiz.index', $course->id) }}" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i> Quiz
                                    </a>


                                    <form id="delete-form-{{ $course->id }}"
                                        action="{{ route('courses.destroy', $course->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="confirmDelete({{ $course->id }})">
                                            <i class="bi bi-trash"></i> Delete
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

    @include('pages.courses.modal')

    @include('pages.courses.style')


   
@endsection

@push('scripts')
    <script>
        const modal = new bootstrap.Modal(document.getElementById('courseModal'));

        function openCreateModal() {
            document.getElementById('modalTitle').innerText = 'Tambah Course';
            document.getElementById('courseForm').action = "{{ route('courses.store') }}";
            document.getElementById('method').value = 'POST';

            document.getElementById('title').value = '';
            document.getElementById('level_id').value = '';
            document.getElementById('description').value = '';

            modal.show();
        }

        function openEditModal(course) {
            document.getElementById('modalTitle').innerText = 'Edit Course';
            document.getElementById('courseForm').action = `/courses/${course.id}`;
            document.getElementById('method').value = 'PUT';

            document.getElementById('title').value = course.title;
            document.getElementById('level_id').value = course.level_id;
            document.getElementById('description').value = course.description ?? '';

            modal.show();
        }
    </script>
@endpush
