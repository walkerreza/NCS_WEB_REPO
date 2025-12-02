<?php
/**
 * Admin Gallery Management
 * Supports both image and video uploads
  q d         */

$action = sanitize($_GET['action'] ?? 'list');
$id = (int)($_GET['id'] ?? 0);
$message = '';
$error = '';

// Allowed file types
$imageTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
$videoTypes = ['mp4', 'webm', 'ogg', 'mov'];
$allTypes = array_merge($imageTypes, $videoTypes);

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf($_POST['csrf_token'] ?? '')) {
        $error = 'Token tidak valid.';
    } else {
        $data = [
            'title' => sanitize($_POST['title'] ?? ''),
            'description' => sanitize($_POST['description'] ?? ''),
            'category' => sanitize($_POST['category'] ?? ''),
            'event_date' => sanitize($_POST['event_date'] ?? ''),
            'file_type' => sanitize($_POST['file_type'] ?? 'image'),
            'is_featured' => isset($_POST['is_featured']),
            'is_active' => isset($_POST['is_active'])
        ];
        
        if (empty($data['title'])) {
            $error = 'Judul wajib diisi.';
        } else {
            $filePath = null;
            $fileType = $data['file_type'];
            
            if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
                // Determine allowed types based on file_type selection
                $allowedTypes = ($fileType === 'video') ? $videoTypes : $imageTypes;
                $maxSize = ($fileType === 'video') ? 104857600 : 5242880; // 100MB for video, 5MB for image
                
                $upload = uploadFile($_FILES['file'], IMAGE_PATH, $allowedTypes, $maxSize);
                if ($upload['success']) {
                    $filePath = $upload['filename'];
                    // Auto-detect file type from extension
                    if (in_array($upload['extension'], $videoTypes)) {
                        $fileType = 'video';
                    } else {
                        $fileType = 'image';
                    }
                } else {
                    $error = $upload['message'];
                }
            }
            
            if (empty($error)) {
                try {
                    // Convert boolean values for PostgreSQL
                    $isFeatured = $data['is_featured'] ? 'true' : 'false';
                    $isActive = $data['is_active'] ? 'true' : 'false';
                    
                    if ($action === 'edit' && $id > 0) {
                        $sql = "UPDATE gallery SET title = ?, description = ?, category = ?, event_date = ?, file_type = ?, is_featured = ?, is_active = ?, updated_at = CURRENT_TIMESTAMP";
                        $params = [$data['title'], $data['description'], $data['category'], $data['event_date'] ?: null, $fileType, $isFeatured, $isActive];
                        
                        if ($filePath) {
                            // Delete old file
                            $oldItem = db()->fetch("SELECT file_path FROM gallery WHERE id = ?", [$id]);
                            if ($oldItem && !empty($oldItem['file_path'])) {
                                deleteFile(IMAGE_PATH . '/' . $oldItem['file_path']);
                            }
                            $sql .= ", file_path = ?";
                            $params[] = $filePath;
                        }
                        
                        $sql .= " WHERE id = ?";
                        $params[] = $id;
                        
                        db()->query($sql, $params);
                        $message = 'Galeri berhasil diperbarui.';
                    } else {
                        if (!$filePath) {
                            $error = 'File wajib diupload.';
                        } else {
                            $userId = $_SESSION['user_id'] ?? null;
                            db()->query(
                                "INSERT INTO gallery (title, description, file_path, file_type, category, event_date, is_featured, is_active, created_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)",
                                [$data['title'], $data['description'], $filePath, $fileType, $data['category'], $data['event_date'] ?: null, $isFeatured, $isActive, $userId]
                            );
                            $message = 'Galeri berhasil ditambahkan.';
                            $action = 'list';
                        }
                    }
                } catch (Exception $e) {
                    $error = 'Terjadi kesalahan: ' . $e->getMessage();
                }
            }
        }
    }
}

// Handle delete
if ($action === 'delete' && $id > 0) {
    $item = db()->fetch("SELECT file_path FROM gallery WHERE id = ?", [$id]);
    if ($item) {
        deleteFile(IMAGE_PATH . '/' . $item['file_path']);
        db()->query("DELETE FROM gallery WHERE id = ?", [$id]);
        $message = 'Galeri berhasil dihapus.';
    }
    $action = 'list';
}

