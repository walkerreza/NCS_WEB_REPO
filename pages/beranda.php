<?php
/**
 * Beranda (Home) Page
 * Landing page with hero section - Pastel Theme
 */

// Get data for landing page
$upcomingAgenda = getAgenda(3, true);
$recentGallery = getGallery(null, 6);
$services = getServices();
?>

<!-- Hero Section - Full viewport minus navbar height (notification bar 40px + navbar 80px = 120px) -->
<section class="relative hero-fullscreen flex items-center justify-center overflow-hidden">
    <!-- Matrix Code Rain Effect -->
    <canvas id="matrixRain" class="absolute inset-0 z-0"></canvas>
    
    <!-- Animated Background - Pastel -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#171c28]/90 via-[#1e2433]/90 to-[#242b3d]/90 z-[1]">
        <!-- Soft Grid Pattern -->
        <div class="absolute inset-0 opacity-30">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="60" height="60" patternUnits="userSpaceOnUse">
                        <path d="M 60 0 L 0 0 0 60" fill="none" stroke="rgba(136, 201, 201, 0.15)" stroke-width="0.5"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>
        
        <!-- Floating Particles - Pastel -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute w-96 h-96 -top-48 -left-48 bg-[#88c9c9]/15 rounded-full blur-3xl animate-pulse-slow"></div>
            <div class="absolute w-96 h-96 -bottom-48 -right-48 bg-[#c3b1e1]/15 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 2s;"></div>
            <div class="absolute w-64 h-64 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-[#a7c5eb]/10 rounded-full blur-3xl animate-float"></div>
        </div>
    </div>
    
    <!-- Hero Content -->
    <div class="container mx-auto px-4 relative z-[2]">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Badge -->
            <div class="inline-block mb-6" data-aos="fade-down">
                <span class="px-4 py-2 bg-[#88c9c9]/10 border border-[#88c9c9]/30 rounded-full text-[#88c9c9] text-sm font-medium">
                    <i class="fas fa-shield-alt mr-2"></i>Network & Cyber Security
                </span>
            </div>
            
            <!-- Main Heading -->
            <h1 class="font-display text-5xl md:text-6xl font-bold mb-6 leading-tight" data-aos="fade-up" data-aos-delay="100">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#88c9c9] via-[#a7c5eb] to-[#c3b1e1]">
                    NCS Laboratory
                </span>
            </h1>
            
            <!-- Tagline -->
            <p class="text-xl md:text-2xl text-gray-400 mb-8 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                Pusat Riset dan Pengembangan Keamanan Siber
            </p>
            
            <!-- CTA Buttons - Pastel -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4" data-aos="fade-up" data-aos-delay="300">
                <a href="<?= baseUrl('?page=visi-misi') ?>" class="cyber-btn px-8 py-4 bg-gradient-to-r from-[#88c9c9] to-[#a7c5eb] text-gray-800 font-semibold rounded-xl hover:opacity-90 transition-all shadow-lg shadow-[#88c9c9]/20">
                    <i class="fas fa-info-circle mr-2"></i>Tentang Kami
                </a>
                <a href="#services" class="cyber-btn px-8 py-4 bg-transparent border-2 border-[#88c9c9]/50 text-[#88c9c9] font-semibold rounded-xl hover:bg-[#88c9c9]/10 transition-all">
                    <i class="fas fa-concierge-bell mr-2"></i>Layanan Kami
                </a>
            </div>
            
        </div>
    </div>
    
    <!-- Scroll Indicator - Centered at Bottom -->
    <div class="absolute bottom-6 left-0 right-0 flex justify-center z-[3] animate-bounce" data-aos="fade-up" data-aos-delay="500">
        <a href="#about" class="flex flex-col items-center text-gray-400 hover:text-[#88c9c9] transition-colors">
            <span class="text-sm font-medium mb-2 tracking-wider">Scroll Down</span>
            <i class="fas fa-chevron-down text-2xl"></i>
        </a>
    </div>
    
    <!-- Matrix Rain Script -->
    <script>
    (function() {
        const canvas = document.getElementById('matrixRain');
        if (!canvas) return;
        
        const ctx = canvas.getContext('2d');
        
        // Resize canvas to match section height
        function resize() {
            const section = canvas.closest('section');
            canvas.width = window.innerWidth;
            canvas.height = section ? section.offsetHeight : window.innerHeight;
        }
        resize();
        window.addEventListener('resize', resize);
        
        // Characters - cyber/code symbols
        const chars = '01アイウエオカキクケコサシスセソABCDEF</>{}[];:=+-*&%$#@!?~`|\\';
        const charArr = chars.split('');
        
        // Settings
        const fontSize = 16;
        let columns = Math.floor(canvas.width / fontSize);
        let drops = Array(columns).fill(1).map(() => Math.random() * -50);
        
        // Pastel colors
        const pastelColors = [
            { r: 136, g: 201, b: 201 }, // teal
            { r: 168, g: 230, b: 207 }, // mint
            { r: 167, g: 197, b: 235 }, // sky
            { r: 195, g: 177, b: 225 }, // lavender
        ];
        
        // Get random pastel color
        function getColor(opacity) {
            const c = pastelColors[Math.floor(Math.random() * pastelColors.length)];
            return `rgba(${c.r}, ${c.g}, ${c.b}, ${opacity})`;
        }
        
        function draw() {
            // Fade effect
            ctx.fillStyle = 'rgba(23, 28, 40, 0.08)';
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            
            ctx.font = `${fontSize}px 'Courier New', monospace`;
            
            for (let i = 0; i < drops.length; i++) {
                const char = charArr[Math.floor(Math.random() * charArr.length)];
                const x = i * fontSize;
                const y = drops[i] * fontSize;
                
                // Leading character (bright)
                ctx.fillStyle = getColor(0.95);
                ctx.fillText(char, x, y);
                
                // Glow effect
                ctx.shadowColor = getColor(0.5);
                ctx.shadowBlur = 8;
                ctx.fillText(char, x, y);
                ctx.shadowBlur = 0;
                
                // Move drop
                drops[i] += 0.6;
                
                // Reset when off screen
                if (drops[i] * fontSize > canvas.height && Math.random() > 0.98) {
                    drops[i] = 0;
                }
            }
        }
        
        // Handle resize
        window.addEventListener('resize', () => {
            columns = Math.floor(canvas.width / fontSize);
            drops = Array(columns).fill(1).map((_, i) => drops[i] || Math.random() * -50);
        });
        
        // Run animation
        setInterval(draw, 45);
    })();
    </script>
</section>

<!-- About Section -->
<section id="about" class="py-20 bg-gradient-to-b from-[#171c28] to-[#1e2433]">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div data-aos="fade-right">
                <span class="inline-block px-4 py-2 bg-[#88c9c9]/10 border border-[#88c9c9]/30 rounded-full text-[#88c9c9] text-sm font-semibold mb-4">
                    <i class="fas fa-shield-alt mr-2"></i>Tentang NCS Lab
                </span>
                <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-6">
                    Membangun Masa Depan
                    <span class="text-[#88c9c9]">Keamanan Digital</span>
                </h2>
                <p class="text-gray-400 leading-relaxed mb-6">
                    <?= nl2br(htmlspecialchars($settings['site_description'] ?? 'NCS Laboratory merupakan pusat riset dan pengembangan di bidang keamanan jaringan dan siber. Kami berkomitmen untuk menghasilkan inovasi dan solusi dalam menghadapi tantangan keamanan digital.')) ?>
                </p>
                
                <!-- Features List -->
                <div class="space-y-4">
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-[#88c9c9]/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-flask text-[#88c9c9]"></i>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold">Penelitian Berkualitas</h4>
                            <p class="text-gray-500 text-sm">Riset terdepan di bidang cyber security</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-[#c3b1e1]/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-graduation-cap text-[#c3b1e1]"></i>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold">Pengembangan SDM</h4>
                            <p class="text-gray-500 text-sm">Pelatihan dan sertifikasi profesional</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-[#a7c5eb]/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-handshake text-[#a7c5eb]"></i>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold">Kerjasama Industri</h4>
                            <p class="text-gray-500 text-sm">Kolaborasi dengan berbagai institusi</p>
                        </div>
                    </div>
                </div>
                
                <a href="<?= baseUrl('?page=struktur') ?>" class="inline-flex items-center mt-8 text-[#88c9c9] hover:text-[#a8e6cf] transition-colors">
                    Lihat Tim Kami <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            
            <!-- Right Content - Stats -->
            <div data-aos="fade-left">
                <div class="grid grid-cols-2 gap-6">
                    <!-- Stat Card 1 -->
                    <div class="cyber-card rounded-2xl p-6 text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#88c9c9] to-[#a8e6cf] rounded-xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-file-alt text-gray-800 text-2xl"></i>
                        </div>
                        <h3 class="font-display text-3xl font-bold text-white mb-2">
                            <?= countItems('documents', "is_active = TRUE AND category = 'penelitian'") ?>+
                        </h3>
                        <p class="text-gray-400 text-sm">Penelitian</p>
                    </div>
                    
                    <!-- Stat Card 2 -->
                    <div class="cyber-card rounded-2xl p-6 text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#c3b1e1] to-[#e8b4bc] rounded-xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-hands-helping text-gray-800 text-2xl"></i>
                        </div>
                        <h3 class="font-display text-3xl font-bold text-white mb-2">
                            <?= countItems('documents', "is_active = TRUE AND category = 'pengabdian'") ?>+
                        </h3>
                        <p class="text-gray-400 text-sm">Pengabdian</p>
                    </div>
                    
                    <!-- Stat Card 3 -->
                    <div class="cyber-card rounded-2xl p-6 text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#a8e6cf] to-[#b5c99a] rounded-xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-images text-gray-800 text-2xl"></i>
                        </div>
                        <h3 class="font-display text-3xl font-bold text-white mb-2">
                            <?= countItems('gallery', 'is_active = TRUE') ?>+
                        </h3>
                        <p class="text-gray-400 text-sm">Dokumentasi</p>
                    </div>
                    
                    <!-- Stat Card 4 -->
                    <div class="cyber-card rounded-2xl p-6 text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#a7c5eb] to-[#88c9c9] rounded-xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-calendar-check text-gray-800 text-2xl"></i>
                        </div>
                        <h3 class="font-display text-3xl font-bold text-white mb-2">
                            <?= countItems('agenda', 'is_active = TRUE') ?>+
                        </h3>
                        <p class="text-gray-400 text-sm">Kegiatan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-20 bg-[#1e2433]">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-block px-4 py-2 bg-[#c3b1e1]/10 border border-[#c3b1e1]/30 rounded-full text-[#c3b1e1] text-sm font-semibold mb-4">
                <i class="fas fa-concierge-bell mr-2"></i>Layanan Kami
            </span>
            <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-4">
                Apa yang Kami Tawarkan
            </h2>
            <p class="text-gray-400 max-w-2xl mx-auto">
                Layanan lengkap dalam bidang keamanan jaringan dan siber untuk mendukung kebutuhan Anda
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php 
            $icons = ['server' => 'fas fa-server', 'desktop' => 'fas fa-desktop', 'network-wired' => 'fas fa-network-wired', 'shield-alt' => 'fas fa-shield-alt', 'user-shield' => 'fas fa-user-shield', 'bug' => 'fas fa-bug'];
            $colors = ['from-[#88c9c9] to-[#a8e6cf]', 'from-[#c3b1e1] to-[#e8b4bc]', 'from-[#a8e6cf] to-[#b5c99a]', 'from-[#f5c7a9] to-[#e8b4bc]', 'from-[#a7c5eb] to-[#88c9c9]', 'from-[#e8b4bc] to-[#c3b1e1]'];
            $i = 0;
            foreach ($services as $service): 
                $color = $colors[$i % count($colors)];
                $icon = $icons[$service['icon'] ?? 'shield-alt'] ?? 'fas fa-cog';
            ?>
            <div class="cyber-card rounded-2xl p-6 group" data-aos="fade-up" data-aos-delay="<?= $i * 100 ?>">
                <div class="w-14 h-14 bg-gradient-to-br <?= $color ?> rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="<?= $icon ?> text-gray-800 text-xl"></i>
                </div>
                <h3 class="font-display text-xl font-bold text-white mb-3"><?= htmlspecialchars($service['title']) ?></h3>
                <p class="text-gray-400 text-sm leading-relaxed"><?= htmlspecialchars(truncateText($service['description'], 120)) ?></p>
                <a href="<?= baseUrl('?page=' . ($service['category'] === 'sarana' ? 'sarana' : 'konsultatif')) ?>" class="inline-flex items-center mt-4 text-[#88c9c9] hover:text-[#a8e6cf] text-sm transition-colors">
                    Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            <?php $i++; endforeach; ?>
            
            <?php if (empty($services)): ?>
            <!-- Placeholder cards if no services -->
            <div class="cyber-card rounded-2xl p-6" data-aos="fade-up">
                <div class="w-14 h-14 bg-gradient-to-br from-[#88c9c9] to-[#a8e6cf] rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-shield-alt text-gray-800 text-xl"></i>
                </div>
                <h3 class="font-display text-xl font-bold text-white mb-3">Keamanan Jaringan</h3>
                <p class="text-gray-400 text-sm leading-relaxed">Layanan audit dan konsultasi keamanan jaringan komputer</p>
            </div>
            <div class="cyber-card rounded-2xl p-6" data-aos="fade-up" data-aos-delay="100">
                <div class="w-14 h-14 bg-gradient-to-br from-[#c3b1e1] to-[#e8b4bc] rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-bug text-gray-800 text-xl"></i>
                </div>
                <h3 class="font-display text-xl font-bold text-white mb-3">Penetration Testing</h3>
                <p class="text-gray-400 text-sm leading-relaxed">Pengujian keamanan sistem untuk mengidentifikasi kerentanan</p>
            </div>
            <div class="cyber-card rounded-2xl p-6" data-aos="fade-up" data-aos-delay="200">
                <div class="w-14 h-14 bg-gradient-to-br from-[#a8e6cf] to-[#b5c99a] rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-graduation-cap text-gray-800 text-xl"></i>
                </div>
                <h3 class="font-display text-xl font-bold text-white mb-3">Pelatihan & Sertifikasi</h3>
                <p class="text-gray-400 text-sm leading-relaxed">Program pelatihan profesional di bidang cyber security</p>
            </div>
            <?php endif; ?>
        </div>
        
        <div class="text-center mt-10" data-aos="fade-up">
            <a href="<?= baseUrl('?page=sarana') ?>" class="cyber-btn inline-flex items-center px-6 py-3 bg-transparent border-2 border-[#88c9c9]/50 text-[#88c9c9] font-semibold rounded-xl hover:bg-[#88c9c9]/10 transition-all">
                Lihat Semua Layanan <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Agenda Section -->
<?php if (!empty($upcomingAgenda)): ?>
<section class="py-20 bg-gradient-to-b from-[#1e2433] to-[#171c28]">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-block px-4 py-2 bg-[#a7c5eb]/10 border border-[#a7c5eb]/30 rounded-full text-[#a7c5eb] text-sm font-semibold mb-4">
                <i class="fas fa-calendar-alt mr-2"></i>Agenda Mendatang
            </span>
            <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-4">
                Kegiatan Terbaru
            </h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-6">
            <?php foreach ($upcomingAgenda as $agenda): ?>
            <div class="cyber-card rounded-2xl overflow-hidden group" data-aos="fade-up">
                <!-- Image -->
                <div class="relative h-48 bg-gradient-to-br from-[#88c9c9]/20 to-[#a7c5eb]/20 overflow-hidden">
                    <?php if (!empty($agenda['image'])): ?>
                    <img src="<?= uploadUrl('images/' . $agenda['image']) ?>" alt="<?= htmlspecialchars($agenda['title']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <?php else: ?>
                    <div class="w-full h-full flex items-center justify-center">
                        <i class="fas fa-calendar-day text-[#88c9c9] text-4xl opacity-50"></i>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Date Badge -->
                    <div class="absolute top-4 left-4 bg-[#88c9c9] text-gray-800 px-3 py-1 rounded-lg text-sm font-semibold">
                        <?= formatDate($agenda['event_date'], 'd M Y') ?>
                    </div>
                </div>
                
                <!-- Content -->
                <div class="p-6">
                    <h3 class="font-display text-lg font-bold text-white mb-2 group-hover:text-[#88c9c9] transition-colors">
                        <?= htmlspecialchars($agenda['title']) ?>
                    </h3>
                    <?php if (!empty($agenda['location'])): ?>
                    <p class="text-gray-500 text-sm mb-3">
                        <i class="fas fa-map-marker-alt mr-2"></i><?= htmlspecialchars($agenda['location']) ?>
                    </p>
                    <?php endif; ?>
                    <p class="text-gray-400 text-sm"><?= htmlspecialchars(truncateText($agenda['description'], 100)) ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-10" data-aos="fade-up">
            <a href="<?= baseUrl('?page=agenda') ?>" class="cyber-btn inline-flex items-center px-6 py-3 bg-transparent border-2 border-[#a7c5eb]/50 text-[#a7c5eb] font-semibold rounded-xl hover:bg-[#a7c5eb]/10 transition-all">
                Lihat Semua Agenda <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Gallery Preview Section -->
<?php if (!empty($recentGallery)): ?>
<section class="py-20 bg-[#171c28]">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-block px-4 py-2 bg-[#a8e6cf]/10 border border-[#a8e6cf]/30 rounded-full text-[#a8e6cf] text-sm font-semibold mb-4">
                <i class="fas fa-images mr-2"></i>Galeri Kegiatan
            </span>
            <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-4">
                Dokumentasi Terbaru
            </h2>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <?php foreach ($recentGallery as $item): ?>
            <div class="relative group overflow-hidden rounded-xl aspect-square" data-aos="zoom-in">
                <?php if (!empty($item['file_path'])): ?>
                <img src="<?= uploadUrl('images/' . $item['file_path']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <?php else: ?>
                <div class="w-full h-full bg-gradient-to-br from-[#88c9c9]/20 to-[#c3b1e1]/20 flex items-center justify-center">
                    <i class="fas fa-image text-[#88c9c9] text-3xl opacity-50"></i>
                </div>
                <?php endif; ?>
                
                <!-- Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end">
                    <div class="p-4">
                        <h4 class="text-white font-semibold text-sm"><?= htmlspecialchars($item['title']) ?></h4>
                        <?php if (!empty($item['event_date'])): ?>
                        <p class="text-gray-400 text-xs"><?= formatDate($item['event_date']) ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-10" data-aos="fade-up">
            <a href="<?= baseUrl('?page=galeri') ?>" class="cyber-btn inline-flex items-center px-6 py-3 bg-transparent border-2 border-[#a8e6cf]/50 text-[#a8e6cf] font-semibold rounded-xl hover:bg-[#a8e6cf]/10 transition-all">
                Lihat Semua Galeri <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- CTA Section - Pastel -->
<section class="py-20 bg-gradient-to-r from-[#88c9c9] to-[#a7c5eb] relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="cta-grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M 40 0 L 0 0 0 40" fill="none" stroke="rgba(0,0,0,0.3)" stroke-width="1"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#cta-grid)" />
        </svg>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="font-display text-3xl md:text-4xl font-bold text-gray-800 mb-4" data-aos="fade-up">
                Tertarik Berkolaborasi?
            </h2>
            <p class="text-gray-700 text-lg mb-8" data-aos="fade-up" data-aos-delay="100">
                Hubungi kami untuk informasi lebih lanjut tentang penelitian, pengabdian, atau layanan konsultasi.
            </p>
            <a href="#contact" class="cyber-btn inline-flex items-center px-8 py-4 bg-gray-800 text-white font-semibold rounded-xl hover:bg-gray-900 transition-all shadow-lg" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-envelope mr-2"></i>Hubungi Kami
            </a>
        </div>
    </div>
</section>
