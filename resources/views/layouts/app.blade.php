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

        .course-item h6 {
            font-size: 16px;
        }

        .course-item p , span, div{
            font-size: 13px;
        }

        
    </style>
</head>

<body>

    @include('components.navbar')

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


</body>

</html>
