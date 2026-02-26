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
                    @if (auth()->check())
                        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                    @else
                        <li class="nav-item ms-lg-2"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item ms-lg-2"><a class="btn btn-primary text-white"
                                href="{{ route('register') }}">Daftar</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 fade-in">
                    <h4 class="hero-headline mb-4">{{ $beranda->hero_title ?? '' }}</h4>
                    <p class="lead mb-4 opacity-90">{{ $beranda->hero_sub_title ?? '' }}</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('login') }}"
                            class="btn btn-light btn-outline-light text-dark bg-white border-0 px-4 py-2 fw-semibold">Mulai
                            Belajar</a>
                        <a href="#materi" class="btn btn-outline-light px-4 py-2 fw-semibold">Lihat Materi</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('public/storage/' . $beranda->hero_image) }}" alt="ilustrasi belajar"
                        class="img-fluid rounded-4 shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang UMLAB -->
    <section id="tentang" class="py-5" style="background-color: #f8fbff;">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="section-title">{{ $beranda->about_title ?? '' }}</h2>
                <p class="text-secondary col-lg-8 mx-auto">{{ $beranda->about_sub_title ?? '' }}</p>
            </div>
            <div class="row g-4">
                @foreach ($home_about as $about )
                     <div class="col-md-4 fade-in">
                    <div class="icon-box text-center">
                        <i class="{{ $about->icon ?? 'bi bi-patch-check' }}"></i>
                        <h5 class="fw-bold mt-3">{{ $about->title  ?? ''}}</h5>
                        <p class="text-secondary">{{ $about->sub_title ?? '' }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Materi Pembelajaran (Timeline Style) -->
    <section id="materi" class="materi-section">
        <div class="container">
            <div class="row align-items-start g-5">

                <!-- Kiri -->
                <div class="col-lg-5">
                    <h2 class="materi-title">{{ $beranda->material_title ?? '' }}</h2>
                    <p class="materi-desc">
                        {{ $beranda->material_sub_title ?? '' }}
                    </p>
                </div>

                <!-- Kanan -->
                <div class="col-lg-7">
                    <div class="timeline">
                        @foreach ($home_materials as $materi)
                             <div class="timeline-item">{{ $materi->title }}</div>
                        @endforeach

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
                    <img src="{{ asset('public/storage/' . $beranda->feature_image) }}" alt="dashboard umlab"
                        class="img-fluid rounded-4 shadow">
                </div>
                <div class="col-lg-6">
                    <h2 class="section-title">{{ $beranda->feature_title ?? '' }}</h2>
                    <p class="text-secondary mb-4">{{ $beranda->feature_sub_title ?? '' }}</p>
                    <div class="fitur-list">
                        @foreach ($home_features as $feature)
                             <div class="d-flex align-items-center mb-4"><i class="{{ $feature->icon }}"></i> <span
                                class="fw-medium">{{ $feature->title }}</span></div>
                        @endforeach
                           
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni -->
    <section id="testimoni" class="py-5">
        <div class="container py-4">
            <h2 class="section-title text-center mx-auto">{{ $beranda->testimonial_title ?? '' }}</h2>
            <p class="text-center text-secondary mb-5">{{ $beranda->testimonial_sub_title ?? '' }}</p>
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
                <h2 class="fw-bold display-6">{{ $beranda->cta_title ?? '' }}</h2>
                <p class="mb-4 col-lg-6 mx-auto">{{ $beranda->cta_sub_title ?? '' }}</p>
                <a href="{{ route('register') }}"
                    class="btn btn-light text-primary fw-semibold px-5 py-3 rounded-pill">Daftar
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
                    <p class="small opacity-75">{{ $beranda->footer_about ?? '' }}</p>
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
                        <li><a href="#" class="opacity-75">{{ $beranda->footer_email ?? '' }}</a></li>
                        <li><a href="#" class="opacity-75">{{ $beranda->footer_hp ?? '' }}</a></li>
                        <li><a href="#" class="opacity-75"></a>{{ $beranda->footer_website ?? '' }}</a></li>
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
