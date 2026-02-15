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
