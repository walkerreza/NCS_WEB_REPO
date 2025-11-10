<footer class="footer-custom pt-5 pb-3 mt-5">
    <div class="container">
        <div class="row">
            <!-- About Lab -->
            <div class="col-md-4 mb-4">
                <h5 class="text-warning mb-3 fw-bold">Lab Network & Cyber Security</h5>
                <p class="footer-text small">
                    Laboratorium yang berfokus pada penelitian dan pengembangan di bidang 
                    keamanan jaringan dan cyber security di lingkungan Politeknik Negeri Malang.
                </p>
                <div class="mt-3">
                    <p class="mb-2 small">
                        <i class="bi bi-envelope me-2 text-warning"></i>
                        <a href="mailto:ncs@polinema.ac.id" class="footer-link text-decoration-none">ncs@polinema.ac.id</a>
                    </p>
                    <p class="mb-2 small">
                        <i class="bi bi-geo-alt me-2 text-warning"></i>
                        <span class="footer-text">Politeknik Negeri Malang, Jl. Soekarno Hatta No.9, Malang</span>
                    </p>
                    <p class="mb-0 small">
                        <i class="bi bi-telephone me-2 text-warning"></i>
                        <span class="footer-text">(0341) 404424</span>
                    </p>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="col-md-2 mb-4">
                <h6 class="text-warning mb-3 fw-bold">Quick Links</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ route('beranda') }}" class="footer-link text-decoration-none small">
                            <i class="bi bi-chevron-right small me-1"></i>Beranda
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('profil.visi-misi') }}" class="footer-link text-decoration-none small">
                            <i class="bi bi-chevron-right small me-1"></i>Profil
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('galeri') }}" class="footer-link text-decoration-none small">
                            <i class="bi bi-chevron-right small me-1"></i>Galeri
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('arsip.penelitian') }}" class="footer-link text-decoration-none small">
                            <i class="bi bi-chevron-right small me-1"></i>Arsip
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('layanan.sarana') }}" class="footer-link text-decoration-none small">
                            <i class="bi bi-chevron-right small me-1"></i>Layanan
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- External Links -->
            <div class="col-md-3 mb-4">
                <h6 class="text-warning mb-3 fw-bold">Link Terkait</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="https://polinema.ac.id" target="_blank" rel="noopener" class="footer-link text-decoration-none small">
                            <i class="bi bi-box-arrow-up-right me-1 small"></i>Polinema
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="https://sinta.kemdikbud.go.id" target="_blank" rel="noopener" class="footer-link text-decoration-none small">
                            <i class="bi bi-box-arrow-up-right me-1 small"></i>SINTA
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="https://scholar.google.com" target="_blank" rel="noopener" class="footer-link text-decoration-none small">
                            <i class="bi bi-box-arrow-up-right me-1 small"></i>Google Scholar
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="https://pddikti.kemdikbud.go.id" target="_blank" rel="noopener" class="footer-link text-decoration-none small">
                            <i class="bi bi-box-arrow-up-right me-1 small"></i>PDDikti
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Team Credits -->
            <div class="col-md-3 mb-4">
                <h6 class="text-warning mb-3 fw-bold">Dibuat Oleh</h6>
                <p class="footer-heading mb-2 small"><strong>Kelompok PBL - TI 2H</strong></p>
                <ul class="list-unstyled footer-text small">
                    <li class="mb-1"><i class="bi bi-person-circle me-2 text-warning"></i>Anggota 1</li>
                    <li class="mb-1"><i class="bi bi-person-circle me-2 text-warning"></i>Anggota 2</li>
                    <li class="mb-1"><i class="bi bi-person-circle me-2 text-warning"></i>Anggota 3</li>
                    <li class="mb-1"><i class="bi bi-person-circle me-2 text-warning"></i>Anggota 4</li>
                </ul>
                <div class="mt-3">
                    <p class="footer-heading small mb-2">Bimbingan:</p>
                    <p class="footer-text small mb-0"><i class="bi bi-mortarboard me-2 text-warning"></i>Dosen Pembimbing</p>
                </div>
            </div>
        </div>
        
        <hr class="footer-divider my-4">
        
        <!-- Copyright -->
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="mb-0 footer-text small">
                    &copy; {{ date('Y') }} Lab Network & Cyber Security - Politeknik Negeri Malang. 
                    <span class="footer-heading">Seluruh hak cipta dilindungi.</span>
                </p>
                <p class="mb-0 footer-text small mt-2">
                    <i class="bi bi-code-slash me-1"></i>
                    Dikembangkan dengan <i class="bi bi-heart-fill text-danger mx-1"></i> menggunakan Laravel & Bootstrap
                </p>
            </div>
        </div>
    </div>
</footer>
