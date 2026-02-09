@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">

            <!-- ================= LEFT CONTENT ================= -->
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
                        <h6>Intro</h6>
                        <p>
                            Pada bagian awal ini diperkenalkan beberapa alat pemodelan UML
                            seperti draw.io dan Lucidchart. Tujuannya agar kamu memahami
                            tool apa yang bisa digunakan secara efektif.
                        </p>

                        <h6>Material</h6>
                        <p>
                            Materi menjelaskan langkah dasar membuat Class Diagram,
                            menambahkan atribut, operasi, dan struktur kelas.
                        </p>

                        <h6>Conclusion</h6>
                        <p>
                            Video merangkum pentingnya memilih alat yang tepat dan
                            mempersiapkan diagram dengan benar.
                        </p>
                    </div>

                    <div class="tab-pane fade" id="description">
                        <p>
                            Video ini membahas persiapan dan alat bantu dalam pemodelan UML
                            sebelum masuk ke pembahasan diagram kelas lebih lanjut.
                        </p>
                    </div>

                    <div class="tab-pane fade" id="resources">
                        <ul>
                            <li>Slide PDF</li>
                            <li>Template Diagram UML</li>
                            <li>Link draw.io</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- ================= RIGHT SIDEBAR ================= -->
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

                <!-- NAV TABS -->
                <ul class="nav nav-pills custom-tabs mb-3" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#courses" type="button"
                            role="tab">
                            Courses
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#notes" type="button"
                            role="tab">
                            Notes
                        </button>
                    </li>
                </ul>

                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <div class="tab-pane fade show active" id="courses">

                            <!-- Lesson / Quiz -->
                            <div class="btn-group w-100 mb-3 sub-tabs">
                                <button class="btn btn-primary">Lesson</button>
                                <button class="btn btn-outline-secondary">Quiz</button>
                            </div>

                            <!-- Lesson List -->
                            <div class="lesson-list">

                                <div class="lesson-item">
                                    <div class="lesson-number">1</div>
                                    <div>
                                        <div class="lesson-title">Pengantar UML & Diagram Kelas</div>
                                        <div class="lesson-time">
                                            <i class="bi bi-clock"></i> 5 min, 15 minute
                                        </div>
                                    </div>
                                </div>

                                <div class="lesson-item active">
                                    <div class="lesson-number">2</div>
                                    <div>
                                        <div class="lesson-title">Alat Pemodelan UML & Persiapan</div>
                                        <div class="lesson-time">
                                            <i class="bi bi-clock"></i> 5 min, 15 minute
                                        </div>
                                    </div>
                                </div>

                                <div class="lesson-item">
                                    <div class="lesson-number">3</div>
                                    <div>
                                        <div class="lesson-title">Komponen & Notasi Dasar Class Diagram</div>
                                        <div class="lesson-time">
                                            <i class="bi bi-clock"></i> 5 min, 15 minute
                                        </div>
                                    </div>
                                </div>

                                <div class="lesson-item">
                                    <div class="lesson-number">4</div>
                                    <div>
                                        <div class="lesson-title">Merepresentasikan Kelas, Atribut, dan Operasi</div>
                                        <div class="lesson-time">
                                            <i class="bi bi-clock"></i> 5 min, 15 minute
                                        </div>
                                    </div>
                                </div>

                                <div class="lesson-item">
                                    <div class="lesson-number">5</div>
                                    <div>
                                        <div class="lesson-title">Contoh Diagram Kelas Sederhana</div>
                                        <div class="lesson-time">
                                            <i class="bi bi-clock"></i> 5 min, 15 minute
                                        </div>
                                    </div>
                                </div>

                                <div class="lesson-item">
                                    <div class="lesson-number">6</div>
                                    <div>
                                        <div class="lesson-title">Rangkuman Dasar Class Diagram</div>
                                        <div class="lesson-time">
                                            <i class="bi bi-clock"></i> 5 min, 15 minute
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- ================= FOOTER NAV ================= -->
        <div class="footer-nav d-flex justify-content-between mt-4 mb-3">
            <button class="btn btn-outline-primary">
                <i class="bi bi-arrow-left"></i> Kembali
            </button>
            <button class="btn btn-primary">
                Lanjut <i class="bi bi-arrow-right"></i>
            </button>
        </div>
    </div>


    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #fff;
            min-height: 100vh;
        }

        .text-brand {
            color: #1e4ed8;
        }

        a.text-nav {
            color: #1e4ed8 !important;
            text-decoration: none;
        }

        .text-sub {
            color: #1e4ed8 !important;
        }

        .custom-tabs {
            background-color: #1e63ff;
            border-radius: 6px;
            padding: 6px;
            width: fit-content;
        }

        .custom-tabs .nav-link {
            color: #fff;
            font-weight: 600;
            border-radius: 5px;
            padding: 5px 62px;
        }

        .custom-tabs .nav-link.active {
            background-color: #fff;
            color: #1e63ff !important;
        }


        /* Lesson List */
        .lesson-list {
            max-height: 500px;
            overflow-y: auto;
        }

        .lesson-item {
            display: flex;
            gap: 12px;
            padding: 7px;
            border-radius: 10px;
            background: #f8f9fa;
            margin-bottom: 10px;
            align-items: center;
            border: 2px solid transparent;
        }

        .lesson-item.active {
            background: #fff;
            border-color: #1e63ff;
        }

        .lesson-number {
            background: #1e63ff;
            color: #fff;
            width: 25px;
            height: 25px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            flex-shrink: 0;
        }

        .lesson-title {
            font-weight: 600;
            font-size: 12px;
        }

        .lesson-time {
            font-size: 12px;
            color: #6c757d;
        }
    </style>
@endsection
