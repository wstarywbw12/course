<style>
    * {
        font-family: 'Poppins', sans-serif;
    }

    body {
        padding-top: 70px;
        /* agar konten tidak ketutupan navbar fixed */
        scroll-behavior: smooth;
    }


    /* NAVBAR FIX */
    .navbar {
        transition: all 0.3s ease;
        background-color: #ffffff !important;
        /* selalu ada background */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        padding: 0.8rem 0;
    }

    .navbar .navbar-brand {
        font-weight: 700;
        color: #1e4ed8 !important;
        font-size: 1.6rem;
    }

    .navbar .nav-link {
        color: #333 !important;
        font-weight: 500;
        margin: 0 8px;
    }

    .navbar .nav-link:hover {
        color: #1e4ed8 !important;
    }

    .navbar-toggler {
        border: none;
    }

    .navbar-toggler:focus {
        box-shadow: none;
    }

    .btn-primary,
    .btn-outline-primary {
        border-radius: 40px;
        padding: 8px 24px;
        font-weight: 500;
    }

    .btn-primary {
        background-color: #1e4ed8;
        border: none;
    }

    .btn-outline-primary {
        border: 2px solid #1e4ed8;
        color: #1e4ed8;
    }

    .btn-outline-light {
        border-radius: 40px;
        padding: 8px 24px;
        font-weight: 500;
        border-width: 2px;
    }

    .hero-section {
        background: linear-gradient(180deg, #081b3a 0%, #1e4ed8 45%, #e9edf5 100%);
        min-height: 600px;
        color: white;
        padding: 100px 0;
    }

    .hero-headline {
        font-size: 2.8rem;
        font-weight: 700;
        line-height: 1.2;
    }

    @media (max-width: 768px) {
        .hero-headline {
            font-size: 2rem;
        }
    }

    .section-title {
        font-weight: 700;
        color: #1e2a41;
        margin-bottom: 1rem;
        position: relative;
        display: inline-block;
    }

    .section-title:after {
        content: '';
        display: block;
        width: 70px;
        height: 4px;
        background: #1e4ed8;
        margin-top: 8px;
        border-radius: 4px;
    }

    .icon-box {
        background: #f0f7ff;
        padding: 30px 20px;
        border-radius: 24px;
        transition: transform 0.2s ease;
        height: 100%;
    }

    .icon-box:hover {
        transform: translateY(-6px);
    }

    .icon-box i {
        font-size: 2.5rem;
        color: #1e4ed8;
        margin-bottom: 20px;
    }

    /* Section Background */
    .materi-section {
        background-color: white;
        padding: 70px 0;
    }

    /* Left Side */
    .materi-title {
        font-size: 42px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .materi-desc {
        font-size: 18px;
        opacity: 0.85;
        line-height: 1.7;
    }

    /* Timeline */
    .timeline {
        position: relative;
        padding-left: 40px;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 14px;
        top: 0;
        width: 4px;
        height: 100%;
        background-color: #1e4ed8;
        border-radius: 4px;
    }

    /* Timeline Item */
    .timeline-item {
        position: relative;
        margin-bottom: 30px;
        font-size: 18px;
        font-weight: 600;
        padding-left: 20px;
    }

    /* Circle */
    .timeline-item::before {
        content: "✓";
        position: absolute;
        left: -40px;
        top: 0;
        width: 28px;
        height: 28px;
        background-color: #1e4ed8;
        color: white;
        font-weight: bold;
        font-size: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }

    .fitur-list i {
        color: #1e4ed8;
        font-size: 1.4rem;
        margin-right: 12px;
    }

    .testimoni-card {
        background: white;
        border-radius: 30px;
        padding: 30px 25px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.03);
        border: 1px solid #eef2f6;
        height: 100%;
    }

    .testimoni-card img {
        width: 65px;
        height: 65px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 18px;
        border: 3px solid #1e4ed8;
    }

    .cta-biru {
        background-color: #1e4ed8;
        border-radius: 40px;
    }

    footer {
        background-color: #111c2d;
        color: #b0c4de;
    }

    footer a {
        color: #b0c4de;
        text-decoration: none;
    }

    footer a:hover {
        color: white;
    }

    .fade-in {
        animation: fadeInUp 0.7s ease both;
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(12px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
