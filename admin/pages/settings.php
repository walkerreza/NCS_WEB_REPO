<?php
/**
 * Admin Settings Page
 */

$message = '';
$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf($_POST['csrf_token'] ?? '')) {
        $error = 'Token tidak valid.';
    } else {
        $settingsToUpdate = [
            'site_name', 'site_tagline', 'site_description', 'contact_email',
            'contact_phone', 'contact_address', 'pendahuluan', 'visi', 'misi', 'footer_text',
            'social_instagram', 'social_youtube', 'social_github'
        ];
        
        foreach ($settingsToUpdate as $key) {
            if (isset($_POST[$key])) {
                updateSetting($key, $_POST[$key]);
            }
        }
        
        // Handle logo upload
        if (isset($_FILES['site_logo']) && $_FILES['site_logo']['error'] === UPLOAD_ERR_OK) {
            $upload = uploadFile($_FILES['site_logo'], IMAGE_PATH, ['jpg', 'jpeg', 'png', 'gif'], 2097152);
            if ($upload['success']) {
                updateSetting('site_logo', $upload['filename']);
            } else {
                $error = 'Gagal upload logo: ' . $upload['message'];
            }
        }
        
        if (empty($error)) {
            $message = 'Pengaturan berhasil disimpan.';
            // Reload settings
            $settings = getAllSettings();
        }
    }
}
?>

<!-- Page Header -->
<div class="mb-8">
    <h1 class="text-xl sm:text-2xl font-bold text-white">Pengaturan</h1>
    <p class="text-gray-400 text-sm mt-1">Kelola pengaturan website</p>
</div>

<!-- Messages -->
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

