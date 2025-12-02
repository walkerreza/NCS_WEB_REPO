<?php
/**
 * Admin Agenda Management
 */

$action = sanitize($_GET['action'] ?? 'list');
$id = (int)($_GET['id'] ?? 0);
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf($_POST['csrf_token'] ?? '')) {
        $error = 'Token tidak valid.';
    } else {
        $data = [
            'title' => sanitize($_POST['title'] ?? ''),
            'description' => sanitize($_POST['description'] ?? ''),
            'event_date' => sanitize($_POST['event_date'] ?? ''),
            'event_time' => sanitize($_POST['event_time'] ?? ''),
            'location' => sanitize($_POST['location'] ?? ''),
            'is_featured' => isset($_POST['is_featured']),
            'is_active' => isset($_POST['is_active'])
        ];
        
        if (empty($data['title']) || empty($data['event_date'])) {
            $error = 'Judul dan tanggal wajib diisi.';
        } else {
            $imagePath = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $upload = uploadFile($_FILES['image'], IMAGE_PATH, ['jpg', 'jpeg', 'png', 'gif'], 2097152);
                if ($upload['success']) {
                    $imagePath = $upload['filename'];
                }
            }
            
            try {
                // Convert boolean values for PostgreSQL
                $isFeatured = $data['is_featured'] ? 'true' : 'false';
                $isActive = $data['is_active'] ? 'true' : 'false';
                
                if ($action === 'edit' && $id > 0) {
                    $sql = "UPDATE agenda SET title = ?, description = ?, event_date = ?, event_time = ?, location = ?, is_featured = ?, is_active = ?, updated_at = CURRENT_TIMESTAMP";
                    $params = [$data['title'], $data['description'], $data['event_date'], $data['event_time'] ?: null, $data['location'], $isFeatured, $isActive];
                    
                    if ($imagePath) {
                        $sql .= ", image = ?";
                        $params[] = $imagePath;
                    }
                    
                    $sql .= " WHERE id = ?";
                    $params[] = $id;
                    
                    db()->query($sql, $params);
                    $message = 'Agenda berhasil diperbarui.';
                } else {
                    $userId = $_SESSION['user_id'] ?? null;
                    db()->query(
                        "INSERT INTO agenda (title, description, event_date, event_time, location, image, is_featured, is_active, created_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)",
                        [$data['title'], $data['description'], $data['event_date'], $data['event_time'] ?: null, $data['location'], $imagePath, $isFeatured, $isActive, $userId]
                    );
                    $message = 'Agenda berhasil ditambahkan.';
                    $action = 'list';
                }
            } catch (Exception $e) {
                $error = 'Terjadi kesalahan: ' . $e->getMessage();
            }
        }
    }
}

if ($action === 'delete' && $id > 0) {
    db()->query("DELETE FROM agenda WHERE id = ?", [$id]);
    $message = 'Agenda berhasil dihapus.';
    $action = 'list';
}

$agenda = null;
if ($action === 'edit' && $id > 0) {
    $agenda = db()->fetch("SELECT * FROM agenda WHERE id = ?", [$id]);
}
?>

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
    <h1 class="text-xl sm:text-2xl font-bold text-white">Manajemen Agenda</h1>
    <?php if ($action === 'list'): ?>
    <a href="<?= baseUrl('admin/?p=agenda&action=add') ?>" class="inline-flex items-center justify-center px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-500 text-sm sm:text-base">
        <i class="fas fa-plus mr-2"></i>Tambah Agenda
    </a>
    <?php else: ?>
    <a href="<?= baseUrl('admin/?p=agenda') ?>" class="inline-flex items-center justify-center px-4 py-2 bg-gray-700 text-gray-300 rounded-lg hover:bg-gray-600 text-sm sm:text-base">
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
<?php $items = db()->fetchAll("SELECT * FROM agenda ORDER BY event_date DESC"); ?>

<!-- Mobile Cards View -->
<div class="block sm:hidden space-y-4">
    <?php if (!empty($items)): ?>
    <?php foreach ($items as $item): ?>
    <div class="bg-gray-800 rounded-xl border border-gray-700 p-4">
        <div class="flex items-start justify-between">
            <div class="flex-1 min-w-0">
                <p class="text-white font-medium"><?= htmlspecialchars($item['title']) ?></p>
                <div class="flex flex-wrap items-center gap-2 mt-2 text-sm">
                    <span class="text-gray-400"><i class="fas fa-calendar mr-1"></i><?= formatDate($item['event_date'], 'd M Y') ?></span>
                    <?php if ($item['location']): ?>
                    <span class="text-gray-400"><i class="fas fa-map-marker-alt mr-1"></i><?= htmlspecialchars($item['location']) ?></span>
                    <?php endif; ?>
                </div>
                <span class="inline-block mt-2 px-2 py-1 text-xs rounded-full <?= $item['is_active'] ? 'bg-green-500/20 text-green-400' : 'bg-gray-500/20 text-gray-400' ?>">
                    <?= $item['is_active'] ? 'Aktif' : 'Nonaktif' ?>
                </span>
            </div>
        </div>
        <div class="flex justify-end space-x-4 mt-3 pt-3 border-t border-gray-700">
            <a href="<?= baseUrl('admin/?p=agenda&action=edit&id=' . $item['id']) ?>" class="text-cyan-400 hover:text-cyan-300 text-sm">
                <i class="fas fa-edit mr-1"></i>Edit
            </a>
            <a href="<?= baseUrl('admin/?p=agenda&action=delete&id=' . $item['id']) ?>" onclick="return confirmDelete()" class="text-red-400 hover:text-red-300 text-sm">
                <i class="fas fa-trash mr-1"></i>Hapus
            </a>
        </div>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
    <div class="bg-gray-800 rounded-xl border border-gray-700 p-8 text-center text-gray-500">Belum ada agenda.</div>
    <?php endif; ?>
