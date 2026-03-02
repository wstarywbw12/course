<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">
        <a class="navbar-brand fw-bold text-brand" style="font-size: 30px"
            href="{{ route('home') }}">UM<span>Lab</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu"
            aria-controls="navmenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
            <!-- penting: w-100 + text-start -->
            <ul class="navbar-nav ms-lg-auto w-100 text-start">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">Dashboard</a>
                </li>

                <li class="nav-item ms-lg-3">
                    <a class="nav-link {{ request()->routeIs('activity.index') ? 'active' : '' }}"
                        href="{{ route('activity.index') }}">Activity</a>
                </li>

                @role('admin')
                    <li class="nav-item ms-lg-3 dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                            Data Master
                        </a>

                        <!-- dropdown rata kiri -->
                        <ul class="dropdown-menu dropdown-menu-start">
                            <li><a class="dropdown-item" href="{{ route('users.index') }}">User</a></li>
                            <li><a class="dropdown-item" href="{{ route('levels.index') }}">Level Course</a></li>
                            <li><a class="dropdown-item" href="{{ route('courses.index') }}">Course</a></li>
                            <li><a class="dropdown-item" href="{{ route('results-quiz.index') }}">Result Quiz</a></li>
                        </ul>
                    </li>

                    <li class="nav-item ms-lg-3">
                        <a class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}"
                            href="{{ route('users.index') }}">Setting</a>
                    </li>
                @endrole

                <li class="nav-item ms-lg-3 dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-4"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-start">
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item" type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
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

    /* MOBILE: teks rata kiri */
    @media (max-width: 991.98px) {
        .navbar-nav .nav-item {
            width: 100%;
        }

        .navbar-nav .nav-link {
            text-align: left;
            padding-left: 0;
        }
    }
</style>