<form method="POST" enctype="multipart/form-data" class="space-y-6">
    <?= csrf_field() ?>
    
    <!-- General Settings -->
    <div class="bg-gray-800 rounded-xl border border-gray-700 p-4 sm:p-6">
        <h2 class="text-lg font-semibold text-white mb-6">
            <i class="fas fa-globe text-cyan-400 mr-2"></i>Informasi Website
        </h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
            <div>
                <label class="block text-gray-300 text-sm font-medium mb-2">Nama Website</label>
                <input type="text" name="site_name" value="<?= htmlspecialchars($settings['site_name'] ?? 'NCS Laboratory') ?>"
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
            </div>
            
            <div>
                <label class="block text-gray-300 text-sm font-medium mb-2">Tagline</label>
                <input type="text" name="site_tagline" value="<?= htmlspecialchars($settings['site_tagline'] ?? '') ?>"
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
            </div>
        </div>
        
        <div class="mt-4 sm:mt-6">
            <label class="block text-gray-300 text-sm font-medium mb-2">Deskripsi Website</label>
            <textarea name="site_description" rows="3" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500"><?= htmlspecialchars($settings['site_description'] ?? '') ?></textarea>
        </div>
        
        <div class="mt-4 sm:mt-6">
            <label class="block text-gray-300 text-sm font-medium mb-2">Logo</label>
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                <?php if (!empty($settings['site_logo'])): ?>
                <img src="<?= uploadUrl('images/' . $settings['site_logo']) ?>" alt="Logo" class="h-16 w-auto">
                <?php endif; ?>
                <input type="file" name="site_logo" accept="image/*"
                       class="w-full sm:w-auto px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-cyan-600 file:text-white hover:file:bg-cyan-500">
            </div>
        </div>
    </div>
    
    <!-- Contact Settings -->
    <div class="bg-gray-800 rounded-xl border border-gray-700 p-4 sm:p-6">
        <h2 class="text-lg font-semibold text-white mb-6">
            <i class="fas fa-phone-alt text-green-400 mr-2"></i>Informasi Kontak
        </h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
            <div>
                <label class="block text-gray-300 text-sm font-medium mb-2">Email</label>
                <input type="email" name="contact_email" value="<?= htmlspecialchars($settings['contact_email'] ?? '') ?>"
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
            </div>
            
            <div>
                <label class="block text-gray-300 text-sm font-medium mb-2">Telepon</label>
                <input type="text" name="contact_phone" value="<?= htmlspecialchars($settings['contact_phone'] ?? '') ?>"
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
            </div>
        </div>
        
        <div class="mt-4 sm:mt-6">
            <label class="block text-gray-300 text-sm font-medium mb-2">Alamat</label>
            <textarea name="contact_address" rows="2" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500"><?= htmlspecialchars($settings['contact_address'] ?? '') ?></textarea>
        </div>
    </div>
    
    <!-- Profil Lab -->
    <div class="bg-gray-800 rounded-xl border border-gray-700 p-4 sm:p-6">
        <h2 class="text-lg font-semibold text-white mb-6">
            <i class="fas fa-bullseye text-purple-400 mr-2"></i>Profil Laboratorium
        </h2>
        
        <div class="space-y-4 sm:space-y-6">
            <div>
                <label class="block text-gray-300 text-sm font-medium mb-2">Pendahuluan / Tentang Lab</label>
                <textarea name="pendahuluan" rows="4" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500"><?= htmlspecialchars($settings['pendahuluan'] ?? '') ?></textarea>
                <p class="mt-1 text-gray-500 text-xs">Deskripsi singkat tentang laboratorium (ditampilkan di halaman Visi & Misi)</p>
            </div>
            
            <div>
                <label class="block text-gray-300 text-sm font-medium mb-2">Visi</label>
                <textarea name="visi" rows="3" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500"><?= htmlspecialchars($settings['visi'] ?? '') ?></textarea>
            </div>
            
            <div>
                <label class="block text-gray-300 text-sm font-medium mb-2">Misi (satu misi per baris)</label>
                <textarea name="misi" rows="5" class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500"><?= htmlspecialchars($settings['misi'] ?? '') ?></textarea>
            </div>
        </div>
    </div>
    
    <!-- Social Media -->
    <div class="bg-gray-800 rounded-xl border border-gray-700 p-4 sm:p-6">
        <h2 class="text-lg font-semibold text-white mb-6">
            <i class="fas fa-share-alt text-pink-400 mr-2"></i>Media Sosial
        </h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            <div>
                <label class="block text-gray-300 text-sm font-medium mb-2">
                    <i class="fab fa-instagram mr-1"></i>Instagram
                </label>
                <input type="url" name="social_instagram" value="<?= htmlspecialchars($settings['social_instagram'] ?? '') ?>"
                       placeholder="https://instagram.com/..."
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
            </div>
            
            <div>
                <label class="block text-gray-300 text-sm font-medium mb-2">
                    <i class="fab fa-youtube mr-1"></i>YouTube
                </label>
                <input type="url" name="social_youtube" value="<?= htmlspecialchars($settings['social_youtube'] ?? '') ?>"
                       placeholder="https://youtube.com/..."
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
            </div>
            
            <div class="sm:col-span-2 lg:col-span-1">
                <label class="block text-gray-300 text-sm font-medium mb-2">
                    <i class="fab fa-github mr-1"></i>GitHub
                </label>
                <input type="url" name="social_github" value="<?= htmlspecialchars($settings['social_github'] ?? '') ?>"
                       placeholder="https://github.com/..."
                       class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <div class="bg-gray-800 rounded-xl border border-gray-700 p-4 sm:p-6">
        <h2 class="text-lg font-semibold text-white mb-6">
            <i class="fas fa-copyright text-yellow-400 mr-2"></i>Footer
        </h2>
        
        <div>
            <label class="block text-gray-300 text-sm font-medium mb-2">Teks Footer</label>
            <input type="text" name="footer_text" value="<?= htmlspecialchars($settings['footer_text'] ?? '') ?>"
                   class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-cyan-500">
        </div>
    </div>
    
    <!-- Submit -->
    <div class="flex justify-center sm:justify-end">
        <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-cyan-600 text-white font-semibold rounded-lg hover:bg-cyan-500 transition-colors">
            <i class="fas fa-save mr-2"></i>Simpan Pengaturan
        </button>
    </div>
</form>