</div>

<!-- Desktop Table View -->
<div class="hidden sm:block bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-4 lg:px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Agenda</th>
                    <th class="px-4 lg:px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Tanggal</th>
                    <th class="px-4 lg:px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Lokasi</th>
                    <th class="px-4 lg:px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Status</th>
                    <th class="px-4 lg:px-6 py-4 text-right text-xs font-medium text-gray-400 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                <?php foreach ($items as $item): ?>
                <tr class="hover:bg-gray-700/50">
                    <td class="px-4 lg:px-6 py-4">
                        <p class="text-white font-medium"><?= htmlspecialchars($item['title']) ?></p>
                    </td>
                    <td class="px-4 lg:px-6 py-4 text-gray-400 whitespace-nowrap"><?= formatDate($item['event_date'], 'd M Y') ?></td>
                    <td class="px-4 lg:px-6 py-4 text-gray-400"><?= htmlspecialchars($item['location'] ?: '-') ?></td>
                    <td class="px-4 lg:px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded-full <?= $item['is_active'] ? 'bg-green-500/20 text-green-400' : 'bg-gray-500/20 text-gray-400' ?>">
                            <?= $item['is_active'] ? 'Aktif' : 'Nonaktif' ?>
                        </span>
                    </td>
                    <td class="px-4 lg:px-6 py-4 text-right whitespace-nowrap">
                        <a href="<?= baseUrl('admin/?p=agenda&action=edit&id=' . $item['id']) ?>" class="text-cyan-400 hover:text-cyan-300 mr-3"><i class="fas fa-edit"></i></a>
                        <a href="<?= baseUrl('admin/?p=agenda&action=delete&id=' . $item['id']) ?>" onclick="return confirmDelete()" class="text-red-400 hover:text-red-300"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($items)): ?>
                <tr><td colspan="5" class="px-6 py-8 text-center text-gray-500">Belum ada agenda.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php else: ?>
<div class="bg-gray-800 rounded-xl border border-gray-700 p-4 sm:p-6">
    <form method="POST" enctype="multipart/form-data" class="space-y-4 sm:space-y-6">
        <?= csrf_field() ?>
        
        <div>
            <label class="block text-gray-300 text-sm font-medium mb-2">Judul *</label>
            <input type="text" name="title" required value="<?= htmlspecialchars($agenda['title'] ?? '') ?>"
                   class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
        </div>
        
        <div>
            <label class="block text-gray-300 text-sm font-medium mb-2">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500"><?= htmlspecialchars($agenda['description'] ?? '') ?></textarea>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            <div>
                <label class="block text-gray-300 text-sm font-medium mb-2">Tanggal *</label>
                <input type="date" name="event_date" required value="<?= $agenda['event_date'] ?? '' ?>"
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
            </div>
            <div>
                <label class="block text-gray-300 text-sm font-medium mb-2">Waktu</label>
                <input type="time" name="event_time" value="<?= $agenda['event_time'] ?? '' ?>"
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
            </div>
            <div class="sm:col-span-2 lg:col-span-1">
                <label class="block text-gray-300 text-sm font-medium mb-2">Lokasi</label>
                <input type="text" name="location" value="<?= htmlspecialchars($agenda['location'] ?? '') ?>"
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
            </div>
        </div>
        
        <div>
            <label class="block text-gray-300 text-sm font-medium mb-2">Gambar</label>
            <input type="file" name="image" accept="image/*"
                   class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-cyan-600 file:text-white">
        </div>
        
        <div class="flex flex-wrap items-center gap-4 sm:gap-6">
            <label class="flex items-center">
                <input type="checkbox" name="is_featured" <?= ($agenda['is_featured'] ?? false) ? 'checked' : '' ?> class="w-4 h-4 text-cyan-600 bg-gray-700 border-gray-600 rounded">
                <span class="ml-2 text-gray-300">Featured</span>
            </label>
            <label class="flex items-center">
                <input type="checkbox" name="is_active" <?= ($agenda['is_active'] ?? true) ? 'checked' : '' ?> class="w-4 h-4 text-cyan-600 bg-gray-700 border-gray-600 rounded">
                <span class="ml-2 text-gray-300">Aktif</span>
            </label>
        </div>
        
        <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-cyan-600 text-white font-semibold rounded-lg hover:bg-cyan-500">
            <i class="fas fa-save mr-2"></i>Simpan
        </button>
    </form>
</div>
<?php endif; ?>

