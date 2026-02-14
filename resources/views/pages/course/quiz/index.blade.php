@foreach ($course->quizzes as $quiz)
    <div class="container pb-5">

        <!-- Header -->
        <h2 class="fw-bold mb-3">{{ $quiz->title }}</h2>
        <p class="text-muted mb-4">
            {{ $quiz->description }}
        </p>

        <form action="{{ route('quiz.submit', $quiz->id) }}" method="POST" id="quizForm">
            @csrf

            <!-- STEP NAV -->
            <div class="d-flex gap-2 mb-4 ">
                @foreach ($quiz->questions as $index => $question)
                    <button type="button"
                       class="btn quiz-step d-flex justify-content-center align-items-center {{ $index == 0 ? 'bg-primary text-white' : 'bg-secondary text-white' }}"
                        onclick="goToQuestion({{ $index }})">
                        {{ $index + 1 }}
                    </button>
                @endforeach
            </div>


            <!-- QUESTIONS -->
            @foreach ($quiz->questions as $qIndex => $question)
                <div class="card quiz-card shadow-sm question-item" data-index="{{ $qIndex }}"
                    style="{{ $qIndex == 0 ? '' : 'display:none' }}">

                    <div class="card-body p-4">

                        <!-- Question -->
                        <div class="d-flex mb-4">
                             <div class="question-number btn btn-primary d-flex justify-content-center align-items-center">

                                {{ $qIndex + 1 }}
                            </div>

                            <h6 class="fw-semibold mb-0 align-self-center ms-3">
                                {{ strip_tags($question->question) }}
                            </h6>
                        </div>

                        <!-- Options -->
                        <div class="vstack gap-2">

                            @foreach ($question->options as $oIndex => $option)
                                <div>
                                    <input type="radio" name="answers[{{ $question->id }}]"
                                        value="{{ $option->id }}" id="opt{{ $option->id }}" class="option-input">

                                    <label for="opt{{ $option->id }}" class="option-card d-flex align-items-center">

                                        <div class="option-label">
                                            {{ chr(65 + $oIndex) }}
                                        </div>

                                        <span>{{ strip_tags($option->option_text) }}
                                        </span>

                                    </label>
                                </div>
                            @endforeach

                        </div>

                        <!-- Footer Buttons -->
                        <div class="d-flex justify-content-end gap-3 mt-5">

                            <button type="button" class="btn btn-light px-4" onclick="prevQuestion()">
                                Back
                            </button>

                            @if ($qIndex + 1 == $quiz->questions->count())
                                <button type="submit" class="btn btn-success px-4">
                                    Submit
                                </button>
                            @else
                                <button type="button" class="btn btn-primary px-4" onclick="nextQuestion()">
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
let currentQuestion = 0;
const questions = document.querySelectorAll('.question-item');
const steps = document.querySelectorAll('.quiz-step');


function showQuestion(index) {

    // Hide all questions
    questions.forEach(q => q.style.display = 'none');

    // Show selected
    questions[index].style.display = 'block';

    // Update step color
    steps.forEach(step => {
        step.classList.remove('bg-primary');
        step.classList.remove('bg-secondary');
        step.classList.remove('active');

        step.classList.add('bg-secondary');
        step.classList.add('text-white');
    });

    steps[index].classList.remove('bg-secondary');
    steps[index].classList.add('bg-primary');

    currentQuestion = index;
}

function nextQuestion() {
    if (currentQuestion < questions.length - 1) {
        showQuestion(currentQuestion + 1);
    }
}

function prevQuestion() {
    if (currentQuestion > 0) {
        showQuestion(currentQuestion - 1);
    }
}

function goToQuestion(index) {
    showQuestion(index);
}
</script>


@if(session('quiz_result'))
<script>
document.addEventListener('DOMContentLoaded', function() {

    let result = @json(session('quiz_result'));

    let iconType = result.passed ? 'success' : 'error';
    let titleText = result.passed ? 'Selamat 🎉' : 'Belum Lulus 😢';
    let messageText = result.passed 
        ? 'Kamu berhasil menyelesaikan quiz dengan skor ' + result.score + '%'
        : 'Skor kamu ' + result.score + '%. Minimal kelulusan 70%';

    Swal.fire({
        icon: iconType,
        title: titleText,
        html: `
            <div style="font-size:18px;margin-top:10px;">
                ${messageText}
            </div>
        `,
        confirmButtonText: 'OK',
        confirmButtonColor: '#0d6efd'
    });

});
</script>
@endif
