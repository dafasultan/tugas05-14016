<nav class="base-nav font-passion-one position-relative" id="base-nav">
    <div id="base-nav-bg"></div>
    <ul class="nav container-fluid d-flex justify-content-around">
        <li class="nav-item">
            <div class="nav-icon"><img src="{{ asset('images/Beranda.png') }}" alt=""></div>
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/" {{ request()->is('/') ? 'aria-current="page"' : '' }}>
                Beranda
            </a>
        </li>
        <!-- <li class="nav-item">
            <div class="nav-icon"><img src="{{ asset('images/pills.png') }}" alt=""></div>
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('obat.index') }}" {{ request()->is('/') ? 'aria-current="page"' : '' }}>Obat</a>
        </li>
        <li class="nav-item">
            <div class="nav-icon"><img src="{{ asset('images/user-icon.png') }}" alt=""></div>
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('pasiens.index') }}" {{ request()->is('/') ? 'aria-current="page"' : '' }}>Pasien</a>
        </li> -->
        <li class="nav-item">
            <div class="nav-icon"><img src="{{ asset('images/user-icon.png') }}" alt=""></div>
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('dokter') }}" {{ request()->is('/') ? 'aria-current="page"' : '' }}>Dashboard Dokter</a>
        </li>
        <li class="nav-item">
            <div class="nav-icon"><img src="{{ asset('images/user-icon.png') }}" alt=""></div>
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('pasien') }}" {{ request()->is('/') ? 'aria-current="page"' : '' }}>Dashboard Pasien</a>
        </li>
    </ul>
</nav>