$gallery = null;
if ($action === 'edit' && $id > 0) {
    $gallery = db()->fetch("SELECT * FROM gallery WHERE id = ?", [$id]);
}
?>

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
    <h1 class="text-xl sm:text-2xl font-bold text-white">Manajemen Galeri</h1>
    <?php if ($action === 'list'): ?>
    <a href="<?= baseUrl('admin/?p=gallery&action=add') ?>" class="inline-flex items-center justify-center px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-500 text-sm sm:text-base">
        <i class="fas fa-plus mr-2"></i>Tambah Galeri
    </a>
    <?php else: ?>
    <a href="<?= baseUrl('admin/?p=gallery') ?>" class="inline-flex items-center justify-center px-4 py-2 bg-gray-700 text-gray-300 rounded-lg hover:bg-gray-600 text-sm sm:text-base">
        <i class="fas fa-arrow-left mr-2"></i>Kembali
    </a>
    <?php endif; ?>
</div>

<?php if ($message): ?>
<div class="alert-dismissible bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-lg mb-6">
    <i class="fas fa-check-circle mr-2"></i><?= htmlspecialchars($message) ?>
</div>
<?php endif; ?>

<?php if ($error): ?>
<div class="alert-dismissible bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-lg mb-6">
    <i class="fas fa-exclamation-circle mr-2"></i><?= htmlspecialchars($error) ?>
</div>
<?php endif; ?>

<?php if ($action === 'list'): ?>
<?php $items = db()->fetchAll("SELECT * FROM gallery ORDER BY created_at DESC"); ?>

<div class="grid grid-cols-1 xs:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    <?php foreach ($items as $item): ?>
    <div class="bg-gray-800 rounded-xl overflow-hidden border border-gray-700 group">
        <div class="aspect-square relative">
            <?php if ($item['file_type'] === 'video'): ?>
            <!-- Video Thumbnail -->
            <div class="w-full h-full bg-gray-900 flex items-center justify-center">
                <video class="w-full h-full object-cover" muted>
                    <source src="<?= uploadUrl('images/' . $item['file_path']) ?>" type="video/mp4">
                </video>
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                    <div class="w-16 h-16 bg-black/50 rounded-full flex items-center justify-center">
                        <i class="fas fa-play text-white text-2xl ml-1"></i>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <!-- Image -->
            <img src="<?= uploadUrl('images/' . $item['file_path']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="w-full h-full object-cover">
            <?php endif; ?>
            
            <!-- Hover Actions -->
            <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center space-x-2">
                <a href="<?= baseUrl('admin/?p=gallery&action=edit&id=' . $item['id']) ?>" class="w-10 h-10 bg-cyan-500 rounded-full flex items-center justify-center text-white hover:bg-cyan-400">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="<?= baseUrl('admin/?p=gallery&action=delete&id=' . $item['id']) ?>" onclick="return confirmDelete()" class="w-10 h-10 bg-red-500 rounded-full flex items-center justify-center text-white hover:bg-red-400">
                    <i class="fas fa-trash"></i>
                </a>
            </div>
            
            <!-- Badges -->
            <?php if (!$item['is_active']): ?>
            <span class="absolute top-2 left-2 bg-gray-500 text-white text-xs px-2 py-1 rounded">Nonaktif</span>
            <?php endif; ?>
            <?php if ($item['file_type'] === 'video'): ?>
            <span class="absolute top-2 right-2 bg-purple-500 text-white text-xs px-2 py-1 rounded">
                <i class="fas fa-video mr-1"></i>Video
            </span>
            <?php endif; ?>
        </div>
        <div class="p-3">
            <h3 class="text-white text-sm font-medium truncate"><?= htmlspecialchars($item['title']) ?></h3>
            <p class="text-gray-500 text-xs"><?= $item['event_date'] ? formatDate($item['event_date'], 'd M Y') : '-' ?></p>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php if (empty($items)): ?>
<div class="text-center py-12 text-gray-500">Belum ada galeri.</div>
<?php endif; ?>

