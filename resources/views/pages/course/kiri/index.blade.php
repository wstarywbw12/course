<div class="col-lg-8 mb-4">
    <h4 class="fw-bold mb-3">Alat Pemodelan UML & Persiapan</h4>

    <!-- Video -->
    <div class="video-box mb-3 ratio ratio-16x9">
        <video controls>
            <source src="video.mp4" type="video/mp4">
        </video>
    </div>

    <!-- Tabs -->
    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <button class="nav-link text-sub active" data-bs-toggle="tab" data-bs-target="#transcript">
                Transcript
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link text-sub" data-bs-toggle="tab" data-bs-target="#description">
                Description
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link text-sub" data-bs-toggle="tab" data-bs-target="#resources">
                Resources
            </button>
        </li>
    </ul>

    <!-- Tab Content -->
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
