@foreach ($course->quizzes as $quiz)
    @php
        $isFinished = in_array($quiz->id, $quizResults ?? []);
    @endphp

    <div class="container pb-5 quiz-container d-none" data-quiz-id="{{ $quiz->id }}"
        data-duration="{{ $quiz->time }}">

        <h2 class="fw-bold mb-3">{{ $quiz->title }}</h2>
        <p class="text-muted mb-4">{{ $quiz->description }}</p>

        <form action="{{ route('quiz.submit', $quiz->id) }}" method="POST" class="quiz-form">

            @csrf

            <!-- TIMER -->
            @if (!$isFinished)
                <div class="d-flex justify-content-end mb-3">
                    <div class="badge bg-danger fs-6 px-3 py-2">
                        ⏳ Sisa Waktu:
                        <span class="quiz-timer">
                            {{ $quiz->time }}:00
                        </span>
                    </div>
                </div>
            @endif


            <!-- STEP NAV -->
            <div class="d-flex gap-2 mb-4">
                @foreach ($quiz->questions as $index => $question)
                    <button type="button"
                        class="btn quiz-step d-flex align-items-center justify-content-center {{ $index == 0 ? 'bg-primary text-white' : 'bg-secondary text-white' }}"
                        data-step="{{ $index }}">
                        {{ $index + 1 }}
                    </button>
                @endforeach
            </div>

            <!-- QUESTIONS -->
            @foreach ($quiz->questions as $qIndex => $question)
                <div class="card shadow-sm question-item {{ $qIndex == 0 ? '' : 'd-none' }}"
                    data-question="{{ $qIndex }}">

                    <div class="card-body p-4">

                        <div class="d-flex mb-4">
                            <div
                                class="question-number btn btn-primary d-flex align-items-center justify-content-center">
                                {{ $qIndex + 1 }}
                            </div>

                            <h6 class="fw-semibold mb-0 align-self-center ms-3">
                                {{ strip_tags($question->question) }}
                            </h6>
                        </div>

                        <div class="vstack gap-2">
                            @foreach ($question->options as $oIndex => $option)
                                @php
                                    $userAnswer = $quizAnswers[$question->id][0] ?? null;
                                    $isUserChoice = $userAnswer?->quiz_option_id == $option->id;
                                    $isCorrect = $option->is_correct;
                                @endphp

                                <div>

                                    <input type="radio" name="answers[{{ $question->id }}]"
                                        value="{{ $option->id }}" id="opt_{{ $quiz->id }}_{{ $option->id }}"
                                        class="option-input" {{ $isFinished ? 'disabled' : '' }}
                                        {{ $isUserChoice ? 'checked' : '' }}>

                                    <label for="opt_{{ $quiz->id }}_{{ $option->id }}"
                                        class="option-card d-flex align-items-center
    @if ($isFinished) @if ($isCorrect)
            border border-3 border-success bg-light
        @elseif($isUserChoice && !$isCorrect)
            border border-3 border-danger bg-light @endif
    @endif">

                                        <div class="option-label">
                                            {{ chr(65 + $oIndex) }}
                                        </div>

                                        <span>
                                            {{ strip_tags($option->option_text) }}
                                        </span>
                                    </label>
                                </div>
                            @endforeach

                            @if ($isFinished)
                                <div class="mt-4 p-3 rounded" style="background:#f8f9fa">
                                    <strong>Pembahasan:</strong>
                                    <div class="mt-2">
                                        {!! $question->pembahasan !!}
                                    </div>
                                </div>
                            @endif


                        </div>

                        <!-- FOOTER -->
                        <div class="d-flex justify-content-end gap-3 mt-5">

                            <button type="button" class="btn btn-light btn-prev">
                                Back
                            </button>

                            @if ($qIndex + 1 == $quiz->questions->count())
                                @if (!$isFinished && $qIndex + 1 == $quiz->questions->count())
                                    <button type="submit" class="btn btn-success">
                                        Submit
                                    </button>
                                @endif
                            @else
                                <button type="button" class="btn btn-primary btn-next">
                                    Next
                                </button>
                            @endif

                        </div>

                    </div>
                </div>
            @endforeach

        </form>
    </div>
@endforeach

@include('pages.course.quiz.style')

