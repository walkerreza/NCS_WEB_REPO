<?php
/**
 * Admin Login Page - Responsive & Pastel Theme
 */

$error = '';

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitize($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($username) || empty($password)) {
        $error = 'Username dan password wajib diisi.';
    } else {
        try {
            $user = db()->fetch(
                "SELECT * FROM users WHERE (username = ? OR email = ?) AND is_active = TRUE",
                [$username, $username]
            );
            
            if ($user && password_verify($password, $user['password'])) {
                // Set session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['full_name'];
                $_SESSION['user_role'] = $user['role'];
                
                // Update last login
                db()->query("UPDATE users SET last_login = CURRENT_TIMESTAMP WHERE id = ?", [$user['id']]);
                
                redirect(baseUrl('admin/?p=dashboard'));
            } else {
                $error = 'Username atau password salah.';
            }
        } catch (Exception $e) {
            $error = 'Terjadi kesalahan sistem. Silakan coba lagi.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel | NCS Laboratory</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-900 min-h-screen flex items-center justify-center p-4">
    <!-- Background Effects - Pastel -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute w-72 sm:w-96 h-72 sm:h-96 -top-36 sm:-top-48 -left-36 sm:-left-48 bg-[#88c9c9]/15 rounded-full blur-3xl"></div>
        <div class="absolute w-72 sm:w-96 h-72 sm:h-96 -bottom-36 sm:-bottom-48 -right-36 sm:-right-48 bg-[#c3b1e1]/15 rounded-full blur-3xl"></div>
    </div>
    
    <!-- Login Card -->
    <div class="w-full max-w-md relative z-10">
        <!-- Logo -->
        <div class="text-center mb-6 sm:mb-8">
            <div class="w-16 h-16 sm:w-20 sm:h-20 bg-gradient-to-br from-[#88c9c9] to-[#a7c5eb] rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg shadow-[#88c9c9]/20">
                <i class="fas fa-shield-alt text-gray-800 text-2xl sm:text-3xl"></i>
            </div>
            <h1 class="font-display text-xl sm:text-2xl font-bold text-white">NCS Laboratory</h1>
            <p class="text-gray-400 text-sm mt-1">Admin Panel</p>
        </div>
        
        <!-- Login Form -->
        <div class="bg-gray-800 rounded-2xl p-6 sm:p-8 border border-gray-700 shadow-xl">
            <h2 class="text-lg sm:text-xl font-semibold text-white mb-6 text-center">
                <i class="fas fa-lock text-[#88c9c9] mr-2"></i>Login
            </h2>
            
            <?php if ($error): ?>
            <div class="bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-lg mb-6 text-sm">
                <i class="fas fa-exclamation-circle mr-2"></i><?= htmlspecialchars($error) ?>
            </div>
            <?php endif; ?>
            
            <form method="POST" class="space-y-4 sm:space-y-5">
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-2">Username / Email</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" name="username" required autofocus
                               class="w-full pl-12 pr-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-500 focus:border-[#88c9c9] focus:ring-1 focus:ring-[#88c9c9] transition-all text-sm sm:text-base"
                               placeholder="Masukkan username atau email">
                    </div>
                </div>
                
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-2">Password</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" name="password" required id="password"
                               class="w-full pl-12 pr-12 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-500 focus:border-[#88c9c9] focus:ring-1 focus:ring-[#88c9c9] transition-all text-sm sm:text-base"
                               placeholder="Masukkan password">
                        <button type="button" onclick="togglePassword()" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-300 transition-colors">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>
                
                <button type="submit" class="w-full py-3 bg-gradient-to-r from-[#88c9c9] to-[#a7c5eb] text-gray-800 font-semibold rounded-lg hover:opacity-90 transition-all shadow-lg shadow-[#88c9c9]/20 text-sm sm:text-base">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login
                </button>
            </form>
            
            <div class="mt-6 text-center">
                <a href="<?= baseUrl() ?>" class="text-gray-400 hover:text-[#88c9c9] text-sm transition-colors">
                    <i class="fas fa-arrow-left mr-1"></i>Kembali ke Website
                </a>
            </div>
        </div>
        
        <!-- Footer -->
        <p class="text-center text-gray-500 text-xs mt-6">
            &copy; <?= date('Y') ?> NCS Laboratory. All rights reserved.
        </p>
    </div>
    
    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const icon = document.getElementById('toggleIcon');
            
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
