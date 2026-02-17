@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <h5>Soal Quiz: {{ $quiz->title }}</h5>
                <button class="btn btn-primary btn-sm" onclick="openCreate()">
                    <i class="bi bi-plus"></i> Tambah Soal
                </button>
            </div>

            <div class="card-body">
                @foreach ($quiz->questions as $no => $question)
                    <div class="mb-4 border-bottom pb-3">
                        <div class="d-flex align-items-start mb-2">
                            <div class="me-2 fw-bold">{{ $no + 1 }}.</div>
                            <div class="question-text fw-bold">{!! $question->question !!}</div>
                        </div>


                        <div class="mt-2">

                            @foreach ($question->options as $index => $option)
                                @php
                                    $label = chr(65 + $index); // A, B, C, D
                                @endphp

                                <div
                                    class="d-flex align-items-start mb-1 {{ $option->is_correct ? 'text-success fw-bold' : '' }}">
                                    <div class="me-2 fw-bold">{{ $label }}.</div>
                                    <div class="option-text">{!! $option->option_text !!}</div>
                                </div>
                            @endforeach

                        </div>

                        @if ($question->pembahasan)
                            <div class="my-3 p-3 bg-light rounded">
                                <strong>Pembahasan:</strong>
                                <div>{!! $question->pembahasan !!}</div>
                            </div>
                        @endif


                        <button class="btn btn-sm btn-warning" onclick='openEdit(@json($question))'>
                            <i class="bi bi-pencil"></i> Edit
                        </button>

                        <form id="delete-form-{{ $question->id }}"
                            action="{{ route('quiz.questions.destroy', $question->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger"
                                onclick="confirmDelete({{ $question->id }})">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>

                    </div>
                @endforeach

            </div>
        </div>

    </div>

    @include('pages.courses.quiz.questions.modal')
    @include('pages.courses.style')
@endsection


@push('scripts')

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    const modal = new bootstrap.Modal(document.getElementById('questionModal'));

    let questionEditor = null;
    let pembahasanEditor = null;
    let optionEditors = [];

    // ===== Custom Upload Adapter =====
    function LaravelUploadAdapter(loader) {
        this.loader = loader;
    }

    LaravelUploadAdapter.prototype.upload = function () {
        return this.loader.file.then(file => new Promise((resolve, reject) => {

            let data = new FormData();
            data.append('upload', file);
            data.append('_token', '{{ csrf_token() }}');

            fetch("{{ route('upload.image') }}", {
                method: 'POST',
                body: data
            })
            .then(response => response.json())
            .then(result => {
                resolve({
                    default: result.url
                });
            })
            .catch(error => {
                reject(error);
            });

        }));
    };

    function LaravelUploadPlugin(editor) {
        editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
            return new LaravelUploadAdapter(loader);
        };
    }

    async function createEditor(element) {
        return await ClassicEditor.create(element, {
            extraPlugins: [LaravelUploadPlugin],
            toolbar: [
                'heading', '|',
                'bold', 'italic', 'underline', 'strikethrough', '|',
                'link', 'bulletedList', 'numberedList', '|',
                'insertTable', 'blockQuote', '|',
                'imageUpload', '|',
                'undo', 'redo'
            ],
            image: {
                toolbar: [
                    'imageTextAlternative',
                    'imageStyle:full',
                    'imageStyle:side'
                ]
            },
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            }
        });
    }

    async function initEditors() {

        if (!questionEditor) {
            const el = document.querySelector('#questionEditor');
            if (el) questionEditor = await createEditor(el);
        }

        if (!pembahasanEditor) {
            const el = document.querySelector('#pembahasanEditor');
            if (el) pembahasanEditor = await createEditor(el);
        }

        const optionEls = document.querySelectorAll('.option-editor');

        for (let i = 0; i < optionEls.length; i++) {
            if (!optionEditors[i]) {
                optionEditors[i] = await createEditor(optionEls[i]);
            }
        }
    }

    function resetEditors() {
        if (questionEditor) questionEditor.setData('');
        if (pembahasanEditor) pembahasanEditor.setData('');

        optionEditors.forEach(editor => {
            if (editor) editor.setData('');
        });

        document.querySelectorAll('.correct-radio')
            .forEach(r => r.checked = false);
    }

    async function openCreate() {
        const form = document.getElementById('questionForm');
        form.action = "{{ route('quiz.questions.store', $quiz) }}";
        document.getElementById('formMethod').value = 'POST';
        document.getElementById('modalTitle').innerText = 'Tambah Soal';

        modal.show();
        await initEditors();
        resetEditors();
    }

    async function openEdit(question) {
        const form = document.getElementById('questionForm');
        form.action = "{{ route('quiz.questions.update', ':id') }}"
            .replace(':id', question.id);
        document.getElementById('formMethod').value = 'PUT';
        document.getElementById('modalTitle').innerText = 'Edit Soal';

        modal.show();
        await initEditors();

        if (questionEditor)
            questionEditor.setData(question.question ?? '');

        if (pembahasanEditor)
            pembahasanEditor.setData(question.pembahasan ?? '');

        question.options.forEach((opt, index) => {
            if (optionEditors[index]) {
                optionEditors[index].setData(opt.option_text ?? '');
            }

            const radios = document.querySelectorAll('.correct-radio');
            if (radios[index]) {
                radios[index].checked = opt.is_correct;
            }
        });
    }

    function syncEditors() {
        if (questionEditor) {
            document.querySelector('#questionEditor').value =
                questionEditor.getData();
        }

        if (pembahasanEditor) {
            document.querySelector('#pembahasanEditor').value =
                pembahasanEditor.getData();
        }

        document.querySelectorAll('.option-editor')
            .forEach((el, index) => {
                if (optionEditors[index]) {
                    el.value = optionEditors[index].getData();
                }
            });
    }

    document.getElementById('questionForm')
        .addEventListener('submit', function () {
            syncEditors();
        });

</script>
@endpush



<style>
    .option-text p {
        margin: 0;
    }

    .question-text p {
        margin: 0;
    }

    .ck-editor__editable {
        min-height: 200px;
        /* ubah sesuai kebutuhan */
    }
</style>
