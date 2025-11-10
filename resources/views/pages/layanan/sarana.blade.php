@extends('layouts.frontend')

@section('title', 'Sarana & Prasarana')
@section('meta_description', 'Sarana dan prasarana Lab Network & Cyber Security Polinema')

@section('content')
<!-- Breadcrumb -->
<section class="py-3 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}" class="text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item">Layanan</li>
                <li class="breadcrumb-item active" aria-current="page">Sarana & Prasarana</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Sarana Prasarana Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 class="display-6 fw-bold mb-3">Sarana & Prasarana</h1>
            <p class="text-muted">Fasilitas dan peralatan laboratorium</p>
        </div>
        
        <!-- Hardware & Infrastructure -->
        <div class="row mb-5">
            <div class="col-12" data-aos="fade-up">
                <h3 class="fw-bold mb-4"><i class="bi bi-hdd-rack me-2 text-primary"></i>Perangkat Hardware</h3>
            </div>
            
            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            <div class="icon-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center me-3" 
                                 style="width: 60px; height: 60px; border-radius: 50%;">
                                <i class="bi bi-pc-display text-primary" style="font-size: 1.8rem;"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold">Komputer Lab</h5>
                                <span class="badge bg-success">40 Unit</span>
                            </div>
                        </div>
                        <ul class="list-unstyled text-muted small">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Intel Core i7 Gen 10</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>RAM 16GB DDR4</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>SSD 512GB NVMe</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i>GPU Dedicated 4GB</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            <div class="icon-circle bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center me-3" 
                                 style="width: 60px; height: 60px; border-radius: 50%;">
                                <i class="bi bi-hdd-rack text-success" style="font-size: 1.8rem;"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold">Server Rack</h5>
                                <span class="badge bg-success">5 Unit</span>
                            </div>
                        </div>
                        <ul class="list-unstyled text-muted small">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Dell PowerEdge R740</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Xeon Gold Processor</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>RAM 128GB ECC</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i>Storage 4TB RAID 10</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            <div class="icon-circle bg-warning bg-opacity-10 d-inline-flex align-items-center justify-content-center me-3" 
                                 style="width: 60px; height: 60px; border-radius: 50%;">
                                <i class="bi bi-router text-warning" style="font-size: 1.8rem;"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold">Network Device</h5>
                                <span class="badge bg-success">15 Unit</span>
                            </div>
                        </div>
                        <ul class="list-unstyled text-muted small">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Cisco Catalyst Switch</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Mikrotik Router</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Firewall Appliance</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i>Wireless Access Point</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Software & Tools -->
        <div class="row mb-5">
            <div class="col-12" data-aos="fade-up">
                <h3 class="fw-bold mb-4"><i class="bi bi-laptop me-2 text-success"></i>Perangkat Software & Tools</h3>
            </div>
            
            <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3"><i class="bi bi-shield-lock me-2 text-danger"></i>Security Tools</h5>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span class="small">Kali Linux</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span class="small">Metasploit</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span class="small">Burp Suite</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span class="small">Wireshark</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span class="small">Nmap</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span class="small">OWASP ZAP</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3"><i class="bi bi-cloud me-2 text-primary"></i>Development & VM</h5>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span class="small">VMware ESXi</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span class="small">Docker</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span class="small">VirtualBox</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span class="small">Git/GitHub</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span class="small">VS Code</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <span class="small">Ansible</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Fasilitas Pendukung -->
        <div class="row">
            <div class="col-12" data-aos="fade-up">
                <h3 class="fw-bold mb-4"><i class="bi bi-gear me-2 text-warning"></i>Fasilitas Pendukung</h3>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="text-center p-4 bg-light rounded">
                    <i class="bi bi-wifi text-primary mb-3" style="font-size: 3rem;"></i>
                    <h6 class="fw-bold">Internet Fiber 1 Gbps</h6>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="text-center p-4 bg-light rounded">
                    <i class="bi bi-tv text-success mb-3" style="font-size: 3rem;"></i>
                    <h6 class="fw-bold">Proyektor HD</h6>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="text-center p-4 bg-light rounded">
                    <i class="bi bi-snow text-info mb-3" style="font-size: 3rem;"></i>
                    <h6 class="fw-bold">AC Central</h6>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="text-center p-4 bg-light rounded">
                    <i class="bi bi-lightning-charge text-warning mb-3" style="font-size: 3rem;"></i>
                    <h6 class="fw-bold">UPS & Genset</h6>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
