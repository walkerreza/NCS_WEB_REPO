<?php
/**
 * Admin Focus Areas Management
 * Manage lab specialization areas
 */

$action = sanitize($_GET['action'] ?? 'list');
$id = (int)($_GET['id'] ?? 0);
$message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? '')) {
    $data = [
        'title' => sanitize($_POST['title'] ?? ''),
        'description' => sanitize($_POST['description'] ?? ''),
        'icon' => sanitize($_POST['icon'] ?? ''),
        'order_index' => (int)($_POST['order_index'] ?? 0),
        'is_active' => isset($_POST['is_active'])
    ];
    
    // Handle image upload
    $imageName = null;
    if (!empty($_FILES['image']['name'])) {
        $upload = uploadFile($_FILES['image'], UPLOAD_PATH . '/images', ['jpg', 'jpeg', 'png', 'webp']);
        if ($upload['success']) {
            $imageName = $upload['filename'];
        }
    }
    
    if (!empty($data['title'])) {
        // Convert boolean for PostgreSQL
        $isActive = $data['is_active'] ? 'true' : 'false';
        
        if ($action === 'edit' && $id > 0) {
            $sql = "UPDATE focus_areas SET title = ?, description = ?, icon = ?, order_index = ?, is_active = ?, updated_at = CURRENT_TIMESTAMP";
            $params = [$data['title'], $data['description'], $data['icon'], $data['order_index'], $isActive];
            
            if ($imageName) {
                // Delete old image
                $oldItem = db()->fetch("SELECT image FROM focus_areas WHERE id = ?", [$id]);
                if (!empty($oldItem['image'])) {
                    deleteFile(UPLOAD_PATH . '/images/' . $oldItem['image']);
                }
                $sql .= ", image = ?";
                $params[] = $imageName;
            }
            
            $sql .= " WHERE id = ?";
            $params[] = $id;
            db()->query($sql, $params);
        } else {
            db()->query("INSERT INTO focus_areas (title, description, image, icon, order_index, is_active) VALUES (?, ?, ?, ?, ?, ?)",
                [$data['title'], $data['description'], $imageName, $data['icon'], $data['order_index'], $isActive]);
        }
        $message = 'Data berhasil disimpan.';
        $action = 'list';
    }
}

// Handle delete
if ($action === 'delete' && $id > 0) {
    $item = db()->fetch("SELECT image FROM focus_areas WHERE id = ?", [$id]);
    if (!empty($item['image'])) {
        deleteFile(UPLOAD_PATH . '/images/' . $item['image']);
    }
    db()->query("DELETE FROM focus_areas WHERE id = ?", [$id]);
    $message = 'Data berhasil dihapus.';
    $action = 'list';
}

$focusArea = ($action === 'edit' && $id > 0) ? db()->fetch("SELECT * FROM focus_areas WHERE id = ?", [$id]) : null;
?>

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
    <h1 class="text-xl sm:text-2xl font-bold text-white">
        <i class="fas fa-crosshairs text-pastel-lavender mr-2"></i>Bidang Fokus
    </h1>
    <?php if ($action === 'list'): ?>
    <a href="<?= baseUrl('admin/?p=focus-areas&action=add') ?>" class="inline-flex items-center justify-center px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-500 text-sm sm:text-base">
        <i class="fas fa-plus mr-2"></i>Tambah
    </a>
    <?php else: ?>
    <a href="<?= baseUrl('admin/?p=focus-areas') ?>" class="inline-flex items-center justify-center px-4 py-2 bg-gray-700 text-gray-300 rounded-lg hover:bg-gray-600 text-sm sm:text-base">
        <i class="fas fa-arrow-left mr-2"></i>Kembali
    </a>
    <?php endif; ?>
</div>

<?php if ($message): ?>
<div class="bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-lg mb-6">
    <i class="fas fa-check-circle mr-2"></i><?= $message ?>
</div>
<?php endif; ?>

<?php if ($action === 'list'): ?>
<?php $items = db()->fetchAll("SELECT * FROM focus_areas ORDER BY order_index ASC"); ?>

