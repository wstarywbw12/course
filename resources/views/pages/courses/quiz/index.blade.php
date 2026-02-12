@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card mb-3">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h5>Detail Course</h5>
                <a href="{{ route('courses.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body d-flex justify-content-between ">

                <div>
                    <h4 class="fw-bold">{{ $course->title }}</h4>
                    <p class="text-muted">
                        {{ $course->description ?? '-' }}
                    </p>
                </div>

                <div class="mb-3">
                    <span class="badge bg-primary">
                        Level: {{ $course->level->level ?? '-' }}
                    </span>
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Quiz Course</h5>
                    <div>
                        <button class="btn btn-primary btn-sm" onclick="openCreateQuiz()">
                            <i class="bi bi-plus"></i> Tambah Quiz
                        </button>


                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Title</th>
                            <th>Deskription</th>
                            <th class="text-end"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($course->quizzes as $quiz)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $quiz->title }}</td>
                                <td>{{ Str::limit($quiz->description, 60) }}</td>
                                <td class="text-end">

                                    {{-- Button Soal / Option --}}
                                    <a href="{{ route('quiz.questions.index', $quiz->id) }}" class="btn btn-sm btn-primary"
                                        title="Kelola Soal">
                                        <i class="bi bi-list-check"></i>
                                    </a>

                                    {{-- Edit --}}
                                    <button class="btn btn-sm btn-warning"
                                        onclick='openEditQuiz(@json($quiz))'>
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    {{-- Delete --}}
                                    <form id="delete-form-{{ $quiz->id }}"
                                        action="{{ route('quiz.destroy', $quiz->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="confirmDelete({{ $quiz->id }})">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    Belum ada quiz
                                </td>
                            </tr>
                        @endforelse
                    </tbody>


                </table>
            </div>
        </div>

    </div>

    @include('pages.courses.style')
    @include('pages.courses.quiz.modal_add_quiz')
@endsection


@push('scripts')
    <script>
        const quizModal = new bootstrap.Modal(document.getElementById('quizModal'));

        // CREATE
        function openCreateQuiz() {
            document.getElementById('quizModalTitle').innerText = 'Tambah Quiz';
            document.getElementById('quizForm').action =
                "{{ route('quiz.store', $course->id) }}";
            document.getElementById('quizMethod').value = 'POST';

            document.getElementById('quiz_title').value = '';
            document.getElementById('quiz_description').value = '';

            quizModal.show();
        }

        // EDIT
        function openEditQuiz(quiz) {
            document.getElementById('quizModalTitle').innerText = 'Edit Quiz';
            document.getElementById('quizForm').action = `/quizzes/${quiz.id}`;
            document.getElementById('quizMethod').value = 'PUT';

            document.getElementById('quiz_title').value = quiz.title;
            document.getElementById('quiz_description').value = quiz.description ?? '';

            quizModal.show();
        }
    </script>
@endpush
