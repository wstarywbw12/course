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
                        <strong>{{ $no + 1 }}. {!! $question->question !!}
                        </strong>

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
    <script>
        const modal = new bootstrap.Modal(document.getElementById('questionModal'));

        let questionEditor = null;
        let optionEditors = [];

        async function initEditors() {
            if (!questionEditor) {
                questionEditor = await ClassicEditor.create(
                    document.querySelector('#questionEditor')
                );
            }

            const optionEls = document.querySelectorAll('.option-editor');
            for (let i = 0; i < optionEls.length; i++) {
                if (!optionEditors[i]) {
                    optionEditors[i] = await ClassicEditor.create(optionEls[i]);
                }
            }
        }

        function resetEditors() {
            if (questionEditor) questionEditor.setData('');
            optionEditors.forEach(editor => editor.setData(''));
            document.querySelectorAll('.correct-radio').forEach(r => r.checked = false);
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
            form.action = "{{ route('quiz.questions.update', ':id') }}".replace(':id', question.id);
            document.getElementById('formMethod').value = 'PUT';
            document.getElementById('modalTitle').innerText = 'Edit Soal';

            modal.show();
            await initEditors();

            questionEditor.setData(question.question);

            question.options.forEach((opt, index) => {
                optionEditors[index].setData(opt.option_text);
                document.querySelectorAll('.correct-radio')[index].checked = opt.is_correct;
            });
        }

        function syncEditors() {
            document.querySelector('#questionEditor').value =
                questionEditor.getData();

            document.querySelectorAll('.option-editor').forEach((el, index) => {
                el.value = optionEditors[index].getData();
            });
        }
    </script>
@endpush

<style>
    .option-text p {
    margin: 0;
}
</style>
