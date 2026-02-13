 <div class="list-group">
    <div class="lesson-list" id="lessonList">
        @foreach ($course->quizzes as $index => $quiz)

            <div class="lesson-item">
                <div class="lesson-number">{{ $index + 1 }}</div>

                <div>
                    <div class="lesson-title">{{ $quiz->title }}</div>
                    <div class="lesson-time">
                        <i class="bi bi-clock"></i> {{ $quiz->duration ?? 0 }} menit
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
