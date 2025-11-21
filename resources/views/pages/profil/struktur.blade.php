@extends('layouts.frontend')

@section('title', 'Struktur Organisasi')
@section('meta_description', 'Struktur Organisasi Lab Network & Cyber Security Polinema')

@section('content')
<!-- Breadcrumb -->
<section class="py-4 bg-gray-50 dark:bg-slate-800">
    <div class="container mx-auto px-4">
        <nav aria-label="breadcrumb">
            <ol class="flex items-center space-x-2 text-sm">
                <li><a href="{{ route('beranda') }}" class="text-blue-600 hover:text-blue-800 no-underline">Beranda</a></li>
                <li class="text-gray-500">/</li>
                <li class="text-gray-600 dark:text-gray-400">Profil</li>
                <li class="text-gray-500">/</li>
                <li class="text-gray-700 dark:text-gray-300" aria-current="page">Struktur Organisasi</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Struktur Organisasi Section -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-3">Struktur Organisasi</h1>
            <p class="text-gray-600 dark:text-gray-400">Tim pengelola Lab Network & Cyber Security</p>
        </div>
        
        <!-- Diagram Struktur Organisasi -->
        <div class="flex justify-center mb-12">
            <div class="w-full lg:w-5/6" data-aos="zoom-in">
                <div class="card border-0 shadow-sm bg-white dark:bg-slate-700 rounded-xl">
                    <div class="p-6">
                        <img src="{{ asset('images/struktur-organisasi.png') }}" 
                             alt="Struktur Organisasi" 
                             class="w-full h-auto rounded-lg"
                             onerror="this.parentElement.innerHTML='<div class=\'text-center text-gray-600 dark:text-gray-400 py-16\'><i class=\'bi bi-diagram-3 mb-4\' style=\'font-size: 4rem;\'></i><p class=\'text-lg mb-2\'>Diagram struktur organisasi belum tersedia</p><p class=\'text-sm\'>Upload file struktur-organisasi.png ke folder public/images/</p></div>'">
                        <div class="text-center mt-4">
                            <a href="{{ asset('images/struktur-organisasi.png') }}" 
                               download 
                               class="btn-primary inline-flex items-center px-6 py-3 rounded-lg">
                                <i class="bi bi-download mr-2"></i>Download Struktur
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Team Members Cards -->
        <div class="mt-8">
            <div data-aos="fade-up">
                <h3 class="text-2xl font-bold text-center mb-8">Tim Pengelola</h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Kepala Laboratorium -->
                <div data-aos="fade-up" data-aos-delay="100">
                    <div class="card text-center border-0 shadow-sm h-full bg-white dark:bg-slate-700 rounded-xl">
                        <div class="p-6">
                            <div class="mb-4">
                                <div class="w-32 h-32 rounded-full bg-gradient-to-br from-blue-600 to-blue-800 text-white flex items-center justify-center mx-auto text-5xl">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                            <h5 class="text-xl font-bold mb-1">Dr. Nama Dosen, M.T.</h5>
                            <p class="text-blue-600 dark:text-blue-400 text-sm font-semibold mb-2">Kepala Laboratorium</p>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">NIP: 123456789</p>
                            <div class="flex justify-center gap-3 mt-4">
                                <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-blue-600"><i class="bi bi-envelope"></i></a>
                                <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-blue-600"><i class="bi bi-linkedin"></i></a>
                                <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-blue-600"><i class="bi bi-globe"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Koordinator Penelitian -->
                <div data-aos="fade-up" data-aos-delay="200">
                    <div class="card text-center border-0 shadow-sm h-full bg-white dark:bg-slate-700 rounded-xl">
                        <div class="p-6">
                            <div class="mb-4">
                                <div class="w-32 h-32 rounded-full bg-gradient-to-br from-gray-600 to-gray-800 text-white flex items-center justify-center mx-auto text-5xl">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                            <h5 class="text-xl font-bold mb-1">Nama Dosen, S.T., M.T.</h5>
                            <p class="text-green-600 dark:text-green-400 text-sm font-semibold mb-2">Koordinator Penelitian</p>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">NIP: 123456789</p>
                            <div class="flex justify-center gap-3 mt-4">
                                <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-green-600"><i class="bi bi-envelope"></i></a>
                                <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-green-600"><i class="bi bi-linkedin"></i></a>
                                <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-green-600"><i class="bi bi-globe"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Koordinator Pengabdian -->
                <div data-aos="fade-up" data-aos-delay="300">
                    <div class="card text-center border-0 shadow-sm h-full bg-white dark:bg-slate-700 rounded-xl">
                        <div class="p-6">
                            <div class="mb-4">
                                <div class="w-32 h-32 rounded-full bg-gradient-to-br from-yellow-500 to-orange-500 text-white flex items-center justify-center mx-auto text-5xl">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                            <h5 class="text-xl font-bold mb-1">Nama Dosen, S.Kom., M.Kom.</h5>
                            <p class="text-yellow-600 dark:text-yellow-400 text-sm font-semibold mb-2">Koordinator Pengabdian</p>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">NIP: 123456789</p>
                            <div class="flex justify-center gap-3 mt-4">
                                <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-yellow-600"><i class="bi bi-envelope"></i></a>
                                <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-yellow-600"><i class="bi bi-linkedin"></i></a>
                                <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-yellow-600"><i class="bi bi-globe"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Laboran -->
                <div data-aos="fade-up" data-aos-delay="400">
                    <div class="card text-center border-0 shadow-sm h-full bg-white dark:bg-slate-700 rounded-xl">
                        <div class="p-6">
                            <div class="mb-4">
                                <div class="w-32 h-32 rounded-full bg-red-600 text-white flex items-center justify-center mx-auto text-5xl">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                            <h5 class="text-xl font-bold mb-1">Nama Laboran, A.Md.</h5>
                            <p class="text-red-600 dark:text-red-400 text-sm font-semibold mb-2">Laboran</p>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">NIP: 123456789</p>
                            <div class="flex justify-center gap-3 mt-4">
                                <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-red-600"><i class="bi bi-envelope"></i></a>
                                <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-red-600"><i class="bi bi-linkedin"></i></a>
                                <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-red-600"><i class="bi bi-globe"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