<script>
document.addEventListener('DOMContentLoaded', function () {

    let activeTimer = null;

    // ======================================================
    // START QUIZ BUTTON
    // ======================================================
    document.querySelectorAll('.start-quiz-btn').forEach(btn => {

        btn.addEventListener('click', function () {

            const quizId = this.dataset.quizId;
            const isReview = this.dataset.review === "true";

            // Hide semua quiz
            document.querySelectorAll('.quiz-container')
                .forEach(q => q.classList.add('d-none'));

            const container = document.querySelector(
                `.quiz-container[data-quiz-id="${quizId}"]`
            );

            if (!container) return;

            // Stop timer jika ada
            clearInterval(activeTimer);

            // ===============================
            // MODE REVIEW
            // ===============================
            if (isReview) {

                Swal.fire({
                    title: 'Lihat Pembahasan?',
                    text: 'Quiz sudah pernah dikerjakan',
                    icon: 'info',
                    confirmButtonText: 'Ya, Lihat',
                    confirmButtonColor: '#0d6efd'
                }).then(result => {

                    if (!result.isConfirmed) return;

                    container.classList.remove('d-none');
                    container.scrollIntoView({ behavior: 'smooth' });

                    // Hapus timer jika masih ada
                    container.querySelectorAll('.quiz-timer')
                        .forEach(t => {
                            const wrapper = t.closest('.d-flex');
                            if (wrapper) wrapper.remove();
                        });

                    // Hapus tombol submit
                    container.querySelectorAll('.btn-success')
                        .forEach(btn => btn.remove());

                    // Init quiz TANPA timer
                    initQuiz(container, true);
                });

            } 
            // ===============================
            // MODE NORMAL
            // ===============================
            else {

                Swal.fire({
                    title: 'Siap Mengerjakan Quiz?',
                    text: 'Timer akan langsung berjalan setelah klik OK',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Mulai!',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#0d6efd'
                }).then(result => {

                    if (!result.isConfirmed) return;

                    container.classList.remove('d-none');
                    container.scrollIntoView({ behavior: 'smooth' });

                    initQuiz(container, false);
                });
            }

        });

    });

    // ======================================================
    // QUIZ INITIALIZER
    // ======================================================
    function initQuiz(container, isReview = false) {

        const duration = parseInt(container.dataset.duration);
        const timerEl = container.querySelector('.quiz-timer');
        const questions = container.querySelectorAll('.question-item');
        const steps = container.querySelectorAll('.quiz-step');
        const form = container.querySelector('.quiz-form');

        let current = 0;
        let totalSeconds = duration * 60;

        clearInterval(activeTimer);

        // ==========================================
        // SHOW QUESTION
        // ==========================================
        function showQuestion(index) {

            if (index < 0 || index >= questions.length) return;

            questions.forEach(q => q.classList.add('d-none'));
            questions[index].classList.remove('d-none');

            steps.forEach(s => {
                s.classList.remove('bg-primary');
                s.classList.add('bg-secondary');
            });

            steps[index].classList.remove('bg-secondary');
            steps[index].classList.add('bg-primary');

            current = index;
        }

        // ==========================================
        // STEP CLICK
        // ==========================================
        steps.forEach((step, index) => {
            step.onclick = () => showQuestion(index);
        });

        // ==========================================
        // NEXT BUTTON
        // ==========================================
        container.querySelectorAll('.btn-next').forEach(btn => {
            btn.onclick = () => showQuestion(current + 1);
        });

        // ==========================================
        // PREV BUTTON
        // ==========================================
        container.querySelectorAll('.btn-prev').forEach(btn => {
            btn.onclick = () => showQuestion(current - 1);
        });

        // ==========================================
        // TIMER (HANYA JALAN JIKA BUKAN REVIEW)
        // ==========================================
        if (!isReview && timerEl) {

            function updateTimer() {

                let m = Math.floor(totalSeconds / 60);
                let s = totalSeconds % 60;

                if (s < 10) s = '0' + s;

                timerEl.innerHTML = `${m}:${s}`;

                if (totalSeconds <= 0) {

                    clearInterval(activeTimer);

                    Swal.fire({
                        icon: 'warning',
                        title: 'Waktu Habis ⏰',
                        text: 'Quiz akan otomatis dikirim',
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    }).then(() => {
                        if (form) form.submit();
                    });
                }

                totalSeconds--;
            }

            activeTimer = setInterval(updateTimer, 1000);
        }

        // Tampilkan soal pertama
        showQuestion(0);
    }

});
</script>


@if (session('quiz_result'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const result = @json(session('quiz_result'));

            Swal.fire({
                icon: result.passed ? 'success' : 'error',
                title: result.passed ? 'Selamat 🎉' : 'Belum Lulus 😢',
                text: result.passed ?
                    'Skor kamu ' + result.score + '%' : 'Skor kamu ' + result.score + '%. Minimal 70%',
                confirmButtonColor: '#0d6efd'
            });

        });
    </script>
@endif
