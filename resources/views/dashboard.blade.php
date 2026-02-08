<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UMLab Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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
        }

        .nav-link {
            color: #dbeafe !important;
            font-weight: 500;
        }

        .nav-link.active {
            border-bottom: 2px solid white;
        }

        /* HERO */
        .hero {
            color: white;
            margin-top: 20px;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 800;
        }

        .hero small {
            opacity: .85;
        }

        /* LEVEL CARD */
        .level-box {
            background: #eef1f6;
            border-radius: 16px;
            padding: 22px;
            margin-top: 25px;
            border: 4px solid rgba(255, 255, 255, .25);
        }

        .progress {
            height: 10px;
            border-radius: 20px;
            background: #dbe2ef;
        }

        .progress-bar {
            background: #2d6cdf;
        }

        /* COURSE LIST */
        .section-title {
            color: white;
            font-weight: 700;
            margin: 30px 0 15px;
        }

        .course-item {
            background: white;
            border-radius: 14px;
            padding: 18px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
            margin-bottom: 14px;
        }

        .course-title {
            font-weight: 600;
        }

        .course-desc {
            font-size: 13px;
            color: #6b7280;
        }

        .course-meta {
            font-size: 13px;
            color: #6b7280;
        }

        .btn-start {
            border: 1.5px solid #2d6cdf;
            color: #2d6cdf;
            border-radius: 22px;
            padding: 6px 18px;
            font-size: 14px;
            font-weight: 500;
        }

        .btn-start:hover {
            background: #2d6cdf;
            color: white;
        }

        /* RIGHT CARD */
        .continue-card {
            background: linear-gradient(135deg, #0b0f19, #1f2937);
            color: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .3);
        }

        .stats-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            margin-top: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
        }

        /* RESPONSIVE */
        @media(max-width:992px) {
            .hero h1 {
                font-size: 36px;
            }
        }

        @media(max-width:768px) {
            .hero h1 {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">UM<span class="text-light">Lab</span></a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="nav-link" href="#">Activity</a>
                    </li>
                    <li class="nav-item ms-lg-4 dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="logoutDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout"> <i class="bi bi-person-circle text-white fs-4"></i></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="logoutDropdown">
                            <li>
                                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


</body>

</html>
