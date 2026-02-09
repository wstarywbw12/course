@extends('layouts.app')
@section('content')
    <div class="container hero">

        <h1>Hello Nat 👋</h1>
        <small>Siap lanjutkan perjalanan belajarmu hari ini?</small>

        <div class="level-box">
            <div class="mb-2 text-dark">
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

                <div class="course-wrapper ">
                    <div class="container">
                        <h5 class="text-white fw-bold ">Courses</h5>

                        <div class="card course-card shadow-lg border-0">
                            <div class="card-body p-4">

                                <!-- Item -->
                                <div class="course-item d-flex justify-content-between align-items-center py-3">
                                    <div>
                                        <h6 class="fw-bold  mb-1">Pengantar UML & Diagram Kelas</h6>
                                        <p class="text-muted mb-0">
                                            Menjelaskan apa itu UML, tujuan, dan konteks penggunaannya dalam SDLC.
                                        </p>
                                    </div>

                                    <div class="d-flex align-items-center gap-5">
                                        <span class="text-muted fst-italic">Beginner</span>

                                        <div  class="d-flex align-items-center text-muted">
                                            <i class="bi bi-clock me-2"></i> 17 hours
                                        </div>

                                        <a style="font-size: 13px;display: flex; align-items: center;" href="{{ route('detail.course') }}" class="btn btn-outline-primary rounded-pill px-4">
                                            Mulai 
                                            <i class="bi bi-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>

                                <hr>

                                <!-- Item -->
                                <div class="course-item d-flex justify-content-between align-items-center py-3">
                                    <div>
                                        <h6 class="fw-bold mb-1">Pengantar UML & Diagram Kelas</h6>
                                        <p class="text-muted mb-0">
                                            Menjelaskan apa itu UML, tujuan, dan konteks penggunaannya dalam SDLC.
                                        </p>
                                    </div>

                                    <div class="d-flex align-items-center gap-5">
                                        <span class="text-muted fst-italic">Intermediate</span>

                                        <div class="d-flex align-items-center text-muted">
                                            <i class="bi bi-clock me-2"></i> 17 hours
                                        </div>

                                         <a style="font-size: 13px;display: flex; align-items: center;" href="#" class="btn btn-outline-primary rounded-pill px-4">
                                            Mulai 
                                            <i class="bi bi-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>

                                <hr>

                                <!-- Item -->
                                <div class="course-item d-flex justify-content-between align-items-center py-3">
                                    <div>
                                        <h6 class="fw-bold mb-1">Pengantar UML & Diagram Kelas</h6>
                                        <p class="text-muted mb-0">
                                            Menjelaskan apa itu UML, tujuan, dan konteks penggunaannya dalam SDLC.
                                        </p>
                                    </div>

                                    <div class="d-flex align-items-center gap-5">
                                        <span class="text-muted fst-italic">Advance</span>

                                        <div class="d-flex align-items-center text-muted">
                                            <i class="bi bi-clock me-2"></i> 17 hours
                                        </div>

                                         <a style="font-size: 13px;display: flex; align-items: center;" href="#" class="btn btn-outline-primary rounded-pill px-4">
                                            Mulai 
                                            <i class="bi bi-arrow-right ms-1"></i>
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
