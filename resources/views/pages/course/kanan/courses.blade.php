<ul class="nav nav-pills nav-pills-materi mb-4 w-100" id="lessonQuizTab" role="tablist">
    <li class="nav-item w-50">
        <button class="nav-link w-100 fw-semibold py-2 active"
            id="lesson-tab"
            data-bs-toggle="pill"
            data-bs-target="#lesson">
            Lesson
        </button>
    </li>

    <li class="nav-item w-50">
        <button class="nav-link w-100 fw-semibold py-2"
            id="quiz-tab"
            data-bs-toggle="pill"
            data-bs-target="#quiz">
            Quiz
        </button>
    </li>
</ul>



<div class="tab-content">

    <!-- LESSON CONTENT -->
    <div class="tab-pane fade show active" id="lesson" role="tabpanel">
        @include('pages.course.kanan.lesson')
    </div>

    <!-- QUIZ CONTENT -->
    <div class="tab-pane fade" id="quiz" role="tabpanel">
        @include('pages.course.kanan.quiz')
    </div>

</div>
