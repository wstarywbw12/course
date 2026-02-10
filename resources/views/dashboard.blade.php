@extends('layouts.app')
@section('content')
    <div class="container hero">

        <h1>Hello Nat 👋</h1>
        <small>Siap lanjutkan perjalanan belajarmu hari ini?</small>

        <div class="level-box">
            <div class="mb-2 text-dark">
                You are now a <b class="text-primary">Beginner</b>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="progress">
                        <div class="progress-bar" style="width:35%"></div>
                    </div>
                    <div class="text-end">
                        <i style="font-size: 22px" class="bi bi-circle-fill me-2 text-primary "></i>
                    </div>
                </div>
                <div class="col-4">
                    <div class="progress">
                        <div class="progress-bar" style="width:0%"></div>
                    </div>
                    <div class="text-end">
                        <i style="font-size: 22px" class="bi bi-triangle-fill  me-2 text-primary "></i>
                    </div>
                </div>
                <div class="col-4">
                    <div class="progress">
                        <div class="progress-bar" style="width:0%"></div>
                    </div>
                    <div class="text-end">
                        <i style="font-size: 22px" class="bi bi-square-fill  me-2 text-primary "></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container mt-4 mb-5">
        <div class="row">

            <!-- LEFT COURSES -->
            <div class="col-lg-8">

                <div class="course-wrapper ">
                    <div class=" mb-3">
                        <h5 class="text-white fw-bold ">Courses</h5>

                        <div class="card course-card shadow-sm border-0">
                            <div class="card-body p-3 p-lg-4">

                                <!-- ITEM -->
                                <div
                                    class="course-item d-flex flex-column flex-lg-row 
                   justify-content-between align-items-start align-items-lg-center 
                   py-3 gap-3 gap-lg-0">

                                    <!-- LEFT -->
                                    <div class="course-info">
                                        <h6 class="fw-bold mb-1">Pengantar UML & Diagram Kelas</h6>
                                        <p class="text-muted mb-0">
                                            Menjelaskan apa itu UML, tujuan, dan konteks penggunaannya dalam SDLC.
                                        </p>
                                    </div>

                                    <!-- RIGHT -->
                                    <div
                                        class="course-meta d-flex flex-wrap flex-lg-nowrap 
                       align-items-center gap-3 gap-lg-5">

                                        <span class="text-muted fst-italic">Beginner</span>

                                        <div class="d-flex align-items-center text-muted">
                                            <i class="bi bi-clock me-2"></i> 17 hours
                                        </div>

                                        <a href="{{ route('detail.course') }}"
                                            class="btn btn-outline-primary rounded-pill px-4 btn-sm d-flex align-items-center">
                                            <span class="me-1">Mulai</span>
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>

                                <hr>

                                <!-- ITEM -->
                                <div
                                    class="course-item d-flex flex-column flex-lg-row 
                   justify-content-between align-items-start align-items-lg-center 
                   py-3 gap-3 gap-lg-0">

                                    <div class="course-info">
                                        <h6 class="fw-bold mb-1">Pengantar UML & Diagram Kelas</h6>
                                        <p class="text-muted mb-0">
                                            Menjelaskan apa itu UML, tujuan, dan konteks penggunaannya dalam SDLC.
                                        </p>
                                    </div>

                                    <div
                                        class="course-meta d-flex flex-wrap flex-lg-nowrap 
                       align-items-center gap-3 gap-lg-5">

                                        <span class="text-muted fst-italic">Intermediate</span>

                                        <div class="d-flex align-items-center text-muted">
                                            <i class="bi bi-clock me-2"></i> 17 hours
                                        </div>

                                       <a href="{{ route('detail.course') }}"
                                            class="btn btn-outline-primary rounded-pill px-4 btn-sm d-flex align-items-center">
                                            <span class="me-1">Mulai</span>
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>

                                <hr>

                                <!-- ITEM -->
                                <div
                                    class="course-item d-flex flex-column flex-lg-row 
                   justify-content-between align-items-start align-items-lg-center 
                   py-3 gap-3 gap-lg-0">

                                    <div class="course-info">
                                        <h6 class="fw-bold mb-1">Pengantar UML & Diagram Kelas</h6>
                                        <p class="text-muted mb-0">
                                            Menjelaskan apa itu UML, tujuan, dan konteks penggunaannya dalam SDLC.
                                        </p>
                                    </div>

                                    <div
                                        class="course-meta d-flex flex-wrap flex-lg-nowrap 
                       align-items-center gap-3 gap-lg-5">

                                        <span class="text-muted fst-italic">Advance</span>

                                        <div class="d-flex align-items-center text-muted">
                                            <i class="bi bi-clock me-2"></i> 17 hours
                                        </div>

                                       <a href="{{ route('detail.course') }}"
                                            class="btn btn-outline-primary rounded-pill px-4 btn-sm d-flex align-items-center">
                                            <span class="me-1">Mulai</span>
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- RIGHT SIDE -->
            <div class="col-lg-4">

                <h5 class="text-white fw-bold ">Continue Course</h5>

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


<style>
    .course-info h6 {
        font-size: 14px;
    }

    .course-info p {
        font-size: 13px;
    }

    @media (max-width: 576px) {
        .course-meta {
            width: 100%;
            justify-content: space-between;
        }
    }
</style>
