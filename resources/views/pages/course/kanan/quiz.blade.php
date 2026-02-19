<div class="list-group">
    <div class="lesson-list">

       @foreach ($course->quizzes as $index => $quiz)

    @php
        $isFinished = in_array($quiz->id, $quizResults ?? []);
    @endphp

    <div class="lesson-item start-quiz-btn"
         data-quiz-id="{{ $quiz->id }}"
         data-time="{{ $quiz->time }}"
         @if($isFinished) data-review="true" @endif
         style="cursor:pointer;">

        <div class="lesson-number">
            {{ $index + 1 }}
        </div>

        <div>
            <div class="lesson-title">
                {{ $quiz->title }}
            </div>

            <div class="lesson-time">
                <i class="bi bi-clock"></i>
                {{ $quiz->time }} menit
            </div>
        </div>

    </div>

@endforeach


    </div>
</div>
