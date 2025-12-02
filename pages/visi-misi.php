<?php
/**
 * Visi & Misi Page - Pastel Theme
 * Display laboratory introduction, vision and mission
 */

$pendahuluan = $settings['pendahuluan'] ?? '';
$visi = $settings['visi'] ?? '';
$misi = $settings['misi'] ?? '';
?>

<!-- Page Header -->
<section class="py-20 bg-gradient-to-b from-[#171c28] to-[#1e2433] relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute w-96 h-96 -top-48 -right-48 bg-[#88c9c9] rounded-full blur-3xl"></div>
        <div class="absolute w-96 h-96 -bottom-48 -left-48 bg-[#c3b1e1] rounded-full blur-3xl"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <!-- Breadcrumb -->
        <nav class="mb-8" data-aos="fade-down">
            <ol class="flex items-center space-x-2 text-sm">
                <li><a href="<?= baseUrl() ?>" class="text-gray-400 hover:text-[#88c9c9] transition-colors">Beranda</a></li>
                <li><span class="text-gray-600">/</span></li>
                <li><span class="text-gray-400">Profil</span></li>
                <li><span class="text-gray-600">/</span></li>
                <li><span class="text-[#88c9c9]">Visi & Misi</span></li>
            </ol>
        </nav>
        
        <!-- Page Title -->
        <div class="max-w-3xl">
            <span class="inline-block px-4 py-2 bg-[#88c9c9]/10 border border-[#88c9c9]/30 rounded-full text-[#88c9c9] text-sm font-semibold mb-4" data-aos="fade-up">
                <i class="fas fa-building mr-2"></i>Profil
            </span>
            <h1 class="font-display text-4xl md:text-5xl font-bold text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                Visi & Misi
            </h1>
            <p class="text-gray-400 text-lg" data-aos="fade-up" data-aos-delay="200">
                Arah dan tujuan kami dalam mengembangkan keamanan siber Indonesia
            </p>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="py-20 bg-[#1e2433]">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Pendahuluan Card -->
            <div class="cyber-card rounded-2xl p-8 md:p-12 mb-8" data-aos="fade-up">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#a8e6cf] to-[#88c9c9] rounded-xl flex items-center justify-center">
                        <i class="fas fa-info-circle text-gray-800 text-2xl"></i>
                    </div>
                    <div>
                        <span class="text-[#a8e6cf] text-sm font-semibold">Introduction</span>
                        <h2 class="font-display text-2xl md:text-3xl font-bold text-white">Pendahuluan</h2>
                    </div>
                </div>
                
                <div class="prose prose-invert max-w-none">
                    <p class="text-gray-300 leading-relaxed">
                        <?= nl2br(htmlspecialchars($pendahuluan ?: 'NCS Laboratory (Network & Cyber Security Laboratory) adalah laboratorium penelitian dan pengembangan yang berfokus pada bidang keamanan jaringan dan siber. Didirikan untuk menjadi pusat unggulan dalam riset, edukasi, dan layanan konsultasi keamanan digital.')) ?>
                    </p>
                </div>
            </div>
            
            <!-- Visi Card -->
            <div class="cyber-card rounded-2xl p-8 md:p-12 mb-8" data-aos="fade-up">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#88c9c9] to-[#a7c5eb] rounded-xl flex items-center justify-center">
                        <i class="fas fa-eye text-gray-800 text-2xl"></i>
                    </div>
                    <div>
                        <span class="text-[#88c9c9] text-sm font-semibold">Our Vision</span>
                        <h2 class="font-display text-2xl md:text-3xl font-bold text-white">Visi</h2>
                    </div>
                </div>
                
                <div class="pl-4 border-l-4 border-[#88c9c9]">
                    <p class="text-gray-300 text-lg leading-relaxed italic">
                        "<?= nl2br(htmlspecialchars($visi ?: 'Menjadi pusat riset dan pengembangan keamanan siber terkemuka di Indonesia yang menghasilkan inovasi dan solusi dalam bidang Network & Cyber Security.')) ?>"
                    </p>
                </div>
            </div>
            
            <!-- Misi Card -->
            <div class="cyber-card rounded-2xl p-8 md:p-12" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#c3b1e1] to-[#e8b4bc] rounded-xl flex items-center justify-center">
                        <i class="fas fa-bullseye text-gray-800 text-2xl"></i>
                    </div>
                    <div>
                        <span class="text-[#c3b1e1] text-sm font-semibold">Our Mission</span>
                        <h2 class="font-display text-2xl md:text-3xl font-bold text-white">Misi</h2>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <?php
                    $misiList = $misi ? explode("\n", $misi) : [
                        '1. Melakukan penelitian dan pengembangan di bidang keamanan siber',
                        '2. Menyediakan layanan konsultasi keamanan jaringan',
                        '3. Mengembangkan sumber daya manusia yang kompeten di bidang cyber security',
                        '4. Menjalin kerjasama dengan industri dan institusi terkait'
                    ];
                    
                    foreach ($misiList as $index => $item):
                        $item = trim($item);
                        if (empty($item)) continue;
                        // Remove number prefix if exists
                        $item = preg_replace('/^\d+\.\s*/', '', $item);
                    ?>
                    <div class="flex items-start space-x-4 group">
                        <div class="w-10 h-10 bg-[#c3b1e1]/10 rounded-lg flex items-center justify-center flex-shrink-0 group-hover:bg-[#c3b1e1] transition-colors">
                            <span class="text-[#c3b1e1] font-bold group-hover:text-gray-800 transition-colors"><?= $index + 1 ?></span>
                        </div>
                        <p class="text-gray-300 pt-2"><?= htmlspecialchars($item) ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <!-- Core Values -->
            <div class="mt-12" data-aos="fade-up" data-aos-delay="200">
                <h3 class="font-display text-xl font-bold text-white text-center mb-8">
                    Nilai-Nilai Inti
                </h3>
                
                <div class="grid md:grid-cols-4 gap-6">
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-[#88c9c9]/10 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:bg-[#88c9c9] transition-colors">
                            <i class="fas fa-lightbulb text-[#88c9c9] text-xl group-hover:text-gray-800 transition-colors"></i>
                        </div>
                        <h4 class="font-semibold text-white mb-2">Inovasi</h4>
                        <p class="text-gray-500 text-sm">Selalu mencari solusi kreatif</p>
                    </div>
                    
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-[#a7c5eb]/10 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:bg-[#a7c5eb] transition-colors">
                            <i class="fas fa-shield-alt text-[#a7c5eb] text-xl group-hover:text-gray-800 transition-colors"></i>
                        </div>
                        <h4 class="font-semibold text-white mb-2">Integritas</h4>
                        <p class="text-gray-500 text-sm">Menjunjung tinggi etika</p>
                    </div>
                    
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-[#c3b1e1]/10 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:bg-[#c3b1e1] transition-colors">
                            <i class="fas fa-users text-[#c3b1e1] text-xl group-hover:text-gray-800 transition-colors"></i>
                        </div>
                        <h4 class="font-semibold text-white mb-2">Kolaborasi</h4>
                        <p class="text-gray-500 text-sm">Bekerja sama dengan berbagai pihak</p>
                    </div>
                    
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-[#a8e6cf]/10 rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:bg-[#a8e6cf] transition-colors">
                            <i class="fas fa-award text-[#a8e6cf] text-xl group-hover:text-gray-800 transition-colors"></i>
                        </div>
                        <h4 class="font-semibold text-white mb-2">Keunggulan</h4>
                        <p class="text-gray-500 text-sm">Berkomitmen pada kualitas terbaik</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
