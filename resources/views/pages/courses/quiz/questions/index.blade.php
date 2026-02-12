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
                        <strong>{{ $no + 1 }}. {{ $question->question }}</strong>

                        <ul class="mt-2">
                            @foreach ($question->options as $option)
                                <li>
                                    {{ $option->option_text }}
                                    @if ($option->is_correct)
                                        <span class="badge bg-success">Benar</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>

                        <button class="btn btn-sm btn-warning" onclick='openEdit(@json($question))'>
                            <i class="bi bi-pencil"></i> Edit
                        </button>

                        <form id="delete-form-{{ $question->id }}" action="{{ route('quiz.questions.destroy', $question->id) }}"
                            method="POST" class="d-inline">
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
    @include('pages.courses.style')s
@endsection


@push('scripts')
    <script>
        const modal = new bootstrap.Modal(document.getElementById('questionModal'));

        function openCreate() {
            const form = document.getElementById('questionForm');
            form.action = "{{ route('quiz.questions.store', $quiz) }}";
            document.getElementById('formMethod').value = 'POST';
            document.getElementById('modalTitle').innerText = 'Tambah Soal';

            document.getElementById('questionText').value = '';
            document.querySelectorAll('.option-input').forEach(i => i.value = '');
            document.querySelectorAll('.correct-radio').forEach(r => r.checked = false);

            modal.show();
        }

        function openEdit(question) {
            const form = document.getElementById('questionForm');

            form.action = "{{ route('quiz.questions.update', ':id') }}".replace(':id', question.id);
            document.getElementById('formMethod').value = 'PUT';
            document.getElementById('modalTitle').innerText = 'Edit Soal';

            document.getElementById('questionText').value = question.question;

            question.options.forEach((opt, index) => {
                document.querySelectorAll('.option-input')[index].value = opt.option_text;
                document.querySelectorAll('.correct-radio')[index].checked = opt.is_correct;
            });

            modal.show();
        }
    </script>
@endpush
