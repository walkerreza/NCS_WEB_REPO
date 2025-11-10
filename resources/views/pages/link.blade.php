@extends('layouts.frontend')

@section('title', 'Link Terkait')
@section('meta_description', 'Link dan sumber daya terkait Lab Network & Cyber Security Polinema')

@section('content')
<!-- Breadcrumb -->
<section class="py-3 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}" class="text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Link</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Link Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 class="display-6 fw-bold mb-3">Link Terkait</h1>
            <p class="text-muted">Tautan berguna dan sumber daya eksternal</p>
        </div>
        
        <div class="row g-4">
            <!-- Institusi -->
            <div class="col-12" data-aos="fade-up">
                <h4 class="fw-bold mb-4">
                    <i class="bi bi-building me-2 text-primary"></i>Institusi
                </h4>
            </div>
            
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <a href="https://polinema.ac.id" target="_blank" rel="noopener" class="text-decoration-none">
                    <div class="card border-0 shadow-sm hover-lift h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start">
                                <div class="icon-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center me-3" 
                                     style="width: 50px; height: 50px; border-radius: 50%;">
                                    <i class="bi bi-building text-primary" style="font-size: 1.5rem;"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fw-bold mb-2">Politeknik Negeri Malang</h5>
                                    <p class="text-muted small mb-0">Website resmi Polinema</p>
                                </div>
                                <i class="bi bi-box-arrow-up-right text-muted"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="150">
                <a href="https://jti.polinema.ac.id" target="_blank" rel="noopener" class="text-decoration-none">
                    <div class="card border-0 shadow-sm hover-lift h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start">
                                <div class="icon-circle bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center me-3" 
                                     style="width: 50px; height: 50px; border-radius: 50%;">
                                    <i class="bi bi-laptop text-success" style="font-size: 1.5rem;"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fw-bold mb-2">Jurusan Teknologi Informasi</h5>
                                    <p class="text-muted small mb-0">JTI Polinema</p>
                                </div>
                                <i class="bi bi-box-arrow-up-right text-muted"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <!-- Penelitian & Publikasi -->
            <div class="col-12 mt-5" data-aos="fade-up">
                <h4 class="fw-bold mb-4">
                    <i class="bi bi-journal-text me-2 text-success"></i>Penelitian & Publikasi
                </h4>
            </div>
            
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <a href="https://sinta.kemdikbud.go.id" target="_blank" rel="noopener" class="text-decoration-none">
                    <div class="card border-0 shadow-sm hover-lift h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start">
                                <div class="icon-circle bg-warning bg-opacity-10 d-inline-flex align-items-center justify-content-center me-3" 
                                     style="width: 50px; height: 50px; border-radius: 50%;">
                                    <i class="bi bi-award text-warning" style="font-size: 1.5rem;"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fw-bold mb-2">SINTA</h5>
                                    <p class="text-muted small mb-0">Science and Technology Index</p>
                                </div>
                                <i class="bi bi-box-arrow-up-right text-muted"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="150">
                <a href="https://scholar.google.com" target="_blank" rel="noopener" class="text-decoration-none">
                    <div class="card border-0 shadow-sm hover-lift h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start">
                                <div class="icon-circle bg-danger bg-opacity-10 d-inline-flex align-items-center justify-content-center me-3" 
                                     style="width: 50px; height: 50px; border-radius: 50%;">
                                    <i class="bi bi-mortarboard text-danger" style="font-size: 1.5rem;"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fw-bold mb-2">Google Scholar</h5>
                                    <p class="text-muted small mb-0">Publikasi ilmiah</p>
                                </div>
                                <i class="bi bi-box-arrow-up-right text-muted"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <a href="https://pddikti.kemdikbud.go.id" target="_blank" rel="noopener" class="text-decoration-none">
                    <div class="card border-0 shadow-sm hover-lift h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start">
                                <div class="icon-circle bg-info bg-opacity-10 d-inline-flex align-items-center justify-content-center me-3" 
                                     style="width: 50px; height: 50px; border-radius: 50%;">
                                    <i class="bi bi-book text-info" style="font-size: 1.5rem;"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fw-bold mb-2">PDDikti</h5>
                                    <p class="text-muted small mb-0">Pangkalan Data Pendidikan Tinggi</p>
                                </div>
                                <i class="bi bi-box-arrow-up-right text-muted"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <!-- Cyber Security Resources -->
            <div class="col-12 mt-5" data-aos="fade-up">
                <h4 class="fw-bold mb-4">
                    <i class="bi bi-shield-lock me-2 text-danger"></i>Cyber Security Resources
                </h4>
            </div>
            
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <a href="https://cybersecurity.its.ac.id" target="_blank" rel="noopener" class="text-decoration-none">
                    <div class="card border-0 shadow-sm hover-lift h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start">
                                <div class="icon-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center me-3" 
                                     style="width: 50px; height: 50px; border-radius: 50%;">
                                    <i class="bi bi-shield-fill-check text-primary" style="font-size: 1.5rem;"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fw-bold mb-2">ITS Cyber Security</h5>
                                    <p class="text-muted small mb-0">Research Center ITS</p>
                                </div>
                                <i class="bi bi-box-arrow-up-right text-muted"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="150">
                <a href="https://bssn.go.id" target="_blank" rel="noopener" class="text-decoration-none">
                    <div class="card border-0 shadow-sm hover-lift h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start">
                                <div class="icon-circle bg-danger bg-opacity-10 d-inline-flex align-items-center justify-content-center me-3" 
                                     style="width: 50px; height: 50px; border-radius: 50%;">
                                    <i class="bi bi-flag text-danger" style="font-size: 1.5rem;"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fw-bold mb-2">BSSN</h5>
                                    <p class="text-muted small mb-0">Badan Siber dan Sandi Negara</p>
                                </div>
                                <i class="bi bi-box-arrow-up-right text-muted"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <a href="https://www.csirt.go.id" target="_blank" rel="noopener" class="text-decoration-none">
                    <div class="card border-0 shadow-sm hover-lift h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start">
                                <div class="icon-circle bg-warning bg-opacity-10 d-inline-flex align-items-center justify-content-center me-3" 
                                     style="width: 50px; height: 50px; border-radius: 50%;">
                                    <i class="bi bi-exclamation-triangle text-warning" style="font-size: 1.5rem;"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fw-bold mb-2">ID-CSIRT</h5>
                                    <p class="text-muted small mb-0">Indonesia Computer Security Incident Response Team</p>
                                </div>
                                <i class="bi bi-box-arrow-up-right text-muted"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
