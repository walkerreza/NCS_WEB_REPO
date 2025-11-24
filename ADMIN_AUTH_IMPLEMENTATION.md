# 🔐 Admin Authentication Implementation

## ✅ Yang Sudah Diimplementasikan

### 1. **Login Restriction - Admin Only**

Hanya user dengan role `admin` yang bisa login ke dashboard admin.

#### File yang Dimodifikasi:

**`app/Http/Controllers/Auth/AuthenticatedSessionController.php`**
- Ditambahkan pengecekan role setelah autentikasi berhasil
- Jika bukan admin, logout otomatis dan redirect ke login dengan error message

```php
public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();
    $request->session()->regenerate();

    // Check if user is admin
    if (! Auth::user()->isAdmin()) {
        Auth::guard('web')->logout();
        
        return redirect()->route('login')->withErrors([
            'email' => 'Access denied. Only administrators can login to this panel.',
        ]);
    }

    return redirect()->intended(route('admin.dashboard', absolute: false));
}
```

---

### 2. **Middleware Protection - All Admin Routes**

Semua route admin dilindungi dengan middleware `role:admin`.

**`routes/web.php`**
```php
Route::prefix('admin')
    ->middleware(['auth', 'verified', 'role:admin'])
    ->name('admin.')
    ->group(function () {
        // All admin routes protected
    });
```

---

### 3. **Enhanced CheckRole Middleware**

Middleware sudah di-update untuk handle web dan API request.

**`app/Http/Middleware/CheckRole.php`**

**Features:**
- ✅ Cek authentication
- ✅ Cek role sesuai requirement
- ✅ Handle web request (redirect)
- ✅ Handle API request (JSON response)
- ✅ Logout otomatis jika akses ditolak

---

## 🔒 Security Flow

### Login Process:

```
1. User mengisi form login
   ↓
2. Validasi credentials (email + password)
   ↓
3. Authentication berhasil
   ↓
4. CHECK: Apakah user adalah admin?
   ├─ YA → Redirect ke dashboard
   └─ TIDAK → Logout + Error message + Redirect ke login
```

### Accessing Admin Pages:

```
1. Request ke /admin/*
   ↓
2. Middleware 'auth' - Cek sudah login?
   ├─ TIDAK → Redirect ke login
   └─ YA → Lanjut
       ↓
3. Middleware 'role:admin' - Cek role = admin?
   ├─ TIDAK → Logout + Error + Redirect ke login
   └─ YA → Akses diberikan
```

---

## 👥 User Roles

### Admin
- ✅ Dapat login ke dashboard
- ✅ Akses semua fitur admin
- ✅ Kelola konten website

### Guest
- ❌ Tidak bisa login ke dashboard
- ✅ Hanya akses frontend public
- ⚠️ Error message saat coba login

---

## 🧪 Testing

### Test Case 1: Admin Login (Success)
```
Email: admin@test.com
Role: admin
Expected: ✓ Login berhasil → Dashboard
```

### Test Case 2: Guest Login (Denied)
```
Email: guest@test.com
Role: guest
Expected: ✗ Login ditolak → Error message
```

### Test Case 3: Direct Access Admin Route
```
Scenario: User guest langsung akses /admin/dashboard
Expected: ✗ Redirect ke login dengan error
```

---

## 🗄️ Database Structure

### Users Table:
```sql
- id (bigint)
- name (varchar)
- email (varchar) - unique
- password (varchar)
- role (varchar) - 'admin' or 'guest'
- remember_token (varchar)
- created_at (timestamp)
- updated_at (timestamp)
```

### Check Constraint:
```sql
users_role_check: role IN ('admin', 'guest')
```

---

## 📝 User Model Methods

**`app/Models/User.php`**

```php
// Check if user is admin
public function isAdmin(): bool
{
    return $this->role === 'admin';
}

// Check if user is guest
public function isGuest(): bool
{
    return $this->role === 'guest';
}
```

---

## 🔧 Configuration

### Middleware Registration
**`bootstrap/app.php`**
```php
$middleware->alias([
    'role' => \App\Http\Middleware\CheckRole::class,
]);
```

### Redirect Configuration
```php
$middleware->redirectGuestsTo('/login');
$middleware->redirectUsersTo('/admin/dashboard');
```

---

## 📋 Error Messages

### Login Page Errors:

1. **Non-Admin Trying to Login:**
   ```
   "Access denied. Only administrators can login to this panel."
   ```

2. **Direct Route Access by Guest:**
   ```
   "Access denied. You do not have permission to access this page."
   ```

3. **Not Authenticated:**
   ```
   "Please login to access this page."
   ```

---

## 🚀 Usage Examples

### Creating Admin User (via Tinker):
```php
php artisan tinker

User::create([
    'name' => 'Admin NCS',
    'email' => 'admin@ncs.com',
    'password' => bcrypt('password'),
    'role' => 'admin'
]);
```

### Creating Guest User:
```php
User::create([
    'name' => 'Guest User',
    'email' => 'guest@example.com',
    'password' => bcrypt('password'),
    'role' => 'guest'
]);
```

### Check User Role:
```php
$user = User::find(1);

if ($user->isAdmin()) {
    echo "User is admin";
}

if ($user->isGuest()) {
    echo "User is guest";
}
```

---

## 🎯 Protected Routes

All routes under `/admin/*` are protected:

- ✅ `/admin/dashboard`
- ✅ `/admin/visi-misi`
- ✅ `/admin/logo`
- ✅ `/admin/struktur-organisasi`
- ✅ `/admin/galeri`
- ✅ `/admin/penelitian`
- ✅ `/admin/pengabdian`
- ✅ `/admin/sarana-prasarana`
- ✅ `/admin/konsul`
- ✅ `/admin/link`

---

## ✨ Benefits

1. **Security First**
   - Double protection: Login check + Route check
   - Automatic logout jika akses ditolak

2. **User Experience**
   - Clear error messages
   - Proper redirects
   - No confusion

3. **Maintainable**
   - Centralized middleware
   - Easy to extend
   - Clean code

4. **Flexible**
   - Works for web and API
   - Easy to add more roles
   - Scalable architecture

---

## 🔄 Future Enhancements (Optional)

1. **Multiple Admin Levels:**
   ```php
   - super_admin
   - admin
   - moderator
   - guest
   ```

2. **Permission System:**
   ```php
   - can('edit_posts')
   - can('delete_users')
   - can('manage_settings')
   ```

3. **Activity Logging:**
   ```php
   - Track login attempts
   - Log admin actions
   - Monitor access patterns
   ```

---

## 📞 Support

Jika ada masalah:
1. Check user role di database
2. Verify middleware registration
3. Clear cache: `php artisan config:clear`
4. Check Laravel logs: `storage/logs/laravel.log`

---

**Status:** ✅ IMPLEMENTED & TESTED
**Last Updated:** 2025-11-24
**Version:** 1.0

---

**Implementasi selesai! Hanya admin yang bisa login ke dashboard! 🔐**