<!-- Grid View -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
    <?php if (!empty($items)): ?>
    <?php foreach ($items as $item): ?>
    <div class="bg-gray-800 rounded-xl border border-gray-700 overflow-hidden hover:border-gray-600 transition-colors">
        <!-- Image -->
        <div class="h-40 bg-gradient-to-br from-pastel-lavender/20 to-pastel-sky/20 relative overflow-hidden">
            <?php if (!empty($item['image'])): ?>
            <img src="<?= uploadUrl('images/' . $item['image']) ?>" alt="" class="w-full h-full object-cover">
            <?php else: ?>
            <div class="w-full h-full flex items-center justify-center">
                <i class="fas fa-<?= htmlspecialchars($item['icon'] ?? 'crosshairs') ?> text-pastel-lavender text-4xl opacity-50"></i>
            </div>
            <?php endif; ?>
            
            <!-- Status Badge -->
            <div class="absolute top-3 right-3">
                <span class="px-2 py-1 text-xs rounded-full <?= $item['is_active'] ? 'bg-green-500/20 text-green-400' : 'bg-gray-500/20 text-gray-400' ?>">
                    <?= $item['is_active'] ? 'Aktif' : 'Nonaktif' ?>
                </span>
            </div>
        </div>
        
        <!-- Content -->
        <div class="p-4">
            <div class="flex items-start space-x-3 mb-3">
                <div class="w-10 h-10 bg-pastel-lavender/20 rounded-lg flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-<?= htmlspecialchars($item['icon'] ?? 'crosshairs') ?> text-pastel-lavender"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-white font-semibold truncate"><?= htmlspecialchars($item['title']) ?></h3>
                    <p class="text-gray-500 text-xs">Urutan: <?= $item['order_index'] ?></p>
                </div>
            </div>
            
            <p class="text-gray-400 text-sm line-clamp-2 mb-4"><?= htmlspecialchars(truncateText($item['description'], 100)) ?></p>
            
            <div class="flex justify-end space-x-4 pt-3 border-t border-gray-700">
                <a href="<?= baseUrl('admin/?p=focus-areas&action=edit&id=' . $item['id']) ?>" class="text-cyan-400 hover:text-cyan-300 text-sm">
                    <i class="fas fa-edit mr-1"></i>Edit
                </a>
                <a href="<?= baseUrl('admin/?p=focus-areas&action=delete&id=' . $item['id']) ?>" onclick="return confirmDelete()" class="text-red-400 hover:text-red-300 text-sm">
                    <i class="fas fa-trash mr-1"></i>Hapus
                </a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
    <div class="col-span-full bg-gray-800 rounded-xl border border-gray-700 p-8 text-center text-gray-500">
        <i class="fas fa-crosshairs text-4xl mb-4 opacity-50"></i>
        <p>Belum ada bidang fokus.</p>
    </div>
    <?php endif; ?>
</div>

<?php else: ?>
<!-- Form -->
<div class="bg-gray-800 rounded-xl border border-gray-700 p-4 sm:p-6">
    <form method="POST" enctype="multipart/form-data" class="space-y-4 sm:space-y-6">
        <?= csrf_field() ?>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
            <div>
                <label class="block text-gray-300 text-sm mb-2">Judul *</label>
                <input type="text" name="title" required value="<?= htmlspecialchars($focusArea['title'] ?? '') ?>" 
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500">
            </div>
            <div>
                <label class="block text-gray-300 text-sm mb-2">Icon (FontAwesome)</label>
                <input type="text" name="icon" value="<?= htmlspecialchars($focusArea['icon'] ?? '') ?>" placeholder="shield-alt, network-wired, etc" 
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
            </div>
        </div>
        
        <div>
            <label class="block text-gray-300 text-sm mb-2">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500"><?= htmlspecialchars($focusArea['description'] ?? '') ?></textarea>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
            <div>
                <label class="block text-gray-300 text-sm mb-2">Gambar</label>
                <input type="file" name="image" accept="image/*" 
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:bg-cyan-600 file:text-white hover:file:bg-cyan-500">
                <?php if (!empty($focusArea['image'])): ?>
                <div class="mt-2 flex items-center space-x-2">
                    <img src="<?= uploadUrl('images/' . $focusArea['image']) ?>" class="w-16 h-16 object-cover rounded-lg">
                    <span class="text-gray-500 text-sm">Gambar saat ini</span>
                </div>
                <?php endif; ?>
            </div>
            <div>
                <label class="block text-gray-300 text-sm mb-2">Urutan</label>
                <input type="number" name="order_index" value="<?= $focusArea['order_index'] ?? 0 ?>" 
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
            </div>
        </div>
        
        <label class="flex items-center">
            <input type="checkbox" name="is_active" <?= ($focusArea['is_active'] ?? true) ? 'checked' : '' ?> 
                   class="w-4 h-4 text-cyan-600 bg-gray-700 border-gray-600 rounded">
            <span class="ml-2 text-gray-300">Aktif</span>
        </label>
        
        <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-cyan-600 text-white font-semibold rounded-lg hover:bg-cyan-500 transition-colors">
            <i class="fas fa-save mr-2"></i>Simpan
        </button>
    </form>
</div>
<?php endif; ?>

