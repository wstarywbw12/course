<div class="col-lg-8 mb-4">

    <!-- ================= LESSON WRAPPER ================= -->
    <div id="lessonWrapper">

        <h5 id="lessonTitle" class="mb-3"></h5>

        <div id="lessonContent"></div>

        <!-- Tabs Lesson -->
        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#transcript">
                    Transcript
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#description">
                    Description
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#resources">
                    Resources
                </button>
            </li>
        </ul>

        <div class="tab-content bg-white p-3 rounded shadow-sm">
            <div class="tab-pane fade show active" id="transcript">
                @include('pages.course.kiri.transcript')
            </div>

            <div class="tab-pane fade" id="description">
                @include('pages.course.kiri.description')
            </div>

            <div class="tab-pane fade" id="resources">
                @include('pages.course.kiri.resources')
            </div>
        </div>

    </div>

    <!-- ================= QUIZ WRAPPER ================= -->
    <div id="quizWrapper" class="d-none mb-5">
        @include('pages.course.quiz.index')
    </div>

</div>
