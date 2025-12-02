<?php
/**
 * Admin Users Management
 */

$action = sanitize($_GET['action'] ?? 'list');
$id = (int)($_GET['id'] ?? 0);
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? '')) {
    $data = [
        'username' => sanitize($_POST['username'] ?? ''),
        'email' => filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL),
        'full_name' => sanitize($_POST['full_name'] ?? ''),
        'role' => sanitize($_POST['role'] ?? 'admin'),
        'is_active' => isset($_POST['is_active'])
    ];
    $password = $_POST['password'] ?? '';
    
    if (empty($data['username']) || !$data['email'] || empty($data['full_name'])) {
        $error = 'Data tidak lengkap.';
    } else {
        try {
            // Convert boolean for PostgreSQL
            $isActive = $data['is_active'] ? 'true' : 'false';
            
            if ($action === 'edit' && $id > 0) {
                $sql = "UPDATE users SET username = ?, email = ?, full_name = ?, role = ?, is_active = ?, updated_at = CURRENT_TIMESTAMP";
                $params = [$data['username'], $data['email'], $data['full_name'], $data['role'], $isActive];
                if (!empty($password)) { $sql .= ", password = ?"; $params[] = password_hash($password, PASSWORD_DEFAULT); }
                $sql .= " WHERE id = ?"; $params[] = $id;
                db()->query($sql, $params);
                $message = 'User berhasil diperbarui.';
            } else {
                if (empty($password)) { $error = 'Password wajib diisi.'; }
                else {
                    db()->query("INSERT INTO users (username, email, password, full_name, role, is_active) VALUES (?, ?, ?, ?, ?, ?)",
                        [$data['username'], $data['email'], password_hash($password, PASSWORD_DEFAULT), $data['full_name'], $data['role'], $isActive]);
                    $message = 'User berhasil ditambahkan.';
                    $action = 'list';
                }
            }
        } catch (Exception $e) { $error = 'Username atau email sudah digunakan.'; }
    }
}

if ($action === 'delete' && $id > 0 && $id !== $_SESSION['user_id']) {
    db()->query("DELETE FROM users WHERE id = ?", [$id]);
    $message = 'User berhasil dihapus.';
    $action = 'list';
}

$user = ($action === 'edit' && $id > 0) ? db()->fetch("SELECT * FROM users WHERE id = ?", [$id]) : null;
?>

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
    <h1 class="text-xl sm:text-2xl font-bold text-white">Manajemen User</h1>
    <?php if ($action === 'list'): ?>
    <a href="<?= baseUrl('admin/?p=users&action=add') ?>" class="inline-flex items-center justify-center px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-500 text-sm sm:text-base"><i class="fas fa-plus mr-2"></i>Tambah User</a>
    <?php else: ?>
    <a href="<?= baseUrl('admin/?p=users') ?>" class="inline-flex items-center justify-center px-4 py-2 bg-gray-700 text-gray-300 rounded-lg hover:bg-gray-600 text-sm sm:text-base"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
    <?php endif; ?>
</div>

<?php if ($message): ?><div class="bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-lg mb-6"><i class="fas fa-check-circle mr-2"></i><?= $message ?></div><?php endif; ?>
<?php if ($error): ?><div class="bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-lg mb-6"><i class="fas fa-exclamation-circle mr-2"></i><?= $error ?></div><?php endif; ?>

<?php if ($action === 'list'): ?>
<?php $users = db()->fetchAll("SELECT * FROM users ORDER BY created_at DESC"); ?>

<!-- Mobile Cards View -->
<div class="block sm:hidden space-y-4">
    <?php if (!empty($users)): ?>
    <?php foreach ($users as $u): ?>
    <div class="bg-gray-800 rounded-xl border border-gray-700 p-4">
        <div class="flex-1 min-w-0">
            <p class="text-white font-medium"><?= htmlspecialchars($u['full_name']) ?></p>
            <p class="text-gray-500 text-sm truncate"><?= htmlspecialchars($u['email']) ?></p>
            <div class="flex flex-wrap items-center gap-2 mt-2">
                <span class="px-2 py-1 text-xs rounded-full bg-cyan-500/20 text-cyan-400"><?= ucfirst($u['role']) ?></span>
                <span class="px-2 py-1 text-xs rounded-full <?= $u['is_active'] ? 'bg-green-500/20 text-green-400' : 'bg-gray-500/20 text-gray-400' ?>"><?= $u['is_active'] ? 'Aktif' : 'Nonaktif' ?></span>
            </div>
            <?php if ($u['last_login']): ?>
            <p class="text-gray-500 text-xs mt-2"><i class="fas fa-clock mr-1"></i>Login: <?= formatDate($u['last_login'], 'd M Y H:i') ?></p>
            <?php endif; ?>
        </div>
        <div class="flex justify-end space-x-4 mt-3 pt-3 border-t border-gray-700">
            <a href="<?= baseUrl('admin/?p=users&action=edit&id=' . $u['id']) ?>" class="text-cyan-400 hover:text-cyan-300 text-sm"><i class="fas fa-edit mr-1"></i>Edit</a>
            <?php if ($u['id'] !== $_SESSION['user_id']): ?>
            <a href="<?= baseUrl('admin/?p=users&action=delete&id=' . $u['id']) ?>" onclick="return confirmDelete()" class="text-red-400 hover:text-red-300 text-sm"><i class="fas fa-trash mr-1"></i>Hapus</a>
            <?php endif; ?>
        </div>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
    <div class="bg-gray-800 rounded-xl border border-gray-700 p-8 text-center text-gray-500">Belum ada user.</div>
    <?php endif; ?>
