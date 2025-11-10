# 🚀 Panduan Instalasi Backend Lab NCS

## Persyaratan Sistem

### Software yang Dibutuhkan
- **PHP**: >= 8.2
- **Composer**: Latest version
- **Node.js & NPM**: >= 18.x
- **MySQL/MariaDB**: >= 8.0
- **Git**: Latest version

### Extensions PHP yang Dibutuhkan
Pastikan extensions berikut ter-enable di `php.ini`:
```
extension=fileinfo
extension=gd
extension=mbstring
extension=pdo_mysql
extension=openssl
extension=zip
```

---

## 📥 Langkah Instalasi

### 1. Clone Repository
```bash
git clone <repository-url> Backend-NCS-Laravel
cd Backend-NCS-Laravel
```

### 2. Install Dependencies PHP
```bash
composer install
```

**Catatan**: Jika mendapat error, coba:
```bash
composer install --ignore-platform-reqs
```

### 3. Install Dependencies JavaScript
```bash
npm install
```

### 4. Setup Environment File
```bash
# Windows
copy .env.example .env

# Linux/Mac
cp .env.example .env
```

### 5. Generate Application Key
```bash
php artisan key:generate
```

### 6. Konfigurasi Database

Edit file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lab_ncs
DB_USERNAME=root
DB_PASSWORD=your_password
```

**Buat Database:**
```sql
CREATE DATABASE lab_ncs CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 7. Run Migrations & Seeders
```bash
php artisan migrate:fresh --seed
```

**Output yang diharapkan:**
```
✅ Seeder berhasil dijalankan!
📧 Admin Email: admin@ncs.lab
🔑 Password: password
```

### 8. Buat Storage Link
```bash
php artisan storage:link
```

**Output yang diharapkan:**
```
INFO The [public/storage] link has been connected to [storage/app/public]
```

### 9. Build Assets (Opsional)
```bash
# Development
npm run dev

# Production
npm run build
```

### 10. Jalankan Development Server
```bash
php artisan serve
```

Server akan berjalan di: **http://localhost:8000**

---

## 🧪 Verifikasi Instalasi

### 1. Test Database Connection
```bash
php artisan tinker
>>> DB::connection()->getPdo();
```

Jika berhasil, akan muncul object PDO.

### 2. Test API Endpoints

#### Public Endpoint
```bash
curl http://localhost:8000/api/settings
```

#### Login Test
```bash
curl -X POST http://localhost:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{"email":"admin@ncs.lab","password":"password"}'
```

### 3. Cek Storage Permission
```bash
# Windows PowerShell
Test-Path public/storage

# Linux/Mac
ls -la public/storage
```

---

## 🐛 Troubleshooting

### Error: "No application encryption key"
```bash
php artisan key:generate
```

### Error: "SQLSTATE[HY000] [1045] Access denied"
- Cek username & password database di `.env`
- Pastikan MySQL service berjalan

### Error: "Class not found"
```bash
composer dump-autoload
```

### Error: Storage tidak bisa write
```bash
# Windows (Run as Administrator)
icacls storage /grant Users:F /t
icacls bootstrap/cache /grant Users:F /t

# Linux/Mac
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### Error: NPM install gagal
```bash
# Clear cache
npm cache clean --force

# Install ulang
rm -rf node_modules package-lock.json
npm install
```

---

## 🔐 Default Credentials

### Admin Account
- **Email**: admin@ncs.lab
- **Password**: password

### Guest Account (Testing)
- **Email**: guest@ncs.lab
- **Password**: password

**⚠️ PENTING**: Ubah password default setelah instalasi!

---

## 📁 Struktur Folder Setelah Instalasi

```
Backend-NCS-Laravel/
├── app/
├── bootstrap/
├── config/
├── database/
│   ├── migrations/      ✅ (11 files)
│   └── seeders/         ✅ (DatabaseSeeder.php)
├── public/
│   └── storage/         ✅ (symbolic link)
├── resources/
├── routes/
│   ├── api.php          ✅ (API routes)
│   └── web.php          ✅ (Web routes)
├── storage/
│   └── app/
│       └── public/      ✅ (file uploads)
├── tests/
├── vendor/              ✅ (composer packages)
├── node_modules/        ✅ (npm packages)
├── .env                 ✅ (environment config)
└── composer.json
```

---

## ⚙️ Konfigurasi Tambahan (Opsional)

### Setup Mail (untuk fitur email)
Edit `.env`:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=ncs@polinema.ac.id
MAIL_FROM_NAME="Lab NCS"
```

### Setup Queue (untuk background jobs)
Edit `.env`:
```env
QUEUE_CONNECTION=database
```

Jalankan worker:
```bash
php artisan queue:work
```

### Setup Cache (untuk performa)
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

**Clear cache:**
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

---

## 🔄 Update Project

```bash
# Pull latest changes
git pull origin main

# Update dependencies
composer install
npm install

# Run migrations (jika ada perubahan)
php artisan migrate

# Clear & rebuild cache
php artisan optimize:clear
php artisan optimize
```

---

## 📞 Bantuan

Jika mengalami kesulitan instalasi:
1. Cek Laravel Log: `storage/logs/laravel.log`
2. Cek PHP Error Log
3. Baca dokumentasi Laravel: https://laravel.com/docs
4. Hubungi tim developer

---

**Happy Coding! 🚀**
