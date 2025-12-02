<?php
/**
 * Footer Include - Pastel Theme
 * Contains footer section with contact info, links, and credits
 */

$teamMembers = getTeamMembers();
$externalLinks = getExternalLinks();
?>

<!-- Contact Section - Pastel -->
<section id="contact" class="py-20 bg-gradient-to-b from-[#171c28] to-[#1e2433]">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-block px-4 py-2 bg-[#e8b4bc]/10 border border-[#e8b4bc]/30 rounded-full text-[#e8b4bc] text-sm font-semibold mb-4">
                <i class="fas fa-envelope mr-2"></i>Kontak
            </span>
            <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-4">
                Hubungi Kami
            </h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Kirimkan pesan atau pertanyaan Anda kepada kami</p>
        </div>
        
        <div class="max-w-4xl mx-auto">
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Contact Info -->
                <div data-aos="fade-right">
                    <div class="cyber-card rounded-2xl p-8 h-full">
                        <h3 class="font-display text-xl font-bold text-[#88c9c9] mb-6">Informasi Kontak</h3>
                        
                        <div class="space-y-6">
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-[#88c9c9]/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-map-marker-alt text-[#88c9c9]"></i>
                                </div>
                                <div>
                                    <h4 class="text-white font-semibold mb-1">Alamat</h4>
                                    <p class="text-gray-400 text-sm"><?= nl2br(htmlspecialchars($settings['contact_address'] ?? 'Politeknik Negeri Malang')) ?></p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-[#c3b1e1]/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-envelope text-[#c3b1e1]"></i>
                                </div>
                                <div>
                                    <h4 class="text-white font-semibold mb-1">Email</h4>
                                    <a href="mailto:<?= htmlspecialchars($settings['contact_email'] ?? '') ?>" class="text-gray-400 text-sm hover:text-[#88c9c9] transition-colors">
                                        <?= htmlspecialchars($settings['contact_email'] ?? 'ncslab@polinema.ac.id') ?>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-[#a7c5eb]/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-phone text-[#a7c5eb]"></i>
                                </div>
                                <div>
                                    <h4 class="text-white font-semibold mb-1">Telepon</h4>
                                    <p class="text-gray-400 text-sm"><?= htmlspecialchars($settings['contact_phone'] ?? '+62-341-000000') ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Social Links -->
                        <div class="mt-8 pt-6 border-t border-[#3a4255]">
                            <h4 class="text-white font-semibold mb-4">Ikuti Kami</h4>
                            <div class="flex space-x-4">
                                <?php if (!empty($settings['social_instagram'])): ?>
                                <a href="<?= htmlspecialchars($settings['social_instagram']) ?>" target="_blank" class="w-10 h-10 bg-[#2a3142] rounded-lg flex items-center justify-center text-gray-400 hover:text-[#e8b4bc] hover:bg-[#3a4255] transition-all">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <?php endif; ?>
                                <?php if (!empty($settings['social_youtube'])): ?>
                                <a href="<?= htmlspecialchars($settings['social_youtube']) ?>" target="_blank" class="w-10 h-10 bg-[#2a3142] rounded-lg flex items-center justify-center text-gray-400 hover:text-[#f5c7a9] hover:bg-[#3a4255] transition-all">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <?php endif; ?>
                                <?php if (!empty($settings['social_github'])): ?>
                                <a href="<?= htmlspecialchars($settings['social_github']) ?>" target="_blank" class="w-10 h-10 bg-[#2a3142] rounded-lg flex items-center justify-center text-gray-400 hover:text-white hover:bg-[#3a4255] transition-all">
                                    <i class="fab fa-github"></i>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div data-aos="fade-left">
                    <form id="contact-form" action="<?= baseUrl('?page=contact-submit') ?>" method="POST" class="cyber-card rounded-2xl p-8">
                        <?= csrf_field() ?>
                        <h3 class="font-display text-xl font-bold text-[#88c9c9] mb-6">Kirim Pesan</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-gray-300 text-sm mb-2">Nama Lengkap</label>
                                <input type="text" name="name" required
                                       class="w-full px-4 py-3 bg-[#2a3142] border border-[#3a4255] rounded-lg text-white placeholder-gray-500 focus:border-[#88c9c9] focus:ring-1 focus:ring-[#88c9c9] transition-all"
                                       placeholder="Masukkan nama Anda">
                            </div>
                            
                            <div>
                                <label class="block text-gray-300 text-sm mb-2">Email</label>
                                <input type="email" name="email" required
                                       class="w-full px-4 py-3 bg-[#2a3142] border border-[#3a4255] rounded-lg text-white placeholder-gray-500 focus:border-[#88c9c9] focus:ring-1 focus:ring-[#88c9c9] transition-all"
                                       placeholder="Masukkan email Anda">
                            </div>
                            
                            <div>
                                <label class="block text-gray-300 text-sm mb-2">Subjek</label>
                                <input type="text" name="subject"
                                       class="w-full px-4 py-3 bg-[#2a3142] border border-[#3a4255] rounded-lg text-white placeholder-gray-500 focus:border-[#88c9c9] focus:ring-1 focus:ring-[#88c9c9] transition-all"
                                       placeholder="Subjek pesan">
                            </div>
                            
                            <div>
                                <label class="block text-gray-300 text-sm mb-2">Pesan</label>
                                <textarea name="message" rows="4" required
                                          class="w-full px-4 py-3 bg-[#2a3142] border border-[#3a4255] rounded-lg text-white placeholder-gray-500 focus:border-[#88c9c9] focus:ring-1 focus:ring-[#88c9c9] transition-all resize-none"
                                          placeholder="Tulis pesan Anda..."></textarea>
                            </div>
                            
                            <button type="submit" class="cyber-btn w-full py-3 bg-gradient-to-r from-[#88c9c9] to-[#a7c5eb] text-gray-800 font-semibold rounded-lg hover:opacity-90 transition-all">
                                <i class="fas fa-paper-plane mr-2"></i>Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer - Pastel -->
<footer class="bg-[#1e2433] border-t border-[#3a4255]">
    <!-- Main Footer -->
    <div class="container mx-auto px-4 py-12">
        <div class="grid md:grid-cols-4 gap-8">
            <!-- About -->
            <div class="md:col-span-2">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-[#88c9c9] to-[#a7c5eb] rounded-lg flex items-center justify-center">
                        <i class="fas fa-shield-alt text-gray-800"></i>
                    </div>
                    <span class="font-display font-bold text-xl text-white">NCS Laboratory</span>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed mb-4">
                    <?= htmlspecialchars($settings['site_description'] ?? 'Laboratorium Network & Cyber Security - Pusat Riset Keamanan Siber') ?>
                </p>
                <p class="text-gray-500 text-xs">
                    <i class="fas fa-map-marker-alt mr-2"></i><?= htmlspecialchars($settings['contact_address'] ?? 'Politeknik Negeri Malang') ?>
                </p>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h4 class="font-display font-bold text-white mb-4">Navigasi</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="<?= baseUrl() ?>" class="text-gray-400 hover:text-[#88c9c9] transition-colors">Beranda</a></li>
                    <li><a href="<?= baseUrl('?page=visi-misi') ?>" class="text-gray-400 hover:text-[#88c9c9] transition-colors">Visi & Misi</a></li>
                    <li><a href="<?= baseUrl('?page=galeri') ?>" class="text-gray-400 hover:text-[#88c9c9] transition-colors">Galeri</a></li>
                    <li><a href="<?= baseUrl('?page=penelitian') ?>" class="text-gray-400 hover:text-[#88c9c9] transition-colors">Penelitian</a></li>
                    <li><a href="<?= baseUrl('?page=konsultatif') ?>" class="text-gray-400 hover:text-[#88c9c9] transition-colors">Layanan</a></li>
                    <li><a href="<?= baseUrl('?page=link') ?>" class="text-gray-400 hover:text-[#88c9c9] transition-colors">Link Terkait</a></li>
                </ul>
            </div>
            
            <!-- External Links -->
            <div>
                <h4 class="font-display font-bold text-white mb-4">Link Terkait</h4>
                <ul class="space-y-2 text-sm">
                    <?php foreach ($externalLinks as $link): ?>
                    <li>
                        <a href="<?= htmlspecialchars($link['url']) ?>" target="_blank" class="text-gray-400 hover:text-[#88c9c9] transition-colors flex items-center">
                            <?php if (!empty($link['icon'])): ?>
                            <i class="fas fa-<?= htmlspecialchars($link['icon']) ?> mr-2 w-4"></i>
                            <?php else: ?>
                            <i class="fas fa-external-link-alt mr-2 w-4"></i>
                            <?php endif; ?>
                            <?= htmlspecialchars($link['title']) ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    
    <!-- Team Credits -->
    <div class="border-t border-[#3a4255] bg-[#171c28]">
        <div class="container mx-auto px-4 py-8">
            <div class="text-center mb-6">
                <h4 class="font-display text-lg font-bold text-[#88c9c9] mb-2">Tim Pengembang</h4>
                <p class="text-gray-500 text-sm"><?= htmlspecialchars($teamMembers[0]['group_name'] ?? 'Tim Pengembang NCS') ?></p>
            </div>
            
            <div class="flex flex-wrap justify-center gap-4">
                <?php foreach ($teamMembers as $member): ?>
                <div class="px-4 py-2 bg-[#2a3142] rounded-lg border border-[#3a4255] hover:border-[#88c9c9]/50 transition-colors">
                    <span class="text-gray-300 text-sm"><?= htmlspecialchars($member['name']) ?></span>
                    <?php if (!empty($member['nim'])): ?>
                    <span class="text-gray-500 text-xs ml-2">(<?= htmlspecialchars($member['nim']) ?>)</span>
                    <?php endif; ?>
                    <?php if (!empty($member['role'])): ?>
                    <span class="text-[#88c9c9] text-xs block"><?= htmlspecialchars($member['role']) ?></span>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
    <!-- Copyright -->
    <div class="border-t border-[#3a4255]">
        <div class="container mx-auto px-4 py-4">
            <div class="flex flex-col md:flex-row items-center justify-between text-sm text-gray-500">
                <p><?= htmlspecialchars($settings['footer_text'] ?? '© ' . date('Y') . ' NCS Laboratory. All Rights Reserved.') ?></p>
                <p class="mt-2 md:mt-0">
                    Built with <i class="fas fa-heart text-[#e8b4bc]"></i> using PHP & TailwindCSS 
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- Back to Top Button - Pastel -->
<button id="back-to-top" class="fixed bottom-8 right-8 w-12 h-12 bg-[#88c9c9] text-gray-800 rounded-full shadow-lg opacity-0 invisible transition-all hover:bg-[#a8e6cf] z-50">
    <i class="fas fa-arrow-up"></i>
</button>

<!-- AOS Library -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- Custom JavaScript -->
<script>
    // Initialize AOS
    AOS.init({
        duration: 800,
        once: true,
        offset: 100
    });
    
    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            const icon = mobileMenuBtn.querySelector('i');
            icon.classList.toggle('fa-bars');
            icon.classList.toggle('fa-times');
        });
    }
    
    // Mobile dropdown toggles
    document.querySelectorAll('.mobile-dropdown > button').forEach(btn => {
        btn.addEventListener('click', () => {
            const content = btn.nextElementSibling;
            content.classList.toggle('hidden');
            const icon = btn.querySelector('.fa-chevron-down');
            icon.classList.toggle('rotate-180');
        });
    });
    
    // Back to top button
    const backToTop = document.getElementById('back-to-top');
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            backToTop.classList.remove('opacity-0', 'invisible');
            backToTop.classList.add('opacity-100', 'visible');
        } else {
            backToTop.classList.add('opacity-0', 'invisible');
            backToTop.classList.remove('opacity-100', 'visible');
        }
    });
    
    backToTop.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
    
    // Form submission with AJAX
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const formData = new FormData(contactForm);
            const submitBtn = contactForm.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengirim...';
            submitBtn.disabled = true;
            
            try {
                const response = await fetch(contactForm.action, {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.success) {
                    alert('Pesan Anda berhasil dikirim!');
                    contactForm.reset();
                } else {
                    alert(result.message || 'Terjadi kesalahan. Silakan coba lagi.');
                }
            } catch (error) {
                alert('Terjadi kesalahan. Silakan coba lagi.');
            } finally {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }
        });
    }
</script>
</body>
</html>
