@extends('layouts.frontend')

@section('title', 'Link Terkait')
@section('meta_description', 'Link dan sumber daya terkait Lab Network & Cyber Security Polinema')

@section('content')
<!-- Breadcrumb -->
<section class="py-4 bg-gray-50 dark:bg-slate-800">
    <div class="container mx-auto px-4">
        <nav aria-label="breadcrumb">
            <ol class="flex items-center space-x-2 text-sm">
                <li><a href="{{ route('beranda') }}" class="text-blue-600 hover:text-blue-800 no-underline">Beranda</a></li>
                <li class="text-gray-500">/</li>
                <li class="text-gray-700 dark:text-gray-300" aria-current="page">Link</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Link Section -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Link Terkait</h1>
            <p class="text-gray-600 dark:text-gray-400">Tautan berguna dan sumber daya eksternal</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Institusi -->
            <div class="col-span-full" data-aos="fade-up">
                <h4 class="text-2xl font-bold mb-6 flex items-center">
                    <i class="bi bi-building mr-3 text-blue-600"></i>Institusi
                </h4>
            </div>
            
            <div data-aos="fade-up" data-aos-delay="100">
                <a href="https://polinema.ac.id" target="_blank" rel="noopener" class="no-underline block">
                    <div class="card border-0 shadow-sm hover-lift h-full bg-white dark:bg-slate-700 rounded-xl">
                        <div class="p-6">
                            <div class="flex items-start">
                                <div class="icon-circle bg-blue-100 dark:bg-blue-500/10 inline-flex items-center justify-center mr-4 flex-shrink-0" 
                                     style="width: 50px; height: 50px; border-radius: 50%;">
                                    <i class="bi bi-building text-blue-600 dark:text-blue-400 text-2xl"></i>
                                </div>
                                <div class="flex-grow">
                                    <h5 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">Politeknik Negeri Malang</h5>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-0">Website resmi Polinema</p>
                                </div>
                                <i class="bi bi-box-arrow-up-right text-gray-500 ml-2"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div data-aos="fade-up" data-aos-delay="150">
                <a href="https://jti.polinema.ac.id" target="_blank" rel="noopener" class="no-underline block">
                    <div class="card border-0 shadow-sm hover-lift h-full bg-white dark:bg-slate-700 rounded-xl">
                        <div class="p-6">
                            <div class="flex items-start">
                                <div class="icon-circle bg-green-100 dark:bg-green-500/10 inline-flex items-center justify-content-center mr-4 flex-shrink-0" 
                                     style="width: 50px; height: 50px; border-radius: 50%;">
                                    <i class="bi bi-laptop text-green-600 dark:text-green-400 text-2xl"></i>
                                </div>
                                <div class="flex-grow">
                                    <h5 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">Jurusan Teknologi Informasi</h5>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-0">JTI Polinema</p>
                                </div>
                                <i class="bi bi-box-arrow-up-right text-gray-500 ml-2"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <!-- Penelitian & Publikasi -->
            <div class="col-span-full mt-8" data-aos="fade-up">
                <h4 class="text-2xl font-bold mb-6 flex items-center">
                    <i class="bi bi-journal-text mr-3 text-green-600"></i>Penelitian & Publikasi
                </h4>
            </div>
            
            <div data-aos="fade-up" data-aos-delay="100">
                <a href="https://sinta.kemdikbud.go.id" target="_blank" rel="noopener" class="no-underline block">
                    <div class="card border-0 shadow-sm hover-lift h-full bg-white dark:bg-slate-700 rounded-xl">
                        <div class="p-6">
                            <div class="flex items-start">
                                <div class="icon-circle bg-yellow-100 dark:bg-yellow-500/10 inline-flex items-center justify-content-center mr-4 flex-shrink-0" 
                                     style="width: 50px; height: 50px; border-radius: 50%;">
                                    <i class="bi bi-award text-yellow-600 dark:text-yellow-400 text-2xl"></i>
                                </div>
                                <div class="flex-grow">
                                    <h5 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">SINTA</h5>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-0">Science and Technology Index</p>
                                </div>
                                <i class="bi bi-box-arrow-up-right text-gray-500 ml-2"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div data-aos="fade-up" data-aos-delay="150">
                <a href="https://scholar.google.com" target="_blank" rel="noopener" class="no-underline block">
                    <div class="card border-0 shadow-sm hover-lift h-full bg-white dark:bg-slate-700 rounded-xl">
                        <div class="p-6">
                            <div class="flex items-start">
                                <div class="icon-circle bg-red-100 dark:bg-red-500/10 inline-flex items-center justify-content-center mr-4 flex-shrink-0" 
                                     style="width: 50px; height: 50px; border-radius: 50%;">
                                    <i class="bi bi-mortarboard text-red-600 dark:text-red-400 text-2xl"></i>
                                </div>
                                <div class="flex-grow">
                                    <h5 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">Google Scholar</h5>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-0">Publikasi ilmiah</p>
                                </div>
                                <i class="bi bi-box-arrow-up-right text-gray-500 ml-2"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div data-aos="fade-up" data-aos-delay="200">
                <a href="https://pddikti.kemdikbud.go.id" target="_blank" rel="noopener" class="no-underline block">
                    <div class="card border-0 shadow-sm hover-lift h-full bg-white dark:bg-slate-700 rounded-xl">
                        <div class="p-6">
                            <div class="flex items-start">
                                <div class="icon-circle bg-cyan-100 dark:bg-cyan-500/10 inline-flex items-center justify-content-center mr-4 flex-shrink-0" 
                                     style="width: 50px; height: 50px; border-radius: 50%;">
                                    <i class="bi bi-book text-cyan-600 dark:text-cyan-400 text-2xl"></i>
                                </div>
                                <div class="flex-grow">
                                    <h5 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">PDDikti</h5>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-0">Pangkalan Data Pendidikan Tinggi</p>
                                </div>
                                <i class="bi bi-box-arrow-up-right text-gray-500 ml-2"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <!-- Cyber Security Resources -->
            <div class="col-span-full mt-8" data-aos="fade-up">
                <h4 class="text-2xl font-bold mb-6 flex items-center">
                    <i class="bi bi-shield-lock mr-3 text-red-600"></i>Cyber Security Resources
                </h4>
            </div>
            
            <div data-aos="fade-up" data-aos-delay="100">
                <a href="https://cybersecurity.its.ac.id" target="_blank" rel="noopener" class="no-underline block">
                    <div class="card border-0 shadow-sm hover-lift h-full bg-white dark:bg-slate-700 rounded-xl">
                        <div class="p-6">
                            <div class="flex items-start">
                                <div class="icon-circle bg-blue-100 dark:bg-blue-500/10 inline-flex items-center justify-content-center mr-4 flex-shrink-0" 
                                     style="width: 50px; height: 50px; border-radius: 50%;">
                                    <i class="bi bi-shield-fill-check text-blue-600 dark:text-blue-400 text-2xl"></i>
                                </div>
                                <div class="flex-grow">
                                    <h5 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">ITS Cyber Security</h5>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-0">Research Center ITS</p>
                                </div>
                                <i class="bi bi-box-arrow-up-right text-gray-500 ml-2"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div data-aos="fade-up" data-aos-delay="150">
                <a href="https://bssn.go.id" target="_blank" rel="noopener" class="no-underline block">
                    <div class="card border-0 shadow-sm hover-lift h-full bg-white dark:bg-slate-700 rounded-xl">
                        <div class="p-6">
                            <div class="flex items-start">
                                <div class="icon-circle bg-red-100 dark:bg-red-500/10 inline-flex items-center justify-content-center mr-4 flex-shrink-0" 
                                     style="width: 50px; height: 50px; border-radius: 50%;">
                                    <i class="bi bi-flag text-red-600 dark:text-red-400 text-2xl"></i>
                                </div>
                                <div class="flex-grow">
                                    <h5 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">BSSN</h5>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-0">Badan Siber dan Sandi Negara</p>
                                </div>
                                <i class="bi bi-box-arrow-up-right text-gray-500 ml-2"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div data-aos="fade-up" data-aos-delay="200">
                <a href="https://www.csirt.go.id" target="_blank" rel="noopener" class="no-underline block">
                    <div class="card border-0 shadow-sm hover-lift h-full bg-white dark:bg-slate-700 rounded-xl">
                        <div class="p-6">
                            <div class="flex items-start">
                                <div class="icon-circle bg-yellow-100 dark:bg-yellow-500/10 inline-flex items-center justify-content-center mr-4 flex-shrink-0" 
                                     style="width: 50px; height: 50px; border-radius: 50%;">
                                    <i class="bi bi-exclamation-triangle text-yellow-600 dark:text-yellow-400 text-2xl"></i>
                                </div>
                                <div class="flex-grow">
                                    <h5 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">ID-CSIRT</h5>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-0">Indonesia Computer Security Incident Response Team</p>
                                </div>
                                <i class="bi bi-box-arrow-up-right text-gray-500 ml-2"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
