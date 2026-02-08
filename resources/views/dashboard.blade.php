@extends('layouts.app')
@section('content')
    <div class="container hero">

        <h1>Hello Nat 👋</h1>
        <small>Siap lanjutkan perjalanan belajarmu hari ini?</small>

        <div class="level-box">
            <div class="mb-2">
                You are now a <b class="text-primary">Beginner</b>
            </div>

            <div class="progress">
                <div class="progress-bar" style="width:35%"></div>
            </div>
        </div>

    </div>

    <div class="container mt-4 mb-5">
        <div class="row">

            <!-- LEFT COURSES -->
            <div class="col-lg-8">

                <div class="section-title">Courses</div>

                <!-- ITEM -->
                <div class="course-item d-flex justify-content-between align-items-center flex-wrap">
                    <div class="me-3">
                        <div class="course-title">Pengantar UML & Diagram Kelas</div>
                        <div class="course-desc">Menjelaskan apa itu UML, tujuan, dan konteks penggunaannya dalam SDLC.
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-4 mt-3 mt-lg-0">
                        <div class="course-meta">Beginner</div>
                        <div class="course-meta"><i class="bi bi-clock"></i> 17 hours</div>
                        <button class="btn btn-start">Mulai →</button>
                    </div>
                </div>

                <div class="course-item d-flex justify-content-between align-items-center flex-wrap">
                    <div class="me-3">
                        <div class="course-title">Pengantar UML & Diagram Kelas</div>
                        <div class="course-desc">Menjelaskan apa itu UML, tujuan, dan konteks penggunaannya dalam SDLC.
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-4 mt-3 mt-lg-0">
                        <div class="course-meta">Intermediate</div>
                        <div class="course-meta"><i class="bi bi-clock"></i> 17 hours</div>
                        <button class="btn btn-start">Mulai →</button>
                    </div>
                </div>

                <div class="course-item d-flex justify-content-between align-items-center flex-wrap">
                    <div class="me-3">
                        <div class="course-title">Pengantar UML & Diagram Kelas</div>
                        <div class="course-desc">Menjelaskan apa itu UML, tujuan, dan konteks penggunaannya dalam SDLC.
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-4 mt-3 mt-lg-0">
                        <div class="course-meta">Advance</div>
                        <div class="course-meta"><i class="bi bi-clock"></i> 17 hours</div>
                        <button class="btn btn-start">Mulai →</button>
                    </div>
                </div>

            </div>

            <!-- RIGHT SIDE -->
            <div class="col-lg-4">

                <div class="section-title">Continue Courses</div>

                <div class="continue-card">
                    <small>Beginner</small>
                    <h5 class="mt-2">Modul 1</h5>
                    <small>Pengantar UML & Diagram Kelas</small>

                    <div class="text-end mt-3">
                        <button class="btn btn-primary btn-sm">
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <div class="stats-card">
                    <div class="text-muted small">Total Time Spent</div>
                    <h2 class="text-primary fw-bold">27 <small class="text-muted fs-6">Hours</small></h2>

                    <hr>

                    <div class="d-flex justify-content-between">
                        <span class="text-muted small">This Week</span>
                        <b>6.5H</b>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
