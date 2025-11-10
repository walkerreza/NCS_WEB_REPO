<nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top shadow-sm">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('beranda') }}">
            <img src="{{ asset('images/logo-ncs.png') }}" alt="Lab NCS" height="40" class="me-2">
            <span class="fw-bold text-warning">Lab NCS</span>
        </a>
        
        <!-- Toggler untuk Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Menu Items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Beranda -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}" href="{{ route('beranda') }}">
                        Beranda
                    </a>
                </li>
                
                <!-- Profil Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('profil.*') ? 'active' : '' }}" 
                       href="#" 
                       id="profilDropdown" 
                       role="button" 
                       data-bs-toggle="dropdown" 
                       aria-expanded="false">
                        Profil
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profilDropdown">
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('profil.visi-misi') ? 'active' : '' }}" 
                               href="{{ route('profil.visi-misi') }}">
                                <i class="bi bi-eye me-2"></i>Visi & Misi
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('profil.logo') ? 'active' : '' }}" 
                               href="{{ route('profil.logo') }}">
                                <i class="bi bi-badge-vr me-2"></i>Logo
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('profil.struktur') ? 'active' : '' }}" 
                               href="{{ route('profil.struktur') }}">
                                <i class="bi bi-diagram-3 me-2"></i>Struktur Organisasi
                            </a>
                        </li>
                    </ul>
                </li>
                
                <!-- Galeri -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('galeri') ? 'active' : '' }}" href="{{ route('galeri') }}">
                        Galeri
                    </a>
                </li>
                
                <!-- Arsip Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('arsip.*') ? 'active' : '' }}" 
                       href="#" 
                       id="arsipDropdown" 
                       role="button" 
                       data-bs-toggle="dropdown" 
                       aria-expanded="false">
                        Arsip
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="arsipDropdown">
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('arsip.penelitian') ? 'active' : '' }}" 
                               href="{{ route('arsip.penelitian') }}">
                                <i class="bi bi-journal-text me-2"></i>Penelitian
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('arsip.pengabdian') ? 'active' : '' }}" 
                               href="{{ route('arsip.pengabdian') }}">
                                <i class="bi bi-people me-2"></i>Pengabdian
                            </a>
                        </li>
                    </ul>
                </li>
                
                <!-- Layanan Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('layanan.*') ? 'active' : '' }}" 
                       href="#" 
                       id="layananDropdown" 
                       role="button" 
                       data-bs-toggle="dropdown" 
                       aria-expanded="false">
                        Layanan
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="layananDropdown">
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('layanan.sarana') ? 'active' : '' }}" 
                               href="{{ route('layanan.sarana') }}">
                                <i class="bi bi-gear me-2"></i>Sarana & Prasarana
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('layanan.konsultatif') ? 'active' : '' }}" 
                               href="{{ route('layanan.konsultatif') }}">
                                <i class="bi bi-chat-dots me-2"></i>Konsultatif
                            </a>
                        </li>
                    </ul>
                </li>
                
                <!-- Link -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('link') ? 'active' : '' }}" href="{{ route('link') }}">
                        Link
                    </a>
                </li>
                
                <!-- Toggle Dark Mode -->
                <li class="nav-item">
                    <button id="theme-toggle" class="nav-link btn btn-link" type="button" title="Toggle Dark Mode">
                        <i id="theme-toggle-dark-icon" class="bi bi-moon-stars-fill d-none"></i>
                        <i id="theme-toggle-light-icon" class="bi bi-sun-fill d-none"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
