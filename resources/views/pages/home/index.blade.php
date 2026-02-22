<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMLAB · Belajar UML Interaktif</title>

    <!-- Bootstrap 5 CDN + Icons + Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @include('pages.home.style')
</head>

<body>

    <!-- Navbar Fixed Top -->
    <nav id="mainNavbar" class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                UM<span>Lab</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#materi">Materi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#fitur">Fitur</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimoni">Testimoni</a></li>
                    <li class="nav-item ms-lg-2"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item ms-lg-2"><a class="btn btn-primary text-white"
                            href="{{ route('register') }}">Daftar</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 fade-in">
                    <h1 class="hero-headline mb-4">Belajar UML <br>Lebih Mudah dan Interaktif</h1>
                    <p class="lead mb-4 opacity-90">Platform pembelajaran UML online untuk mahasiswa dan profesional IT.
                        Dilengkapi quiz, evaluasi, dan sertifikat.</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('login') }}"
                            class="btn btn-light btn-outline-light text-dark bg-white border-0 px-4 py-2 fw-semibold">Mulai
                            Belajar</a>
                        <a href="#materi" class="btn btn-outline-light px-4 py-2 fw-semibold">Lihat Materi</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('public/img/belajar.png') }}" alt="ilustrasi belajar"
                        class="img-fluid rounded-4 shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang UMLAB -->
    <section id="tentang" class="py-5" style="background-color: #f8fbff;">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="section-title">Apa itu UMLAB?</h2>
                <p class="text-secondary col-lg-8 mx-auto">UMLAB adalah platform pembelajaran online yang menyediakan
                    materi UML lengkap mulai dari dasar hingga lanjutan, disertai quiz interaktif dan evaluasi hasil
                    belajar.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 fade-in">
                    <div class="icon-box text-center">
                        <i class="bi bi-diagram-3"></i>
                        <h5 class="fw-bold mt-3">Materi Terstruktur</h5>
                        <p class="text-secondary">Kurikulum bertahap dari dasar hingga mahir, cocok untuk pemula.</p>
                    </div>
                </div>
                <div class="col-md-4 fade-in" style="animation-delay:0.1s">
                    <div class="icon-box text-center">
                        <i class="bi bi-patch-question"></i>
                        <h5 class="fw-bold mt-3">Quiz Interaktif</h5>
                        <p class="text-secondary">Soal latihan & kuis untuk menguji pemahaman setiap diagram.</p>
                    </div>
                </div>
                <div class="col-md-4 fade-in" style="animation-delay:0.2s">
                    <div class="icon-box text-center">
                        <i class="bi bi-patch-check"></i>
                        <h5 class="fw-bold mt-3">Sertifikat Digital</h5>
                        <p class="text-secondary">Dapatkan sertifikat setelah menyelesaikan level tertentu.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Materi Pembelajaran (Timeline Style) -->
    <section id="materi" class="materi-section">
        <div class="container">
            <div class="row align-items-start g-5">

                <!-- Kiri -->
                <div class="col-lg-5">
                    <h2 class="materi-title">Kurikulum Kelas</h2>
                    <p class="materi-desc">
                        Akses lengkap materi UML dari dasar hingga lanjutan.
                        Disusun sistematis agar mudah dipahami baik untuk mahasiswa
                        maupun profesional IT.
                    </p>
                </div>

                <!-- Kanan -->
                <div class="col-lg-7">
                    <div class="timeline">

                        <div class="timeline-item">Use Case Diagram – Interaksi aktor dengan sistem</div>
                        <div class="timeline-item">Class Diagram – Struktur kelas & relasi</div>
                        <div class="timeline-item">Activity Diagram – Alur aktivitas sistem</div>
                        <div class="timeline-item">Sequence Diagram – Interaksi antar objek</div>
                        <div class="timeline-item">State Diagram – Perubahan state objek</div>
                        <div class="timeline-item">Component Diagram – Struktur komponen sistem</div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Fitur Unggulan -->
    <section id="fitur" class="py-5 bg-light">
        <div class="container py-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <img src="{{ asset('public/img/actifity.png') }}" alt="dashboard umlab"
                        class="img-fluid rounded-4 shadow">
                </div>
                <div class="col-lg-6">
                    <h2 class="section-title">Fitur Unggulan</h2>
                    <p class="text-secondary mb-4">Semua alat untuk mendukung perjalanan belajarmu.</p>
                    <div class="fitur-list">
                        <div class="d-flex align-items-center mb-4"><i class="bi bi-pencil-square"></i> <span
                                class="fw-medium">Sistem Quiz Online & Nilai Otomatis</span></div>
                        <div class="d-flex align-items-center mb-4"><i class="bi bi-bar-chart-line"></i> <span
                                class="fw-medium">Tracking Progress Belajar</span></div>
                        <div class="d-flex align-items-center mb-4"><i class="bi bi-check-circle"></i> <span
                                class="fw-medium">Evaluasi & Nilai Otomatis</span></div>
                        <div class="d-flex align-items-center mb-4"><i class="bi bi-person-circle"></i> <span
                                class="fw-medium">Dashboard User Personal</span></div>
                        <div class="d-flex align-items-center mb-4"><i class="bi bi-phone"></i> <span
                                class="fw-medium">Responsive Design, Belajar di mana saja</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni -->
    <section id="testimoni" class="py-5">
        <div class="container py-4">
            <h2 class="section-title text-center mx-auto">Testimoni Mahasiswa</h2>
            <p class="text-center text-secondary mb-5">Apa kata mereka setelah belajar di UMLAB</p>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="testimoni-card fade-in">
                        <img src="https://placehold.co/100x100/0d6efd/white?text=A" alt="foto">
                        <h6 class="fw-bold mb-1">Andi Saputra</h6>
                        <p class="text-secondary small">Mahasiswa TI</p>
                        <p class="mt-2 fst-italic">“Materinya runtut dan kuisnya menantang. Sekarang saya lebih pede
                            bikin diagram.”</p>
                        <div class="text-warning">★★★★★</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimoni-card fade-in" style="animation-delay:0.1s">
                        <img src="https://placehold.co/100x100/0d6efd/white?text=B" alt="foto">
                        <h6 class="fw-bold mb-1">Bella Nuraini</h6>
                        <p class="text-secondary small">System Analyst</p>
                        <p class="mt-2 fst-italic">“Platform sangat membantu pekerjaan saya. Fitur tracking progress
                            sangat berguna.”</p>
                        <div class="text-warning">★★★★★</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimoni-card fade-in" style="animation-delay:0.2s">
                        <img src="https://placehold.co/100x100/0d6efd/white?text=C" alt="foto">
                        <h6 class="fw-bold mb-1">Cahyo Wicaksono</h6>
                        <p class="text-secondary small">Mahasiswa S2</p>
                        <p class="mt-2 fst-italic">“Sertifikat digital jadi nilai plus. Tampilan modern dan nyaman
                            dipakai.”</p>
                        <div class="text-warning">★★★★☆</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Biru -->
    <section class="py-5">
        <div class="container">
            <div class="cta-biru p-5 text-center text-white">
                <h2 class="fw-bold display-6">Siap Menguasai UML?</h2>
                <p class="mb-4 col-lg-6 mx-auto">Gabung sekarang dan akses semua materi, kuis, dan sertifikat.</p>
                <a href="{{ route('register') }}" class="btn btn-light text-primary fw-semibold px-5 py-3 rounded-pill">Daftar
                    Sekarang</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="pt-5 pb-4">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-5">
                    <h4 class="text-white fw-bold">UMLAB</h4>
                    <p class="small opacity-75">Platform pembelajaran UML online dengan pendekatan interaktif,
                        dilengkapi quiz dan evaluasi untuk mahasiswa dan profesional.</p>
                </div>
                <div class="col-md-2">
                    <h6 class="text-white">Link Cepat</h6>
                    <ul class="list-unstyled small">
                        <li><a href="#" class="opacity-75">Tentang</a></li>
                        <li><a href="#" class="opacity-75">Materi</a></li>
                        <li><a href="#" class="opacity-75">Fitur</a></li>
                        <li><a href="#" class="opacity-75">Blog</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h6 class="text-white">Kontak</h6>
                    <ul class="list-unstyled small">
                        <li><a href="#" class="opacity-75">support@umlab.id</a></li>
                        <li><a href="#" class="opacity-75">+62 812 3456 7890</a></li>
                        <li><a href="#" class="opacity-75">@umlab_learn</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6 class="text-white">Download Aplikasi</h6>
                    <p class="small opacity-75">Segera hadir di Play Store & App Store.</p>
                    <i class="bi bi-google-play me-3 fs-4"></i>
                    <i class="bi bi-apple fs-4"></i>
                </div>
            </div>
            <hr class="opacity-25 mt-4">
            <div class="text-center small opacity-75">© 2025 UMLAB. All rights reserved.</div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const nav = document.getElementById('mainNavbar');
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });
    </script>
</body>

</html>
