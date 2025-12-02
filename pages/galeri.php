<?php
/**
 * Galeri Page - Pastel Theme
 * Display photo and video gallery
 */

// Get filter parameter
$categoryFilter = sanitize($_GET['category'] ?? '');

// Get pagination parameters
$currentPageNum = max(1, (int)($_GET['p'] ?? 1));
$perPage = 12;

// Build query conditions
$conditions = "is_active = TRUE";
$params = [];

if (!empty($categoryFilter)) {
    $conditions .= " AND category = ?";
    $params[] = $categoryFilter;
}

// Get total count
$totalItems = countItems('gallery', $conditions);

// Get gallery items with pagination
$params[] = $perPage;
$params[] = ($currentPageNum - 1) * $perPage;

$gallery = db()->fetchAll(
    "SELECT * FROM gallery WHERE $conditions ORDER BY event_date DESC, created_at DESC LIMIT ? OFFSET ?",
    $params
);

// Get categories for filter
$categories = db()->fetchAll("SELECT DISTINCT category FROM gallery WHERE is_active = TRUE AND category IS NOT NULL ORDER BY category");
?>

<!-- Page Header -->
<section class="py-20 bg-gradient-to-b from-[#171c28] to-[#1e2433] relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute w-96 h-96 -top-48 -right-48 bg-[#a8e6cf] rounded-full blur-3xl"></div>
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
                <li><span class="text-[#88c9c9]">Kegiatan</span></li>
            </ol>
        </nav>
        
        <!-- Page Title -->
        <div class="max-w-3xl">
            <span class="inline-block px-4 py-2 bg-[#a8e6cf]/10 border border-[#a8e6cf]/30 rounded-full text-[#a8e6cf] text-sm font-semibold mb-4" data-aos="fade-up">
                <i class="fas fa-images mr-2"></i>Dokumentasi
            </span>
            <h1 class="font-display text-4xl md:text-5xl font-bold text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                Galeri Kegiatan
            </h1>
            <p class="text-gray-400 text-lg" data-aos="fade-up" data-aos-delay="200">
                Dokumentasi foto dan video kegiatan laboratorium
            </p>
        </div>
        
        <!-- Filter -->
        <div class="flex flex-wrap items-center gap-3 mt-8" data-aos="fade-up" data-aos-delay="300">
            <span class="text-gray-500 text-sm">Filter:</span>
            <a href="<?= baseUrl('?page=galeri') ?>" class="px-4 py-2 rounded-lg text-sm transition-all <?= empty($categoryFilter) ? 'bg-[#88c9c9] text-gray-800' : 'bg-[#2a3142] text-gray-400 hover:bg-[#3a4255]' ?>">
                Semua
            </a>
            <?php foreach ($categories as $cat): ?>
            <a href="<?= baseUrl('?page=galeri&category=' . urlencode($cat['category'])) ?>" 
               class="px-4 py-2 rounded-lg text-sm transition-all <?= $categoryFilter === $cat['category'] ? 'bg-[#88c9c9] text-gray-800' : 'bg-[#2a3142] text-gray-400 hover:bg-[#3a4255]' ?>">
                <?= htmlspecialchars(ucfirst($cat['category'])) ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="py-20 bg-[#1e2433]">
    <div class="container mx-auto px-4">
        <?php if (!empty($gallery)): ?>
        
        <!-- Gallery Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <?php foreach ($gallery as $index => $item): ?>
            <div class="group relative overflow-hidden rounded-xl cursor-pointer" 
                 data-aos="zoom-in" 
                 data-aos-delay="<?= ($index % 8) * 50 ?>"
                 onclick="openLightbox(<?= $item['id'] ?>)">
                
                <!-- Media -->
                <div class="aspect-square bg-[#2a3142]">
                    <?php if (!empty($item['file_path'])): ?>
                        <?php if ($item['file_type'] === 'video'): ?>
                        <!-- Video Thumbnail -->
                        <div class="w-full h-full relative">
                            <video class="w-full h-full object-cover" muted preload="metadata">
                                <source src="<?= uploadUrl('images/' . $item['file_path']) ?>#t=0.5" type="video/mp4">
                            </video>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-16 h-16 bg-[#e8b4bc]/90 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <i class="fas fa-play text-gray-800 text-xl ml-1"></i>
                                </div>
                            </div>
                        </div>
                        <?php else: ?>
                        <!-- Image -->
                        <img src="<?= uploadUrl('images/' . $item['file_path']) ?>" 
                             alt="<?= htmlspecialchars($item['title']) ?>" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <?php endif; ?>
                    <?php else: ?>
                    <div class="w-full h-full flex items-center justify-center">
                        <i class="fas fa-image text-gray-600 text-4xl"></i>
                    </div>
                    <?php endif; ?>
                </div>
                
                <!-- Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <!-- Type Icon -->
                    <div class="absolute top-4 right-4">
                        <?php if ($item['file_type'] === 'video'): ?>
                        <span class="px-3 py-1 bg-[#e8b4bc] rounded-full text-gray-800 text-xs font-semibold">
                            <i class="fas fa-video mr-1"></i>Video
                        </span>
                        <?php else: ?>
                        <span class="w-10 h-10 bg-[#88c9c9]/80 rounded-full flex items-center justify-center">
                            <i class="fas fa-expand text-gray-800 text-sm"></i>
                        </span>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Info -->
                    <div class="absolute bottom-0 left-0 right-0 p-4">
                        <h3 class="text-white font-semibold text-sm mb-1 line-clamp-2">
                            <?= htmlspecialchars($item['title']) ?>
                        </h3>
                        <?php if (!empty($item['event_date'])): ?>
                        <p class="text-gray-400 text-xs">
                            <i class="fas fa-calendar-alt mr-1"></i><?= formatDate($item['event_date'], 'd M Y') ?>
                        </p>
                        <?php endif; ?>
                        <?php if (!empty($item['category'])): ?>
                        <span class="inline-block mt-2 px-2 py-1 bg-[#88c9c9]/20 text-[#88c9c9] text-xs rounded">
                            <?= htmlspecialchars($item['category']) ?>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Pagination -->
        <?php
        $baseUrlPagination = baseUrl('?page=galeri' . (!empty($categoryFilter) ? '&category=' . urlencode($categoryFilter) : ''));
        $pagination = paginate($totalItems, $currentPageNum, $perPage);
        echo renderPagination($pagination, $baseUrlPagination);
        ?>
        
        <?php else: ?>
        <!-- Empty State -->
        <div class="text-center py-20">
            <div class="w-24 h-24 bg-[#2a3142] rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-images text-gray-600 text-4xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-400 mb-2">Belum ada dokumentasi</h3>
            <p class="text-gray-500">Galeri kegiatan akan segera ditampilkan</p>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Lightbox Modal -->
<div id="lightbox" class="fixed inset-0 z-50 hidden bg-black/95 flex items-center justify-center">
    <button onclick="closeLightbox()" class="absolute top-4 right-4 text-white hover:text-[#88c9c9] transition-colors z-10">
        <i class="fas fa-times text-3xl"></i>
    </button>
    
    <button onclick="prevMedia()" class="absolute left-4 text-white hover:text-[#88c9c9] transition-colors z-10">
        <i class="fas fa-chevron-left text-3xl"></i>
    </button>
    
    <button onclick="nextMedia()" class="absolute right-4 text-white hover:text-[#88c9c9] transition-colors z-10">
        <i class="fas fa-chevron-right text-3xl"></i>
    </button>
    
    <div class="max-w-5xl max-h-[90vh] px-4 w-full">
        <!-- Image Container -->
        <div id="lightbox-image-container" class="flex justify-center">
            <img id="lightbox-image" src="" alt="" class="max-w-full max-h-[80vh] mx-auto rounded-lg">
        </div>
        
        <!-- Video Container -->
        <div id="lightbox-video-container" class="hidden flex justify-center">
            <video id="lightbox-video" controls class="max-w-full max-h-[80vh] mx-auto rounded-lg" preload="metadata">
                <source id="lightbox-video-source" src="" type="video/mp4">
                Browser Anda tidak mendukung video.
            </video>
        </div>
        
        <div class="text-center mt-4">
            <h3 id="lightbox-title" class="text-white text-lg font-semibold"></h3>
            <p id="lightbox-description" class="text-gray-400 text-sm mt-2"></p>
        </div>
    </div>
</div>

<script>
// Gallery data for lightbox
const galleryData = <?= json_encode(array_map(function($item) {
    return [
        'id' => $item['id'],
        'title' => $item['title'],
        'description' => $item['description'],
        'file_path' => uploadUrl('images/' . $item['file_path']),
        'file_type' => $item['file_type'] ?? 'image'
    ];
}, $gallery)) ?>;

let currentIndex = 0;

function openLightbox(id) {
    const index = galleryData.findIndex(item => item.id == id);
    if (index === -1) return;
    
    currentIndex = index;
    showMedia();
    document.getElementById('lightbox').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    // Stop video if playing
    const video = document.getElementById('lightbox-video');
    video.pause();
    video.currentTime = 0;
    
    document.getElementById('lightbox').classList.add('hidden');
    document.body.style.overflow = '';
}

function showMedia() {
    const item = galleryData[currentIndex];
    const imageContainer = document.getElementById('lightbox-image-container');
    const videoContainer = document.getElementById('lightbox-video-container');
    const image = document.getElementById('lightbox-image');
    const video = document.getElementById('lightbox-video');
    const videoSource = document.getElementById('lightbox-video-source');
    
    // Stop any playing video
    video.pause();
    
    if (item.file_type === 'video') {
        // Show video
        imageContainer.classList.add('hidden');
        videoContainer.classList.remove('hidden');
        videoSource.src = item.file_path;
        video.load();
    } else {
        // Show image
        videoContainer.classList.add('hidden');
        imageContainer.classList.remove('hidden');
        image.src = item.file_path;
    }
    
    document.getElementById('lightbox-title').textContent = item.title;
    document.getElementById('lightbox-description').textContent = item.description || '';
}

function nextMedia() {
    currentIndex = (currentIndex + 1) % galleryData.length;
    showMedia();
}

function prevMedia() {
    currentIndex = (currentIndex - 1 + galleryData.length) % galleryData.length;
    showMedia();
}

// Keyboard navigation
document.addEventListener('keydown', (e) => {
    if (document.getElementById('lightbox').classList.contains('hidden')) return;
    
    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowRight') nextMedia();
    if (e.key === 'ArrowLeft') prevMedia();
});

// Close on background click
document.getElementById('lightbox').addEventListener('click', (e) => {
    if (e.target.id === 'lightbox') closeLightbox();
});
</script>