</div>

<!-- Desktop Table View -->
<div class="hidden sm:block bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-4 lg:px-6 py-4 text-left text-xs text-gray-400 uppercase">User</th>
                    <th class="px-4 lg:px-6 py-4 text-left text-xs text-gray-400 uppercase">Role</th>
                    <th class="px-4 lg:px-6 py-4 text-left text-xs text-gray-400 uppercase">Status</th>
                    <th class="px-4 lg:px-6 py-4 text-left text-xs text-gray-400 uppercase hidden lg:table-cell">Login Terakhir</th>
                    <th class="px-4 lg:px-6 py-4 text-right text-xs text-gray-400 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                <?php foreach ($users as $u): ?>
                <tr class="hover:bg-gray-700/50">
                    <td class="px-4 lg:px-6 py-4">
                        <p class="text-white font-medium"><?= htmlspecialchars($u['full_name']) ?></p>
                        <p class="text-gray-500 text-sm"><?= htmlspecialchars($u['email']) ?></p>
                    </td>
                    <td class="px-4 lg:px-6 py-4"><span class="px-2 py-1 text-xs rounded-full bg-cyan-500/20 text-cyan-400"><?= ucfirst($u['role']) ?></span></td>
                    <td class="px-4 lg:px-6 py-4"><span class="px-2 py-1 text-xs rounded-full <?= $u['is_active'] ? 'bg-green-500/20 text-green-400' : 'bg-gray-500/20 text-gray-400' ?>"><?= $u['is_active'] ? 'Aktif' : 'Nonaktif' ?></span></td>
                    <td class="px-4 lg:px-6 py-4 text-gray-400 text-sm hidden lg:table-cell whitespace-nowrap"><?= $u['last_login'] ? formatDate($u['last_login'], 'd M Y H:i') : '-' ?></td>
                    <td class="px-4 lg:px-6 py-4 text-right whitespace-nowrap">
                        <a href="<?= baseUrl('admin/?p=users&action=edit&id=' . $u['id']) ?>" class="text-cyan-400 hover:text-cyan-300 mr-3"><i class="fas fa-edit"></i></a>
                        <?php if ($u['id'] !== $_SESSION['user_id']): ?>
                        <a href="<?= baseUrl('admin/?p=users&action=delete&id=' . $u['id']) ?>" onclick="return confirmDelete()" class="text-red-400 hover:text-red-300"><i class="fas fa-trash"></i></a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php else: ?>
<div class="bg-gray-800 rounded-xl border border-gray-700 p-4 sm:p-6">
    <form method="POST" class="space-y-4 sm:space-y-6">
        <?= csrf_field() ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
            <div><label class="block text-gray-300 text-sm mb-2">Username *</label><input type="text" name="username" required value="<?= htmlspecialchars($user['username'] ?? '') ?>" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500"></div>
            <div><label class="block text-gray-300 text-sm mb-2">Email *</label><input type="email" name="email" required value="<?= htmlspecialchars($user['email'] ?? '') ?>" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500"></div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
            <div><label class="block text-gray-300 text-sm mb-2">Nama Lengkap *</label><input type="text" name="full_name" required value="<?= htmlspecialchars($user['full_name'] ?? '') ?>" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500"></div>
            <div><label class="block text-gray-300 text-sm mb-2">Password <?= $action === 'add' ? '*' : '(kosongkan jika tidak diubah)' ?></label><input type="password" name="password" <?= $action === 'add' ? 'required' : '' ?> class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500"></div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
            <div><label class="block text-gray-300 text-sm mb-2">Role</label>
                <select name="role" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
                    <option value="admin" <?= ($user['role'] ?? '') === 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="operator" <?= ($user['role'] ?? '') === 'operator' ? 'selected' : '' ?>>Operator</option>
                </select>
            </div>
        </div>
        <label class="flex items-center"><input type="checkbox" name="is_active" <?= ($user['is_active'] ?? true) ? 'checked' : '' ?> class="w-4 h-4 text-cyan-600 bg-gray-700 border-gray-600 rounded"><span class="ml-2 text-gray-300">Aktif</span></label>
        <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-cyan-600 text-white font-semibold rounded-lg hover:bg-cyan-500"><i class="fas fa-save mr-2"></i>Simpan</button>
    </form>
</div>
<?php endif; ?>

