@extends('layouts.frontend')

@section('title', 'Layanan Konsultatif')
@section('meta_description', 'Layanan konsultasi keamanan siber Lab Network & Cyber Security Polinema')

@section('content')
<!-- Breadcrumb -->
<section class="py-4 bg-gray-50 dark:bg-slate-800">
    <div class="container mx-auto px-4">
        <nav aria-label="breadcrumb">
            <ol class="flex items-center space-x-2 text-sm">
                <li><a href="{{ route('beranda') }}" class="text-blue-600 hover:text-blue-800 no-underline">Beranda</a></li>
                <li class="text-gray-500">/</li>
                <li class="text-gray-600 dark:text-gray-400">Layanan</li>
                <li class="text-gray-500">/</li>
                <li class="text-gray-700 dark:text-gray-300" aria-current="page">Konsultatif</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="py-12 bg-blue-700 dark:bg-blue-900 text-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <div data-aos="fade-right">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">Layanan Konsultatif</h1>
                <p class="text-lg md:text-xl mb-6 leading-relaxed">
                    Dapatkan solusi keamanan siber terbaik dari tim ahli kami untuk 
                    melindungi aset digital Anda.
                </p>
            </div>
            <div data-aos="fade-left">
                <div class="bg-white dark:bg-slate-700 rounded-xl shadow-lg flex items-center justify-center p-12" style="min-height: 400px;">
                    <div class="text-center text-blue-700 dark:text-blue-400">
                        <i class="bi bi-headset" style="font-size: 6rem;"></i>
                        <h4 class="text-2xl font-bold mt-4">Layanan Konsultatif</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Layanan Section -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-3">Layanan Kami</h2>
            <p class="text-gray-600 dark:text-gray-400">Berbagai layanan konsultasi untuk kebutuhan keamanan Anda</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Layanan 1 -->
            <div data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm h-full bg-white dark:bg-slate-700 rounded-xl">
                    <div class="p-6">
                        <div class="w-[70px] h-[70px] rounded-full bg-blue-100 dark:bg-blue-900/30 inline-flex items-center justify-center mb-4">
                            <i class="bi bi-shield-check text-blue-600 dark:text-blue-400" style="font-size: 2rem;"></i>
                        </div>
                        <h5 class="text-xl font-bold mb-3">Security Assessment</h5>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Evaluasi menyeluruh terhadap sistem keamanan informasi organisasi Anda 
                            untuk mengidentifikasi kerentanan dan risiko.
                        </p>
                        <ul class="space-y-2 text-gray-600 dark:text-gray-400 text-sm">
                            <li class="flex items-center"><i class="bi bi-check text-green-600 dark:text-green-400 mr-2 text-lg"></i>Vulnerability Assessment</li>
                            <li class="flex items-center"><i class="bi bi-check text-green-600 dark:text-green-400 mr-2 text-lg"></i>Risk Analysis</li>
                            <li class="flex items-center"><i class="bi bi-check text-green-600 dark:text-green-400 mr-2 text-lg"></i>Compliance Check</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Layanan 2 -->
            <div data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm h-full bg-white dark:bg-slate-700 rounded-xl">
                    <div class="p-6">
                        <div class="w-[70px] h-[70px] rounded-full bg-red-100 dark:bg-red-900/30 inline-flex items-center justify-center mb-4">
                            <i class="bi bi-bug text-red-600 dark:text-red-400" style="font-size: 2rem;"></i>
                        </div>
                        <h5 class="text-xl font-bold mb-3">Penetration Testing</h5>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Simulasi serangan siber untuk menguji keamanan sistem dan menemukan 
                            celah keamanan sebelum dieksploitasi oleh peretas.
                        </p>
                        <ul class="space-y-2 text-gray-600 dark:text-gray-400 text-sm">
                            <li class="flex items-center"><i class="bi bi-check text-green-600 dark:text-green-400 mr-2 text-lg"></i>Web Application Pentest</li>
                            <li class="flex items-center"><i class="bi bi-check text-green-600 dark:text-green-400 mr-2 text-lg"></i>Network Pentest</li>
                            <li class="flex items-center"><i class="bi bi-check text-green-600 dark:text-green-400 mr-2 text-lg"></i>Mobile App Pentest</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Layanan 3 -->
            <div data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm h-full bg-white dark:bg-slate-700 rounded-xl">
                    <div class="p-6">
                        <div class="w-[70px] h-[70px] rounded-full bg-green-100 dark:bg-green-900/30 inline-flex items-center justify-center mb-4">
                            <i class="bi bi-mortarboard text-green-600 dark:text-green-400" style="font-size: 2rem;"></i>
                        </div>
                        <h5 class="text-xl font-bold mb-3">Security Training</h5>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Pelatihan keamanan siber untuk meningkatkan awareness dan skill 
                            tim IT organisasi Anda.
                        </p>
                        <ul class="space-y-2 text-gray-600 dark:text-gray-400 text-sm">
                            <li class="flex items-center"><i class="bi bi-check text-green-600 dark:text-green-400 mr-2 text-lg"></i>Security Awareness</li>
                            <li class="flex items-center"><i class="bi bi-check text-green-600 dark:text-green-400 mr-2 text-lg"></i>Technical Training</li>
                            <li class="flex items-center"><i class="bi bi-check text-green-600 dark:text-green-400 mr-2 text-lg"></i>Incident Response</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Layanan 4 -->
            <div data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm h-full bg-white dark:bg-slate-700 rounded-xl">
                    <div class="p-6">
                        <div class="w-[70px] h-[70px] rounded-full bg-yellow-100 dark:bg-yellow-900/30 inline-flex items-center justify-center mb-4">
                            <i class="bi bi-diagram-3 text-yellow-600 dark:text-yellow-400" style="font-size: 2rem;"></i>
                        </div>
                        <h5 class="text-xl font-bold mb-3">Network Security</h5>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Konsultasi dan implementasi solusi keamanan jaringan untuk 
                            melindungi infrastruktur IT organisasi.
                        </p>
                        <ul class="space-y-2 text-gray-600 dark:text-gray-400 text-sm">
                            <li class="flex items-center"><i class="bi bi-check text-green-600 dark:text-green-400 mr-2 text-lg"></i>Firewall Configuration</li>
                            <li class="flex items-center"><i class="bi bi-check text-green-600 dark:text-green-400 mr-2 text-lg"></i>VPN Setup</li>
                            <li class="flex items-center"><i class="bi bi-check text-green-600 dark:text-green-400 mr-2 text-lg"></i>Network Monitoring</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Layanan 5 -->
            <div data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm h-full bg-white dark:bg-slate-700 rounded-xl">
                    <div class="p-6">
                        <div class="w-[70px] h-[70px] rounded-full bg-cyan-100 dark:bg-cyan-900/30 inline-flex items-center justify-center mb-4">
                            <i class="bi bi-file-earmark-lock text-cyan-600 dark:text-cyan-400" style="font-size: 2rem;"></i>
                        </div>
                        <h5 class="text-xl font-bold mb-3">Incident Response</h5>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Bantuan cepat dalam menangani insiden keamanan siber dan 
                            pemulihan sistem yang terkena serangan.
                        </p>
                        <ul class="space-y-2 text-gray-600 dark:text-gray-400 text-sm">
                            <li class="flex items-center"><i class="bi bi-check text-green-600 dark:text-green-400 mr-2 text-lg"></i>24/7 Emergency Response</li>
                            <li class="flex items-center"><i class="bi bi-check text-green-600 dark:text-green-400 mr-2 text-lg"></i>Forensik Digital</li>
                            <li class="flex items-center"><i class="bi bi-check text-green-600 dark:text-green-400 mr-2 text-lg"></i>Recovery Support</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Layanan 6 -->
            <div data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm h-full bg-white dark:bg-slate-700 rounded-xl">
                    <div class="p-6">
                        <div class="w-[70px] h-[70px] rounded-full bg-gray-200 dark:bg-gray-700 inline-flex items-center justify-center mb-4">
                            <i class="bi bi-clipboard-check text-gray-600 dark:text-gray-400" style="font-size: 2rem;"></i>
                        </div>
                        <h5 class="text-xl font-bold mb-3">Compliance Advisory</h5>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Konsultasi untuk memastikan sistem organisasi memenuhi 
                            standar dan regulasi keamanan yang berlaku.
                        </p>
                        <ul class="space-y-2 text-gray-600 dark:text-gray-400 text-sm">
                            <li class="flex items-center"><i class="bi bi-check text-green-600 dark:text-green-400 mr-2 text-lg"></i>ISO 27001</li>
                            <li class="flex items-center"><i class="bi bi-check text-green-600 dark:text-green-400 mr-2 text-lg"></i>GDPR/PDP</li>
                            <li class="flex items-center"><i class="bi bi-check text-green-600 dark:text-green-400 mr-2 text-lg"></i>NIST Framework</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-12 bg-gray-50 dark:bg-slate-800">
    <div class="container mx-auto px-4">
        <div class="flex justify-center">
            <div class="w-full lg:w-2/3" data-aos="zoom-in">
                <div class="card border-0 shadow-sm bg-white dark:bg-slate-700 rounded-xl">
                    <div class="p-8 md:p-12">
                        <h3 class="text-2xl font-bold text-center mb-6">Hubungi Kami</h3>
                        <p class="text-center text-gray-600 dark:text-gray-400 mb-6">
                            Isi formulir di bawah ini untuk berkonsultasi dengan tim kami
                        </p>
                        
                        <form class="needs-validation" novalidate>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="nama" class="block mb-2 font-semibold text-sm">Nama Lengkap <span class="text-red-600">*</span></label>
                                    <input type="text" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-600 dark:text-white" id="nama" required>
                                    <div class="text-red-600 text-sm mt-1 hidden">Mohon isi nama lengkap Anda.</div>
                                </div>
                                <div>
                                    <label for="email" class="block mb-2 font-semibold text-sm">Email <span class="text-red-600">*</span></label>
                                    <input type="email" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-600 dark:text-white" id="email" required>
                                    <div class="text-red-600 text-sm mt-1 hidden">Mohon isi email yang valid.</div>
                                </div>
                                <div>
                                    <label for="telepon" class="block mb-2 font-semibold text-sm">No. Telepon <span class="text-red-600">*</span></label>
                                    <input type="tel" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-600 dark:text-white" id="telepon" required>
                                    <div class="text-red-600 text-sm mt-1 hidden">Mohon isi nomor telepon.</div>
                                </div>
                                <div>
                                    <label for="organisasi" class="block mb-2 font-semibold text-sm">Organisasi/Perusahaan</label>
                                    <input type="text" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-600 dark:text-white" id="organisasi">
                                </div>
                                <div class="md:col-span-2">
                                    <label for="layanan" class="block mb-2 font-semibold text-sm">Layanan yang Diminati <span class="text-red-600">*</span></label>
                                    <select class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-600 dark:text-white" id="layanan" required>
                                        <option value="" selected disabled>Pilih layanan...</option>
                                        <option value="security-assessment">Security Assessment</option>
                                        <option value="penetration-testing">Penetration Testing</option>
                                        <option value="security-training">Security Training</option>
                                        <option value="network-security">Network Security</option>
                                        <option value="incident-response">Incident Response</option>
                                        <option value="compliance-advisory">Compliance Advisory</option>
                                    </select>
                                    <div class="text-red-600 text-sm mt-1 hidden">Mohon pilih layanan yang diminati.</div>
                                </div>
                                <div class="md:col-span-2">
                                    <label for="pesan" class="block mb-2 font-semibold text-sm">Pesan/Kebutuhan <span class="text-red-600">*</span></label>
                                    <textarea class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-600 dark:text-white" id="pesan" rows="5" required></textarea>
                                    <div class="text-red-600 text-sm mt-1 hidden">Mohon isi pesan atau kebutuhan Anda.</div>
                                </div>
                                <div class="md:col-span-2">
                                    <div class="flex items-start">
                                        <input class="mt-1 mr-2" type="checkbox" id="agreement" required>
                                        <label class="text-sm text-gray-600 dark:text-gray-400" for="agreement">
                                            Saya setuju dengan kebijakan privasi dan penggunaan data
                                        </label>
                                    </div>
                                    <div class="text-red-600 text-sm mt-1 hidden">Anda harus menyetujui untuk melanjutkan.</div>
                                </div>
                                <div class="md:col-span-2">
                                    <button type="submit" class="btn-primary w-full inline-flex items-center justify-center px-6 py-3 rounded-lg text-lg">
                                        <i class="bi bi-send mr-2"></i>Kirim Pesan
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                        <hr class="my-8 border-gray-300 dark:border-gray-600">
                        
                        <div class="text-center">
                            <p class="text-gray-600 dark:text-gray-400 mb-2"><strong>Atau hubungi kami langsung:</strong></p>
                            <p class="mb-2">
                                <i class="bi bi-envelope mr-2 text-blue-600"></i>
                                <a href="mailto:ncs@polinema.ac.id" class="no-underline text-gray-700 dark:text-gray-300 hover:text-blue-600">ncs@polinema.ac.id</a>
                            </p>
                            <p class="mb-0">
                                <i class="bi bi-telephone mr-2 text-blue-600"></i>
                                <a href="tel:+6234140424" class="no-underline text-gray-700 dark:text-gray-300 hover:text-blue-600">(0341) 404424</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
