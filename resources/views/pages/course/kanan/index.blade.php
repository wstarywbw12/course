<div class="col-lg-4">
    <div class="card shadow-sm border-0 my-3 bg-dark">
        <div class="card-body">
            <h6 class="fw-bold text-light">Pengantar UML & Diagram Kelas</h6>

            <!-- Progress -->
            <div class="progress" style="height:6px;">
                <div class="progress-bar" style="width:30%"></div>
            </div>
        </div>
    </div>

    <ul class="nav nav-pills custom-tabs mb-3 w-100" role="tablist">
        <li class="nav-item flex-fill">
            <button class="nav-link active w-100" data-bs-toggle="pill" data-bs-target="#tab-courses" type="button">
                Courses
            </button>
        </li>
        <li class="nav-item flex-fill">
            <button class="nav-link w-100" data-bs-toggle="pill" data-bs-target="#tab-notes" type="button">
                Notes
            </button>
        </li>
    </ul>



    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="tab-content">

                <div class="tab-pane fade show active" id="tab-courses">
                    @include('pages.course.kanan.courses')
                </div>

                <div class="tab-pane fade" id="tab-notes">
                    @include('pages.course.kanan.notes')
                </div>

            </div>

        </div>
    </div>
</div>
