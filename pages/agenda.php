<?php
/**
 * Agenda Page - Pastel Theme
 * Display upcoming and past events
 */

// Get pagination parameters
$currentPageNum = max(1, (int)($_GET['p'] ?? 1));
$perPage = 9;

// Get total count
$totalUpcoming = countItems('agenda', "is_active = TRUE AND event_date >= CURRENT_DATE");
$totalPast = countItems('agenda', "is_active = TRUE AND event_date < CURRENT_DATE");

// Get agenda data
$upcomingAgenda = db()->fetchAll(
    "SELECT * FROM agenda WHERE is_active = TRUE AND event_date >= CURRENT_DATE ORDER BY event_date ASC LIMIT ? OFFSET ?",
    [$perPage, ($currentPageNum - 1) * $perPage]
);

$pastAgenda = db()->fetchAll(
    "SELECT * FROM agenda WHERE is_active = TRUE AND event_date < CURRENT_DATE ORDER BY event_date DESC LIMIT 6"
);
?>

<!-- Page Header -->
<section class="py-20 bg-gradient-to-b from-[#171c28] to-[#1e2433] relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute w-96 h-96 -top-48 -right-48 bg-[#a7c5eb] rounded-full blur-3xl"></div>
        <div class="absolute w-96 h-96 -bottom-48 -left-48 bg-[#88c9c9] rounded-full blur-3xl"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <!-- Breadcrumb -->
        <nav class="mb-8" data-aos="fade-down">
            <ol class="flex items-center space-x-2 text-sm">
                <li><a href="<?= baseUrl() ?>" class="text-gray-400 hover:text-[#88c9c9] transition-colors">Beranda</a></li>
                <li><span class="text-gray-600">/</span></li>
                <li><span class="text-gray-400">Galeri</span></li>
                <li><span class="text-gray-600">/</span></li>
                <li><span class="text-[#88c9c9]">Agenda</span></li>
            </ol>
        </nav>
        
        <!-- Page Title -->
        <div class="max-w-3xl">
            <span class="inline-block px-4 py-2 bg-[#a7c5eb]/10 border border-[#a7c5eb]/30 rounded-full text-[#a7c5eb] text-sm font-semibold mb-4" data-aos="fade-up">
                <i class="fas fa-calendar-alt mr-2"></i>Jadwal Kegiatan
            </span>
            <h1 class="font-display text-4xl md:text-5xl font-bold text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                Agenda Kegiatan
            </h1>
            <p class="text-gray-400 text-lg" data-aos="fade-up" data-aos-delay="200">
                Jadwal kegiatan dan acara yang akan datang
            </p>
        </div>
        
        <!-- Stats -->
        <div class="flex items-center space-x-6 mt-8" data-aos="fade-up" data-aos-delay="300">
            <div class="flex items-center space-x-2">
                <div class="w-3 h-3 bg-[#a8e6cf] rounded-full animate-pulse"></div>
                <span class="text-gray-400 text-sm"><?= $totalUpcoming ?> Agenda Mendatang</span>
            </div>
            <div class="flex items-center space-x-2">
                <div class="w-3 h-3 bg-gray-500 rounded-full"></div>
                <span class="text-gray-400 text-sm"><?= $totalPast ?> Agenda Selesai</span>
            </div>
        </div>
    </div>
</section>

