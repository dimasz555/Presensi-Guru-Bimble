 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

   <ul class="sidebar-nav" id="sidebar-nav">

     <li class="nav-item">
       <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
         <i class="bi bi-grid"></i>
         <span>Dashboard</span>
       </a>
     </li><!-- End Dashboard Nav -->

     <li class="nav-item">
       <a class="nav-link {{ request()->routeIs('profile.admin') ? 'active' : '' }}" href="{{ route('profile.admin') }}">
         <i class="bi bi-person"></i>
         <span>Profil</span>
       </a>
     </li><!-- End Profile Page Nav -->

     <li class="nav-item">
       <a class="nav-link {{ request()->routeIs('daftarGuru.admin') ? 'active' : '' }}" href="{{ route('daftarGuru.admin') }}">
         <i class="bi bi-check2-circle"></i>
         <span>Kelola Presensi</span>
       </a>
     </li><!-- End Manage Attendance Page Nav -->

     <li class="nav-item">
       <a class="nav-link {{ request()->routeIs('kelolaGuru.admin') ? 'active' : '' }}" href="{{ route('kelolaGuru.admin') }}">
         <i class="bi bi-people"></i>
         <span>Kelola Guru</span>
       </a>
     </li><!-- End Manage Teacher Page Nav -->

   </ul>

 </aside><!-- End Sidebar-->