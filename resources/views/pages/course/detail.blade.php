@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">

            <!-- ================= LEFT CONTENT ================= -->
            @include('pages.course.kiri.index')

            <!-- ================= RIGHT SIDEBAR ================= -->
            @include('pages.course.kanan.index')
        </div>

        <!-- ================= FOOTER NAV ================= -->
        <div class="fixed-bottom mx-0 mx-md-5">
            <div class="card">
               <div class="card-body">
                 <div class="d-flex justify-content-between">
                    <button id="btnPrev" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Sebelumnya
                    </button>

                    <button id="btnNext" class="btn btn-primary">
                        Lanjut <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
               </div>
            </div>
        </div>

    </div>


    <style>
        body {
            font-family: 'Inter', sans-serif;
            /* background: #fff; */
            background: #f6f8f9;
            min-height: 100vh;
        }

        .text-logo {
            color: #1e4ed8;
        }

        .text-brand {
            color: #1e4ed8;
        }

        a.text-nav {
            color: #1e4ed8 !important;
            text-decoration: none;
        }

        .text-sub {
            color: #1e4ed8 !important;
        }

        .custom-tabs {
            background-color: #1e63ff;
            border-radius: 8px;
            padding: 6px;
            display: flex;
            gap: 6px;
            width: 100%;
        }

        .custom-tabs .nav-link {
            color: #fff;
            font-weight: 600;
            border-radius: 6px;
            padding: 8px 16px;
            text-align: center;
            width: 100%;
        }

        .custom-tabs .nav-link.active {
            background-color: #fff;
            color: #1e63ff !important;
        }

        @media (min-width: 992px) {
            .custom-tabs {
                width: fit-content;
            }

            .custom-tabs .nav-link {
                padding: 6px 48px;
                width: auto;
            }
        }





        .nav-pills-materi {
            display: flex;
            width: 100%;
            gap: 12px;
        }

        .nav-pills-materi .nav-item {
            flex: 1;
        }

        /* default = btn-outline-secondary */
        .nav-pills-materi .nav-link {
            width: 100%;
            text-align: center;
            background-color: transparent;
            color: #2b2c2d !important;
            border: 2px solid #6c757d;
            border-radius: 12px;
            transition: all .2s ease;
        }

        /* hover efek */
        .nav-pills-materi .nav-link:hover {
            background-color: #6c757d;
            color: #fff !important;
        }

        /* active = btn-primary */
        .nav-pills-materi .nav-link.active {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: #fff !important;
        }
    </style>
@endsection