<?php else: ?>
<div class="bg-gray-800 rounded-xl border border-gray-700 p-4 sm:p-6">
    <form method="POST" enctype="multipart/form-data" class="space-y-4 sm:space-y-6">
        <?= csrf_field() ?>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
            <div>
                <label class="block text-gray-300 text-sm font-medium mb-2">Judul *</label>
                <input type="text" name="title" required value="<?= htmlspecialchars($gallery['title'] ?? '') ?>"
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
            </div>
            <div>
                <label class="block text-gray-300 text-sm font-medium mb-2">Kategori</label>
                <input type="text" name="category" value="<?= htmlspecialchars($gallery['category'] ?? '') ?>"
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
            </div>
        </div>
        
        <div>
            <label class="block text-gray-300 text-sm font-medium mb-2">Deskripsi</label>
            <textarea name="description" rows="3" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500"><?= htmlspecialchars($gallery['description'] ?? '') ?></textarea>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
            <div>
                <label class="block text-gray-300 text-sm font-medium mb-2">Tanggal Kegiatan</label>
                <input type="date" name="event_date" value="<?= $gallery['event_date'] ?? '' ?>"
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
            </div>
            <div>
                <label class="block text-gray-300 text-sm font-medium mb-2">Tipe File</label>
                <select name="file_type" id="file_type" onchange="updateFileAccept()"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
                    <option value="image" <?= ($gallery['file_type'] ?? 'image') === 'image' ? 'selected' : '' ?>>
                        <i class="fas fa-image"></i> Gambar (JPG, PNG, GIF, WebP)
                    </option>
                    <option value="video" <?= ($gallery['file_type'] ?? '') === 'video' ? 'selected' : '' ?>>
                        <i class="fas fa-video"></i> Video (MP4, WebM, OGG, MOV)
                    </option>
                </select>
            </div>
        </div>
        
        <div>
            <label class="block text-gray-300 text-sm font-medium mb-2">
                <span id="file_label">File</span> <?= $action === 'add' ? '*' : '' ?>
            </label>
            <input type="file" name="file" id="file_input" <?= $action === 'add' ? 'required' : '' ?>
                   accept="image/jpeg,image/png,image/gif,image/webp"
                   class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-cyan-600 file:text-white">
            <p class="mt-2 text-gray-500 text-xs" id="file_hint">
                Format: JPG, PNG, GIF, WebP. Maksimal 5MB.
            </p>
            <?php if (!empty($gallery['file_path'])): ?>
            <div class="mt-3 p-3 bg-gray-700/50 rounded-lg">
                <p class="text-gray-400 text-sm mb-2">File saat ini:</p>
                <?php if ($gallery['file_type'] === 'video'): ?>
                <video controls class="max-w-xs rounded-lg">
                    <source src="<?= uploadUrl('images/' . $gallery['file_path']) ?>" type="video/mp4">
                </video>
                <?php else: ?>
                <img src="<?= uploadUrl('images/' . $gallery['file_path']) ?>" class="max-w-xs rounded-lg">
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
        
        <script>
        function updateFileAccept() {
            const fileType = document.getElementById('file_type').value;
            const fileInput = document.getElementById('file_input');
            const fileLabel = document.getElementById('file_label');
            const fileHint = document.getElementById('file_hint');
            
            if (fileType === 'video') {
                fileInput.accept = 'video/mp4,video/webm,video/ogg,video/quicktime';
                fileLabel.textContent = 'Video';
                fileHint.textContent = 'Format: MP4, WebM, OGG, MOV. Maksimal 100MB.';
            } else {
                fileInput.accept = 'image/jpeg,image/png,image/gif,image/webp';
                fileLabel.textContent = 'Gambar';
                fileHint.textContent = 'Format: JPG, PNG, GIF, WebP. Maksimal 5MB.';
            }
        }
        // Initialize on load
        document.addEventListener('DOMContentLoaded', updateFileAccept);
        </script>
        
        <div class="flex flex-wrap items-center gap-4 sm:gap-6">
            <label class="flex items-center">
                <input type="checkbox" name="is_featured" <?= ($gallery['is_featured'] ?? false) ? 'checked' : '' ?>
                       class="w-4 h-4 text-cyan-600 bg-gray-700 border-gray-600 rounded">
                <span class="ml-2 text-gray-300">Featured</span>
            </label>
            <label class="flex items-center">
                <input type="checkbox" name="is_active" <?= ($gallery['is_active'] ?? true) ? 'checked' : '' ?>
                       class="w-4 h-4 text-cyan-600 bg-gray-700 border-gray-600 rounded">
                <span class="ml-2 text-gray-300">Aktif</span>
            </label>
        </div>
        
        <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-cyan-600 text-white font-semibold rounded-lg hover:bg-cyan-500">
            <i class="fas fa-save mr-2"></i>Simpan
        </button>
    </form>
</div>
<?php endif; ?>