<!-- Upcoming Events Section -->
<section class="py-20 bg-[#1e2433]">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-8">
            <h2 class="font-display text-2xl font-bold text-white">
                <i class="fas fa-calendar-alt text-[#88c9c9] mr-3"></i>Agenda Mendatang
            </h2>
        </div>
        
        <?php if (!empty($upcomingAgenda)): ?>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($upcomingAgenda as $index => $agenda): ?>
            <div class="cyber-card rounded-2xl overflow-hidden group" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                <!-- Image -->
                <div class="relative h-48 bg-gradient-to-br from-[#88c9c9]/20 to-[#a7c5eb]/20 overflow-hidden">
                    <?php if (!empty($agenda['image'])): ?>
                    <img src="<?= uploadUrl('images/' . $agenda['image']) ?>" alt="<?= htmlspecialchars($agenda['title']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <?php else: ?>
                    <div class="w-full h-full flex items-center justify-center">
                        <i class="fas fa-calendar-day text-[#88c9c9] text-5xl opacity-30"></i>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Date Badge -->
                    <div class="absolute top-4 left-4">
                        <div class="bg-[#88c9c9] text-gray-800 px-4 py-2 rounded-lg text-center">
                            <span class="block text-2xl font-bold"><?= date('d', strtotime($agenda['event_date'])) ?></span>
                            <span class="block text-xs uppercase"><?= date('M Y', strtotime($agenda['event_date'])) ?></span>
                        </div>
                    </div>
                    
                    <!-- Featured Badge -->
                    <?php if ($agenda['is_featured']): ?>
                    <div class="absolute top-4 right-4 bg-[#f5c7a9] text-gray-800 px-3 py-1 rounded-full text-xs font-bold">
                        <i class="fas fa-star mr-1"></i>Featured
                    </div>
                    <?php endif; ?>
                </div>
                
                <!-- Content -->
                <div class="p-6">
                    <h3 class="font-display text-lg font-bold text-white mb-3 group-hover:text-[#88c9c9] transition-colors">
                        <?= htmlspecialchars($agenda['title']) ?>
                    </h3>
                    
                    <div class="space-y-2 mb-4">
                        <?php if (!empty($agenda['event_time'])): ?>
                        <p class="text-gray-500 text-sm flex items-center">
                            <i class="fas fa-clock w-5 text-[#a7c5eb]"></i>
                            <?= date('H:i', strtotime($agenda['event_time'])) ?> WIB
                        </p>
                        <?php endif; ?>
                        
                        <?php if (!empty($agenda['location'])): ?>
                        <p class="text-gray-500 text-sm flex items-center">
                            <i class="fas fa-map-marker-alt w-5 text-[#c3b1e1]"></i>
                            <?= htmlspecialchars($agenda['location']) ?>
                        </p>
                        <?php endif; ?>
                    </div>
                    
                    <p class="text-gray-400 text-sm leading-relaxed">
                        <?= htmlspecialchars(truncateText($agenda['description'], 100)) ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Pagination -->
        <?php
        $pagination = paginate($totalUpcoming, $currentPageNum, $perPage);
        echo renderPagination($pagination, baseUrl('?page=agenda'));
        ?>
        
        <?php else: ?>
        <!-- Empty State -->
        <div class="text-center py-16">
            <div class="w-24 h-24 bg-[#2a3142] rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-calendar-times text-gray-600 text-4xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-400 mb-2">Belum ada agenda mendatang</h3>
            <p class="text-gray-500">Nantikan kegiatan-kegiatan menarik kami selanjutnya</p>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Past Events Section -->
<?php if (!empty($pastAgenda)): ?>
<section class="py-20 bg-gradient-to-b from-[#1e2433] to-[#171c28]">
    <div class="container mx-auto px-4">
        <h2 class="font-display text-2xl font-bold text-white mb-8" data-aos="fade-up">
            <i class="fas fa-history text-gray-500 mr-3"></i>Agenda Sebelumnya
        </h2>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($pastAgenda as $index => $agenda): ?>
            <div class="cyber-card rounded-xl p-6 opacity-75 hover:opacity-100 transition-opacity" data-aos="fade-up" data-aos-delay="<?= $index * 50 ?>">
                <div class="flex items-start space-x-4">
                    <!-- Date -->
                    <div class="text-center flex-shrink-0">
                        <div class="bg-[#2a3142] rounded-lg px-3 py-2">
                            <span class="block text-lg font-bold text-gray-400"><?= date('d', strtotime($agenda['event_date'])) ?></span>
                            <span class="block text-xs text-gray-500 uppercase"><?= date('M', strtotime($agenda['event_date'])) ?></span>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="flex-1">
                        <h3 class="font-semibold text-white mb-1"><?= htmlspecialchars($agenda['title']) ?></h3>
                        <?php if (!empty($agenda['location'])): ?>
                        <p class="text-gray-500 text-sm">
                            <i class="fas fa-map-marker-alt mr-1"></i><?= htmlspecialchars($agenda['location']) ?>
                        </p>
                        <?php endif; ?>
                        <span class="inline-block mt-2 text-xs text-[#a8e6cf] bg-[#a8e6cf]/10 px-2 py-1 rounded">
                            <i class="fas fa-check mr-1"></i>Selesai
                        </span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
