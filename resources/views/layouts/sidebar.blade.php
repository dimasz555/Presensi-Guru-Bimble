<!-- sidebar -->

<div class="container">
    <header id="header">
        <div class="d-flex flex-column">

            <div class="image">
                <img src="{{ asset('assets/img/logo_bimbel.png') }}" alt="" class="img-fluid">
            </div>

            <nav id="navbar" class="nav-menu navbar">
                <ul>
                    <li><a href="{{ route('presensi') }}" class="nav-link scrollto {{ request()->is('presensi*') ? 'active-page' : '' }}"><i class="bi bi-clock-history" style="color:white;"></i>
                            <span>Presensi</span>
                        </a></li>
                    <li><a href="{{ route('profil') }}" class="nav-link scrollto {{ request()->is('profil*') ? 'active-page' : '' }}"><i class="bx bx-user" style="color:white;"></i>
                            <span>Profil</span>
                        </a></li>
                </ul>
                <div class="logout-button mt-auto">
                    <a href="{{ route('logout') }}" class="nav-link scrollto" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bx bx-log-out" style="color:white;"></i> <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->
</div>
<!-- end sidebar -->