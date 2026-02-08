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
                    <button class="btn btn-detail">Detail →</button>
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
                <div class="d-flex justify-content-between align-items-center">
                    <i class="bi bi-chevron-left"></i>
                    <div>September</div>
                    <i class="bi bi-chevron-right"></i>
                </div>

                <div class="calendar-grid">
                    <!-- generate 35 kotak -->
                    <div class="day"></div>
                    <div class="day"></div>
                    <div class="day mid"></div>
                    <div class="day active"></div>
                    <div class="day mid"></div>
                    <div class="day"></div>
                    <div class="day"></div>

                    <div class="day"></div>
                    <div class="day active"></div>
                    <div class="day mid"></div>
                    <div class="day"></div>
                    <div class="day"></div>
                    <div class="day active"></div>
                    <div class="day"></div>

                    <div class="day"></div>
                    <div class="day"></div>
                    <div class="day active"></div>
                    <div class="day mid"></div>
                    <div class="day"></div>
                    <div class="day"></div>
                    <div class="day"></div>

                    <div class="day"></div>
                    <div class="day mid"></div>
                    <div class="day"></div>
                    <div class="day"></div>
                    <div class="day"></div>
                    <div class="day"></div>
                    <div class="day"></div>
                </div>
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

<style>

body{
    font-family:'Inter',sans-serif;
    background:linear-gradient(180deg,#081b3a 0%,#1e4ed8 45%,#e9edf5 100%);
    min-height:100vh;
}

/* NAVBAR */
.navbar-custom{
    background:transparent;
    padding:18px 0;
    border-bottom:1px solid rgba(255,255,255,.15);
}

.nav-link{
    color:#dbeafe !important;
}

.nav-link.active{
    border-bottom:2px solid white;
}

/* TITLE */
.page-title{
    color:white;
    font-weight:700;
    margin:30px 0 20px;
    font-size:26px;
}

/* LEVEL CARD */
.level-card{
    background:#eef1f6;
    border-radius:16px;
    padding:22px;
    border:4px solid rgba(255,255,255,.25);
    box-shadow:0 15px 30px rgba(0,0,0,.15);
}

.level-icon{
    width:42px;
    height:42px;
    border-radius:10px;
    background:#dbeafe;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#2563eb;
    font-size:20px;
    margin-right:12px;
}

.level-desc{
    font-size:14px;
    color:#4b5563;
}

.level-meta{
    font-size:14px;
    color:#4b5563;
}

.btn-detail{
    border:1.5px solid #2563eb;
    color:#2563eb;
    border-radius:22px;
    padding:6px 18px;
}

.btn-detail:hover{
    background:#2563eb;
    color:white;
}

/* CALENDAR */
.calendar-card{
    background:#0b0f19;
    color:white;
    border-radius:16px;
    padding:18px;
    box-shadow:0 10px 30px rgba(0,0,0,.4);
}

.calendar-grid{
    display:grid;
    grid-template-columns: repeat(7,1fr);
    gap:8px;
    margin-top:12px;
}

.day{
    width:100%;
    padding-top:100%;
    border-radius:8px;
    background:#e5e7eb;
}

.day.active{
    background:#2563eb;
}

.day.mid{
    background:#93c5fd;
}

/* CONTINUE CARD */
.continue-card{
    background:linear-gradient(135deg,#0b0f19,#1f2937);
    color:white;
    border-radius:16px;
    padding:18px;
    margin-top:20px;
    box-shadow:0 10px 30px rgba(0,0,0,.3);
}

</style>

@endsection


