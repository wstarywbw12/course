 <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
     <div class="container">
         <a class="navbar-brand fw-bold" href="#">UM<span class="text-light">Lab</span></a>

         <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navmenu">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navmenu">
             <ul class="navbar-nav ms-auto align-items-center">
                 <li class="nav-item">
                     <a class="nav-link active" href="{{ route('dashboard') }}">Dashboard</a>
                 </li>
                 <li class="nav-item ms-lg-3">
                     <a class="nav-link" href="{{ route('activity.index') }}">Activity</a>
                 </li>
                 <li class="nav-item ms-lg-4 dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="logoutDropdown" data-bs-toggle="dropdown"
                         aria-expanded="false">
                         <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle"
                             data-key="t-logout"> <i class="bi bi-person-circle text-white fs-4"></i></span>
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="logoutDropdown">
                         <li>
                             <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                 @csrf
                                 <button class="dropdown-item" type="submit">
                                     <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                         class="align-middle" data-key="t-logout">Logout</span>
                                 </button>
                             </form>
                         </li>
                     </ul>
                 </li>
             </ul>
         </div>
     </div>
 </nav>
