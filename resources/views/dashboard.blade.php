@extends('layouts.app')
@section('content')
    <div class="container hero">

        <h1>Hello {{ Auth::user()->name ?? '' }} 👋</h1>
        <small>Siap lanjutkan perjalanan belajarmu hari ini?</small>

        <div class="level-box">
            <div class="mb-2 text-dark">
                You are now a <b class="text-primary">
                    @php
                        $currentLevel = $levels->firstWhere('id', 1); // default level 1

                        foreach ($levels as $level) {
                            if (($levelProgress[$level->id] ?? 0) >= 100) {
                                $currentLevel = $level;
                            } else {
                                break; // berhenti jika nemu level yang belum complete
                            }
                        }
                    @endphp
                    {{ $currentLevel->level ?? 'Beginner' }}
                </b>
            </div>

            <div class="row">
                @foreach ($levels as $level)
                    @php
                        $progress = $levelProgress[$level->id] ?? 0;
                    @endphp

                    <div class="col-4 mb-3">

                        <div class="progress" style="height:16px;">
                            <div class="progress-bar bg-primary" style="width: {{ $progress }}%">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-2">
                            <small class="text-dark ">{{ $progress }}%</small>
                            <i style="font-size: 22px" class="{{ $level->icon }} text-primary">
                            </i>
                        </div>

                    </div>
                @endforeach
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

                                @foreach ($courses as $course)
                                    <!-- ITEM -->
                                    <div
                                        class="course-item d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center  py-3 gap-3 gap-lg-0">

                                        <!-- LEFT -->
                                        <div class="course-info">
                                            <h6 class="fw-bold mb-1">
                                                {{ Str::limit($course->title ?? '-', 30) }}
                                            </h6>
                                            <p class="text-muted mb-0">
                                                {!! Str::limit(strip_tags($course->description ?? ''), 83) !!}
                                            </p>
                                        </div>

                                        <!-- RIGHT -->
                                        <div
                                            class="course-meta d-flex flex-wrap flex-lg-nowrap  align-items-center gap-3 gap-lg-5">

                                            <span class="text-muted fst-italic">{{ $course->level->level }}</span>

                                            <div class="d-flex align-items-center text-muted">
                                                <i class="bi bi-clock me-2"></i>
                                                {{ $course->total_hours }} Hours
                                            </div>



                                            @if ($course->is_completed)
                                                <a href="{{ route('courses.detail', $course) }}"
                                                    class="btn btn-success rounded-pill px-4 btn-sm d-flex align-items-center">
                                                    <span class="me-1">Lulus</span>
                                                    <i class="bi bi-stars"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('courses.detail', $course) }}"
                                                    class="btn btn-outline-primary rounded-pill px-4 btn-sm d-flex align-items-center">
                                                    <span class="me-1">Mulai</span>
                                                    <i class="bi bi-arrow-right"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>

                                    <hr>
                                @endforeach




                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- RIGHT SIDE -->
            <div class="col-lg-4">

                <h5 class="text-white fw-bold">Continue Course</h5>

                @if ($continueCourse)
                    <div class="continue-card">
                        <small>{{ $continueCourse->level->level }}</small>

                        <h6 class="my-2">{{ Str::limit($continueCourse->title, 36) }}</h6>

                        <small>
                            {!! Str::limit(strip_tags($continueCourse->description ?? ''), 83) !!}
                        </small>

                        <div class="text-end mt-3">
                            <a href="{{ route('courses.detail', $continueCourse->id) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @else
                    <div class="continue-card">
                        <small>Belum ada course yang dipelajari</small>
                    </div>
                @endif


                <div class="stats-card">

                    <div class="fw-bold">Total Time Spent</div>

                    <h2 class="text-primary fw-bold d-inline">
                        {{ $totalHours }}
                    </h2>
                    Hours
                    <h2 class="text-primary fw-bold d-inline">
                        {{ $totalRemainingMinutes }}
                    </h2>
                    Minutes

                    <hr>

                    <div class="d-flex justify-content-between">
                        <span class="text-muted small">This Week</span>
                        <b>{{ $totalHoursThisWeek }}H</b>
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
