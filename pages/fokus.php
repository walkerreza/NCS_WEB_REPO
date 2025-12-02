<?php
/**
 * Focus Areas Page
 * Display lab specialization areas and expertise
 */

$focusAreas = getFocusAreas();
?>

<!-- Page Header -->
<section class="py-16 bg-gradient-to-b from-[#171c28] to-[#1e2433]">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <span class="inline-block px-4 py-2 bg-[#c3b1e1]/10 border border-[#c3b1e1]/30 rounded-full text-[#c3b1e1] text-sm font-semibold mb-4" data-aos="fade-down">
                <i class="fas fa-crosshairs mr-2"></i>Bidang Fokus
            </span>
            <h1 class="font-display text-4xl md:text-5xl font-bold text-white mb-6" data-aos="fade-up">
                Area <span class="text-[#c3b1e1]">Spesialisasi</span>
            </h1>
            <p class="text-gray-400 text-lg" data-aos="fade-up" data-aos-delay="100">
                Bidang keahlian dan fokus penelitian NCS Laboratory dalam keamanan siber
            </p>
        </div>
    </div>
</section>

<!-- Focus Areas Grid -->
<section class="py-16 bg-[#1e2433]">
    <div class="container mx-auto px-4">
        
        <?php if (!empty($focusAreas)): ?>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php 
            $colors = [
                'from-[#88c9c9] to-[#a8e6cf]',
                'from-[#c3b1e1] to-[#e8b4bc]',
                'from-[#a7c5eb] to-[#88c9c9]',
                'from-[#f5c7a9] to-[#e8b4bc]',
                'from-[#a8e6cf] to-[#b5c99a]',
                'from-[#e8b4bc] to-[#c3b1e1]'
            ];
            $index = 0;
            foreach ($focusAreas as $area): 
                $color = $colors[$index % count($colors)];
            ?>
            <div class="cyber-card rounded-2xl overflow-hidden group" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                <!-- Image/Icon Header -->
                <div class="relative h-48 bg-gradient-to-br <?= $color ?> overflow-hidden">
                    <?php if (!empty($area['image'])): ?>
                    <img src="<?= uploadUrl('images/' . $area['image']) ?>" 
                         alt="<?= htmlspecialchars($area['title']) ?>" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    <?php else: ?>
                    <div class="w-full h-full flex items-center justify-center">
                        <i class="fas fa-<?= htmlspecialchars($area['icon'] ?? 'shield-alt') ?> text-gray-800/30 text-6xl group-hover:scale-110 transition-transform"></i>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Icon Badge -->
                    <div class="absolute bottom-4 left-4 w-14 h-14 bg-white/90 backdrop-blur rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-<?= htmlspecialchars($area['icon'] ?? 'shield-alt') ?> text-gray-800 text-xl"></i>
                    </div>
                </div>
                
                <!-- Content -->
                <div class="p-6">
                    <h3 class="font-display text-xl font-bold text-white mb-3 group-hover:text-[#88c9c9] transition-colors">
                        <?= htmlspecialchars($area['title']) ?>
                    </h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        <?= htmlspecialchars($area['description']) ?>
                    </p>
                </div>
            </div>
            <?php $index++; endforeach; ?>
        </div>
        <?php else: ?>
        <!-- Empty State -->
        <div class="text-center py-16">
            <div class="w-24 h-24 mx-auto mb-6 bg-[#2a3142] rounded-full flex items-center justify-center">
                <i class="fas fa-crosshairs text-[#c3b1e1] text-4xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-white mb-2">Data Belum Tersedia</h3>
            <p class="text-gray-400">Informasi bidang fokus sedang dalam proses pengembangan.</p>
        </div>
        <?php endif; ?>
        
    </div>
</section>

<!-- Why Choose NCS -->
<section class="py-16 bg-gradient-to-b from-[#1e2433] to-[#171c28]">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="font-display text-3xl font-bold text-white mb-4">
                    Mengapa Memilih <span class="text-[#88c9c9]">NCS Lab</span>?
                </h2>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    Keunggulan kami dalam bidang keamanan siber
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Feature 1 -->
                <div class="text-center p-6" data-aos="fade-up" data-aos-delay="0">
                    <div class="w-16 h-16 mx-auto mb-4 bg-[#88c9c9]/10 rounded-2xl flex items-center justify-center">
                        <i class="fas fa-user-graduate text-[#88c9c9] text-2xl"></i>
                    </div>
                    <h3 class="text-white font-semibold mb-2">Tim Ahli</h3>
                    <p class="text-gray-500 text-sm">Didukung oleh dosen dan praktisi berpengalaman di bidang cyber security</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="text-center p-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 mx-auto mb-4 bg-[#c3b1e1]/10 rounded-2xl flex items-center justify-center">
                        <i class="fas fa-flask text-[#c3b1e1] text-2xl"></i>
                    </div>
                    <h3 class="text-white font-semibold mb-2">Riset Berkualitas</h3>
                    <p class="text-gray-500 text-sm">Penelitian dengan standar internasional dan publikasi bereputasi</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="text-center p-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 mx-auto mb-4 bg-[#a7c5eb]/10 rounded-2xl flex items-center justify-center">
                        <i class="fas fa-tools text-[#a7c5eb] text-2xl"></i>
                    </div>
                    <h3 class="text-white font-semibold mb-2">Fasilitas Lengkap</h3>
                    <p class="text-gray-500 text-sm">Infrastruktur modern untuk mendukung praktikum dan penelitian</p>
                </div>
                
                <!-- Feature 4 -->
                <div class="text-center p-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 mx-auto mb-4 bg-[#a8e6cf]/10 rounded-2xl flex items-center justify-center">
                        <i class="fas fa-handshake text-[#a8e6cf] text-2xl"></i>
                    </div>
                    <h3 class="text-white font-semibold mb-2">Kemitraan Industri</h3>
                    <p class="text-gray-500 text-sm">Kolaborasi dengan berbagai perusahaan dan institusi terkemuka</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-[#c3b1e1] to-[#a7c5eb]">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="font-display text-3xl font-bold text-gray-800 mb-4" data-aos="fade-up">
                Tertarik Bergabung atau Berkolaborasi?
            </h2>
            <p class="text-gray-700 mb-8" data-aos="fade-up" data-aos-delay="100">
                Hubungi kami untuk informasi lebih lanjut tentang penelitian, magang, atau kemitraan.
            </p>
            <div class="flex flex-wrap justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
                <a href="#contact" class="cyber-btn px-8 py-4 bg-gray-800 text-white font-semibold rounded-xl hover:bg-gray-900 transition-all shadow-lg">
                    <i class="fas fa-envelope mr-2"></i>Hubungi Kami
                </a>
                <a href="<?= baseUrl('?page=konsultatif') ?>" class="cyber-btn px-8 py-4 bg-white/80 text-gray-800 font-semibold rounded-xl hover:bg-white transition-all">
                    <i class="fas fa-headset mr-2"></i>Layanan Konsultasi
                </a>
            </div>
        </div>
    </div>
</section>

