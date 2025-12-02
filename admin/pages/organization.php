<?php
/**
 * Admin Organization Structure Management
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
            'name' => sanitize($_POST['name'] ?? ''),
            'position' => sanitize($_POST['position'] ?? ''),
            'email' => sanitize($_POST['email'] ?? ''),
            'phone' => sanitize($_POST['phone'] ?? ''),
            'order_index' => (int)($_POST['order_index'] ?? 0),
            'is_active' => isset($_POST['is_active'])
        ];
        
        if (empty($data['name']) || empty($data['position'])) {
            $error = 'Nama dan jabatan wajib diisi.';
        } else {
            $photoPath = null;
            if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                $upload = uploadFile($_FILES['photo'], IMAGE_PATH, ['jpg', 'jpeg', 'png'], 2097152);
                if ($upload['success']) $photoPath = $upload['filename'];
            }
            
            try {
                // Convert boolean for PostgreSQL
                $isActive = $data['is_active'] ? 'true' : 'false';
                
                if ($action === 'edit' && $id > 0) {
                    $sql = "UPDATE organization_structure SET name = ?, position = ?, email = ?, phone = ?, order_index = ?, is_active = ?, updated_at = CURRENT_TIMESTAMP";
                    $params = [$data['name'], $data['position'], $data['email'], $data['phone'], $data['order_index'], $isActive];
                    if ($photoPath) { $sql .= ", photo = ?"; $params[] = $photoPath; }
                    $sql .= " WHERE id = ?"; $params[] = $id;
                    db()->query($sql, $params);
                    $message = 'Data berhasil diperbarui.';
                } else {
                    db()->query("INSERT INTO organization_structure (name, position, email, phone, photo, order_index, is_active) VALUES (?, ?, ?, ?, ?, ?, ?)",
                        [$data['name'], $data['position'], $data['email'], $data['phone'], $photoPath, $data['order_index'], $isActive]);
                    $message = 'Data berhasil ditambahkan.';
                    $action = 'list';
                }
            } catch (Exception $e) { $error = 'Terjadi kesalahan: ' . $e->getMessage(); }
        }
    }
}

if ($action === 'delete' && $id > 0) {
    db()->query("DELETE FROM organization_structure WHERE id = ?", [$id]);
    $message = 'Data berhasil dihapus.';
    $action = 'list';
}

$member = null;
if ($action === 'edit' && $id > 0) {
    $member = db()->fetch("SELECT * FROM organization_structure WHERE id = ?", [$id]);
}
?>

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
    <h1 class="text-xl sm:text-2xl font-bold text-white">Struktur Organisasi</h1>
    <?php if ($action === 'list'): ?>
    <a href="<?= baseUrl('admin/?p=organization&action=add') ?>" class="inline-flex items-center justify-center px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-500 text-sm sm:text-base"><i class="fas fa-plus mr-2"></i>Tambah</a>
    <?php else: ?>
    <a href="<?= baseUrl('admin/?p=organization') ?>" class="inline-flex items-center justify-center px-4 py-2 bg-gray-700 text-gray-300 rounded-lg hover:bg-gray-600 text-sm sm:text-base"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
    <?php endif; ?>
</div>

<?php if ($message): ?>
<div class="bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-lg mb-6"><i class="fas fa-check-circle mr-2"></i><?= htmlspecialchars($message) ?></div>
<?php endif; ?>

<?php if ($action === 'list'): ?>
<?php $items = db()->fetchAll("SELECT * FROM organization_structure ORDER BY order_index ASC"); ?>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
    <?php foreach ($items as $item): ?>
    <div class="bg-gray-800 rounded-xl p-4 sm:p-6 border border-gray-700 text-center">
        <div class="w-16 sm:w-20 h-16 sm:h-20 mx-auto mb-3 sm:mb-4 bg-cyan-500 rounded-full flex items-center justify-center overflow-hidden">
            <?php if ($item['photo']): ?>
            <img src="<?= uploadUrl('images/' . $item['photo']) ?>" class="w-full h-full object-cover">
            <?php else: ?>
            <i class="fas fa-user text-white text-xl sm:text-2xl"></i>
            <?php endif; ?>
        </div>
        <h3 class="text-white font-semibold text-sm sm:text-base"><?= htmlspecialchars($item['name']) ?></h3>
        <p class="text-cyan-400 text-xs sm:text-sm"><?= htmlspecialchars($item['position']) ?></p>
        <div class="mt-3 sm:mt-4 flex justify-center space-x-4">
            <a href="<?= baseUrl('admin/?p=organization&action=edit&id=' . $item['id']) ?>" class="text-cyan-400 hover:text-cyan-300"><i class="fas fa-edit"></i></a>
            <a href="<?= baseUrl('admin/?p=organization&action=delete&id=' . $item['id']) ?>" onclick="return confirmDelete()" class="text-red-400 hover:text-red-300"><i class="fas fa-trash"></i></a>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php else: ?>
<div class="bg-gray-800 rounded-xl border border-gray-700 p-4 sm:p-6">
    <form method="POST" enctype="multipart/form-data" class="space-y-4 sm:space-y-6">
        <?= csrf_field() ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
            <div>
                <label class="block text-gray-300 text-sm mb-2">Nama *</label>
                <input type="text" name="name" required value="<?= htmlspecialchars($member['name'] ?? '') ?>" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
            </div>
            <div>
                <label class="block text-gray-300 text-sm mb-2">Jabatan *</label>
                <input type="text" name="position" required value="<?= htmlspecialchars($member['position'] ?? '') ?>" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
            <div>
                <label class="block text-gray-300 text-sm mb-2">Email</label>
                <input type="email" name="email" value="<?= htmlspecialchars($member['email'] ?? '') ?>" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
            </div>
            <div>
                <label class="block text-gray-300 text-sm mb-2">Telepon</label>
                <input type="text" name="phone" value="<?= htmlspecialchars($member['phone'] ?? '') ?>" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
            <div>
                <label class="block text-gray-300 text-sm mb-2">Foto</label>
                <input type="file" name="photo" accept="image/*" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-cyan-600 file:text-white">
            </div>
            <div>
                <label class="block text-gray-300 text-sm mb-2">Urutan</label>
                <input type="number" name="order_index" value="<?= $member['order_index'] ?? 0 ?>" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
            </div>
        </div>
        <label class="flex items-center">
            <input type="checkbox" name="is_active" <?= ($member['is_active'] ?? true) ? 'checked' : '' ?> class="w-4 h-4 text-cyan-600 bg-gray-700 border-gray-600 rounded">
            <span class="ml-2 text-gray-300">Aktif</span>
        </label>
        <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-cyan-600 text-white font-semibold rounded-lg hover:bg-cyan-500"><i class="fas fa-save mr-2"></i>Simpan</button>
    </form>
</div>
<?php endif; ?>

