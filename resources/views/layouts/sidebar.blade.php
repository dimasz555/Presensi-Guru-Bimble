<!-- sidebar -->

<div class="container">
    <header id="header">
        <div class="d-flex flex-column">

            <div class="image">
                <img src="{{ asset('assets/img/logo_bimbel.png') }}" alt="" class="img-fluid">
            </div>

            <nav id="navbar" class="nav-menu navbar">
                <ul>
                    <li><a href="{{ route('presensi') }}" class="nav-link scrollto {{ request()->is('presensi*') ? 'active-page' : '' }}"><i class="bi bi-clock-history" style="color:white;"></i> <div>Presensi</div></a></li>
                    <li><a href="{{ route('profil') }}" class="nav-link scrollto {{ request()->is('profil*') ? 'active-page' : '' }}"><i class="bx bx-user" style="color:white;"></i> <span>Profil</span></a></li>
                </ul>
            </nav><!-- .nav-menu -->
        </div>
    </header><!-- End Header -->
</div>
<!-- end sidebar -->