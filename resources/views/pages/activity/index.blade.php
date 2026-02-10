@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="page-title">Aktivitas Kamu</div>

        <div class="row">

            <!-- LEFT CONTENT -->
            <div class="col-lg-8">

                <!-- BEGINNER -->
                <div class="level-card mb-4">

                    <div class="d-flex align-items-center mb-2">
                        <div class="level-icon"><i class="bi bi-triangle-fill"></i></div>
                        <h5 class="mb-0 fw-semibold">Beginner</h5>
                    </div>

                    <p class="level-desc mt-3">
                        Pada pembelajaran level ini, kamu akan belajar mengenai UML Class Diagram dari nol.
                        Mulai dari apa itu UML Diagram, Dasar-dasar UML Class Diagram,
                        hingga Hubungan antar class pada UML Class Diagram
                    </p>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="level-meta">
                            <i class="bi bi-clock"></i> 17 hours
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="level-meta">8 Modul Pembelajaran</div>
                        <button type="button" class="btn btn-detail" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Detail →
                        </button>
                    </div>
                </div>


                <!-- INTERMEDIATE -->
                <div class="level-card mb-5">

                    <div class="d-flex align-items-center mb-2">
                        <div class="level-icon"><i class="bi bi-diamond-fill"></i></div>
                        <h5 class="mb-0 fw-semibold">Intermediate</h5>
                    </div>

                    <p class="level-desc mt-3">
                        Pada pembelajaran level ini, kamu akan belajar mengenai UML Class Diagram dari nol.
                        Mulai dari apa itu UML Diagram, Dasar-dasar UML Class Diagram,
                        hingga Hubungan antar class pada UML Class Diagram
                    </p>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="level-meta">
                            <i class="bi bi-clock"></i> 17 hours
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="level-meta">8 Modul Pembelajaran</div>
                        <button class="btn btn-detail">Detail →</button>
                    </div>
                </div>

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

            </div>

        </div>
    </div>

    @include('pages.activity.modal')
@endsection


<style>
    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(180deg, #081b3a 0%, #1e4ed8 45%, #e9edf5 100%);
        min-height: 100vh;
    }

    /* NAVBAR */
    .navbar-custom {
        background: transparent;
        padding: 18px 0;
        border-bottom: 1px solid rgba(255, 255, 255, .15);
    }

    .nav-link {
        color: #dbeafe !important;
    }

    .nav-link.active {
        border-bottom: 2px solid white;
    }

    /* TITLE */
    .page-title {
        color: white;
        font-weight: 700;
        margin: 30px 0 20px;
        font-size: 26px;
    }

    /* LEVEL CARD */
    .level-card {
        background: #eef1f6;
        border-radius: 16px;
        padding: 22px;
        border: 4px solid rgba(255, 255, 255, .25);
        box-shadow: 0 15px 30px rgba(0, 0, 0, .15);
    }

    .level-icon {
        width: 42px;
        height: 42px;
        border-radius: 10px;
        background: #dbeafe;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #2563eb;
        font-size: 20px;
        margin-right: 12px;
    }

    .level-desc {
        font-size: 14px;
        color: #4b5563;
    }

    .level-meta {
        font-size: 14px;
        color: #4b5563;
    }

    .btn-detail {
        border: 1.5px solid #2563eb;
        color: #2563eb;
        border-radius: 22px;
        padding: 6px 18px;
    }

    .btn-detail:hover {
        background: #2563eb;
        color: white;
    }

    .calendar-card {
        background: #0b0f19;
        color: white;
        border-radius: 16px;
        padding: 18px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .4);
    }

    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 8px;
    }

    .day {
        display: flex;
        align-items: center;
        justify-content: center;

        width: 100%;
        aspect-ratio: 1 / 1;
        border-radius: 8px;

        background: #ffffff;
        color: #111;
        font-size: 13px;
        font-weight: 600;
    }

    .day span {
        position: static;
        /* HAPUS posisi absolute */
    }


    .day.active {
        background: #2563eb;
        color: #fff;
    }

    .day.inactive {
        background: #e5e7eb;
        color: #9ca3af;
    }

    /* CONTINUE CARD */
    .continue-card {
        background: linear-gradient(135deg, #0b0f19, #1f2937);
        color: white;
        border-radius: 16px;
        padding: 18px;
        margin-top: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .3);
    }
</style>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const calendarGrid = document.getElementById('calendarGrid');
        const monthYear = document.getElementById('monthYear');
        const prevBtn = document.getElementById('prevMonth');
        const nextBtn = document.getElementById('nextMonth');

        let currentDate = new Date();

        function generateRandomActivity(daysInMonth) {
            const activityDays = new Set();
            const total = Math.floor(Math.random() * 10) + 5; // 5–15 hari aktif

            while (activityDays.size < total) {
                activityDays.add(Math.floor(Math.random() * daysInMonth) + 1);
            }
            return activityDays;
        }

        function renderCalendar(date) {
            calendarGrid.innerHTML = '';

            const year = date.getFullYear();
            const month = date.getMonth();

            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            const activities = generateRandomActivity(daysInMonth);

            monthYear.innerText = date.toLocaleDateString('id-ID', {
                month: 'long',
                year: 'numeric'
            });

            // empty sebelum tanggal 1
            for (let i = 0; i < firstDay; i++) {
                calendarGrid.innerHTML += `<div class="day inactive"></div>`;
            }

            // tanggal
            for (let day = 1; day <= daysInMonth; day++) {
                const isActive = activities.has(day);
                calendarGrid.innerHTML += `
                <div class="day ${isActive ? 'active' : ''}">
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
