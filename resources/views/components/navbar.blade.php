 <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
     <div class="container">
         <a class="navbar-brand fw-bold text-brand" style="font-size: 30px" href="{{ route('home') }}">UM<span>Lab</span></a>

         <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navmenu">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navmenu">
             <ul class="navbar-nav ms-auto align-items-center">
                 <li class="nav-item">
                     <a class="nav-link text-nav {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                 </li>
                 <li class="nav-item ms-lg-3">
                     <a class="nav-link text-nav {{ request()->routeIs('activity.index') ? 'active' : '' }}"  href="{{ route('activity.index') }}">Activity</a>
                 </li>
                 <!-- Dropdown -->
                 @role('admin')
                 <li class="nav-item ms-lg-3 dropdown">
                     <a class="nav-link text-nav d-flex align-items-center gap-2 dropdown-toggle custom-dropdown-btn"
                         type="button" data-bs-toggle="dropdown" aria-expanded="false">
                         <span>Data Master</span>
                     </a>

                     <ul class="dropdown-menu custom-dropdown-menu">
                         <li>
                             <a class="dropdown-item" href="{{ route('users.index') }}">User</a>
                         </li>
                         <li>
                             <a class="dropdown-item" href="{{ route('levels.index') }}">Level Course</a>
                         </li>
                         <li>
                             <a class="dropdown-item" href="{{ route('courses.index') }}">Course</a>
                         </li>
                          <li>
                             <a class="dropdown-item" href="{{ route('results-quiz.index') }}">Result Quiz</a>
                         </li>
                     </ul>
                 </li>
                 @endrole

                  <li class="nav-item ms-lg-3 dropdown">
                     <a class="nav-link text-nav d-flex align-items-center gap-2 dropdown-toggle custom-dropdown-btn"
                         type="button" data-bs-toggle="dropdown" aria-expanded="false">
                         <span><i class="bi bi-person-circle text-logo fs-4"></i></span>
                     </a>

                     <ul class="dropdown-menu custom-dropdown-menu">
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


 <style>
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
 </style>
