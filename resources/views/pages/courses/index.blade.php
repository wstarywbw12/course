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
                            <th class="text-end"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $course->title }}</td>
                                <td>{{ $course->level->level }}</td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-warning" onclick="openEditModal({{ $course->id }})">
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
let descriptionEditor, transcriptEditor, resourcesEditor;
let modal;

document.addEventListener("DOMContentLoaded", function () {

    modal = new bootstrap.Modal(document.getElementById('courseModal'));

    function MyUploadAdapter(loader) {
        this.loader = loader;
    }

    MyUploadAdapter.prototype.upload = function () {
        return this.loader.file.then(file => {
            let data = new FormData();
            data.append('upload', file);
            data.append('_token', '{{ csrf_token() }}');

            return fetch("{{ route('upload.image') }}", {
                method: 'POST',
                body: data
            })
            .then(response => response.json())
            .then(result => {
                return {
                    default: result.url
                };
            });
        });
    };

    function MyCustomUploadAdapterPlugin(editor) {
        editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
            return new MyUploadAdapter(loader);
        };
    }

    function createEditor(selector) {
        return ClassicEditor.create(document.querySelector(selector), {
            extraPlugins: [MyCustomUploadAdapterPlugin],
            toolbar: [
                'heading',
                '|',
                'bold', 'italic',
                '|',
                'bulletedList', 'numberedList',
                '|',
                'insertTable',
                'imageUpload',
                '|',
                'undo', 'redo'
            ]
        });
    }

    //  INIT EDITOR SEKALI SAJA
    Promise.all([
        createEditor('#description'),
        createEditor('#transcript'),
        createEditor('#resources')
    ]).then(editors => {
        descriptionEditor = editors[0];
        transcriptEditor = editors[1];
        resourcesEditor = editors[2];
    });

    // =============================
    // CREATE
    // =============================
    window.openCreateModal = function () {

        document.getElementById('modalTitle').innerText = 'Tambah Course';
        document.getElementById('courseForm').action = "{{ route('courses.store') }}";
        document.getElementById('method').value = 'POST';

        document.getElementById('title').value = '';
        document.getElementById('level_id').value = '';

        descriptionEditor.setData('');
        transcriptEditor.setData('');
        resourcesEditor.setData('');

        modal.show();
    }

    // =============================
    // EDIT
    // =============================
    window.openEditModal = function (id) {

        fetch(`/courses/${id}/edit`, {
            headers: {
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(course => {

            document.getElementById('modalTitle').innerText = 'Edit Course';
            document.getElementById('courseForm').action = `/courses/${course.id}`;
            document.getElementById('method').value = 'PUT';

            document.getElementById('title').value = course.title;
            document.getElementById('level_id').value = course.level_id;

            descriptionEditor.setData(course.description ?? '');
            transcriptEditor.setData(course.transcript ?? '');
            resourcesEditor.setData(course.resources ?? '');

            modal.show();
        })
        .catch(err => {
            console.error(err);
            alert('Gagal mengambil data');
        });
    }

});
</script>
@endpush
