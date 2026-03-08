@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="page-title">Aktivitas Kamu</div>

        <div class="row">

            <!-- LEFT CONTENT -->
            <div class="col-lg-8">
                @if ($courses->count() > 0)
                    @foreach ($courses as $course)
                        <div class="level-card mb-4">

                            <div class="d-flex align-items-center mb-2">
                                <div class="level-icon">
                                    <i class="{{ $course->level->icon }}"></i>
                                </div>
                                <h5 class="mb-0 fw-semibold">
                                    {{ $course->level->level }}
                                </h5>
                            </div>

                            <p class="level-desc mt-3">
                                {!! Str::limit(strip_tags($course->description ?? ''), 83) !!}
                            </p>

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="level-meta">
                                    <i class="bi bi-clock"></i>
                                    {{ $course->total_hours }} Hours
                                </div>
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="level-meta">
                                    {{ $course->total_modules }} Modul Pembelajaran
                                </div>

                                <a href="{{ route('courses.detail', $course->id) }}" class="btn btn-detail">
                                    Detail →
                                </a>
                            </div>

                        </div>
                    @endforeach
                @else
                    <div class="card">
                        <div class="card-body">
                            <div class="empty-state-card text-center p-5">
                        <div class="empty-state-icon mb-3">
                            <i class="bi bi-journal-bookmark-fill" style="font-size: 4rem; color: #ccc;"></i>
                        </div>
                        <h4 class="fw-semibold mb-2">Belum Ada Course</h4>
                        <p class="text-muted mb-0">
                            Anda belum mempelajari course apapun. Yuk, mulai belajar sekarang!
                        </p>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-4">
                            Lihat Semua Course
                        </a>
                    </div>
                        </div>
                    </div>
                @endif


            </div>


            <!-- RIGHT SIDE -->
            <div class="col-lg-4">

                <!-- CALENDAR -->
                <div class="calendar-card">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <i class="bi bi-chevron-left" id="prevMonth" style="cursor:pointer"></i>
                        <div id="monthYear"></div>
                        <i class="bi bi-chevron-right" id="nextMonth" style="cursor:pointer"></i>
                    </div>

                    <div class="calendar-grid" id="calendarGrid"></div>
                </div>


                <!-- CONTINUE -->
                @if ($continueCourse)
                    <div class="continue-card">
                        <small>{{ $continueCourse->level->level }}</small>

                        <h6 class="my-2">{{ Str::limit($continueCourse->title, 30) }}</h6>

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

            </div>

        </div>
    </div>

    @include('pages.activity.modal')
@endsection


@include('pages.activity.style')

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const calendarGrid = document.getElementById('calendarGrid');
        const monthYear = document.getElementById('monthYear');
        const prevBtn = document.getElementById('prevMonth');
        const nextBtn = document.getElementById('nextMonth');

        let currentDate = new Date();

        // Data dari backend
        const activityDates = @json($activityDates);

        function renderCalendar(date) {

            calendarGrid.innerHTML = '';

            const year = date.getFullYear();
            const month = date.getMonth();

            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            monthYear.innerText = date.toLocaleDateString('id-ID', {
                month: 'long',
                year: 'numeric'
            });

            // kosong sebelum tanggal 1
            for (let i = 0; i < firstDay; i++) {
                calendarGrid.innerHTML += `<div class="day inactive"></div>`;
            }

            for (let day = 1; day <= daysInMonth; day++) {

                const fullDate =
                `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;

                const isActive = activityDates.includes(fullDate);

                calendarGrid.innerHTML += `
                    <div class="day ${isActive ? 'bg-primary text-white' : ''}">
                        <span>${day}</span>
                    </div>
                `;
            }
        }

        prevBtn.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar(currentDate);
        });

        nextBtn.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar(currentDate);
        });

        renderCalendar(currentDate);
    });
</script>
