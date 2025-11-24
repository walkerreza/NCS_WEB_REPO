# 🐘 Panduan Setup PostgreSQL untuk NCS Laravel Web

## ✅ Perubahan yang Sudah Dilakukan

1. ✅ Migration files diupdate untuk PostgreSQL compatibility
2. ✅ Model validation constants ditambahkan
3. ✅ Form Request validation dibuat
4. ✅ .env.example diupdate dengan config PostgreSQL

---

## 📥 Step 1: Download & Install PostgreSQL

### Opsi A: Install PostgreSQL Standalone

1. **Download PostgreSQL**
   - Kunjungi: https://www.postgresql.org/download/windows/
   - Download versi terbaru (disarankan versi 16 atau 15)
   - Atau direct link: https://www.enterprisedb.com/downloads/postgres-postgresql-downloads

2. **Install PostgreSQL**
   - Jalankan installer yang sudah didownload
   - Ikuti wizard instalasi:
     - **Port**: Biarkan default `5432`
     - **Password**: Masukkan password untuk user `postgres` (ingat password ini!)
     - **Locale**: Pilih `Indonesian, Indonesia` atau `Default locale`
   - Centang "Stack Builder" jika ingin install tools tambahan (opsional)

3. **Verifikasi Instalasi**
   ```powershell
   # Buka Command Prompt atau PowerShell
   psql --version
   ```
   
   Jika muncul versi PostgreSQL, instalasi berhasil!

### Opsi B: Install PostgreSQL via Laragon (Jika Belum Ada)

1. Buka **Laragon**
2. Klik **Menu** → **Quick Add** → **PostgreSQL**
3. Tunggu sampai download & instalasi selesai
4. Restart Laragon

---

## 🗄️ Step 2: Setup Database

### Cara 1: Via pgAdmin (GUI)

1. **Buka pgAdmin**
   - Cari "pgAdmin" di Start Menu
   - Password: password yang Anda set saat install

2. **Create Database**
   - Klik kanan pada **Databases** → **Create** → **Database**
   - **Database name**: `ncs_laravel`
   - **Owner**: `postgres`
   - Klik **Save**

### Cara 2: Via Command Line (psql)

```powershell
# Login ke PostgreSQL
psql -U postgres

# Di dalam psql, jalankan:
CREATE DATABASE ncs_laravel;

# Create user baru (opsional, untuk keamanan lebih baik)
CREATE USER ncs_user WITH ENCRYPTED PASSWORD 'ncs_password123';
GRANT ALL PRIVILEGES ON DATABASE ncs_laravel TO ncs_user;

# Keluar dari psql
\q
```

---

## 🔧 Step 3: Setup PHP Extension

### Enable Extension PostgreSQL di PHP

1. **Cari file `php.ini`**
   - Laragon: `C:\laragon\bin\php\php-8.x.xx\php.ini`
   - XAMPP: `C:\xampp\php\php.ini`
   - Atau jalankan: `php --ini` untuk cek lokasi

2. **Edit `php.ini`**
   
   Cari dan **uncomment** (hapus `;` di depan) baris berikut:
   ```ini
   extension=pdo_pgsql
   extension=pgsql
   ```

3. **Restart Web Server**
   - Laragon: Klik **Stop All** lalu **Start All**
   - Atau restart manual Apache/Nginx

4. **Verifikasi Extension**
   ```powershell
   php -m | findstr pgsql
   ```
   
   Harusnya muncul:
   ```
   pdo_pgsql
   pgsql
   ```

---

## ⚙️ Step 4: Configure Laravel

### 1. Update File `.env`

```bash
# Copy dari .env.example
cp .env.example .env
```

Atau buat manual file `.env` dengan isi:

```env
APP_NAME="NCS Laravel Web"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

# PostgreSQL Configuration
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=ncs_laravel
DB_USERNAME=postgres
DB_PASSWORD=your_password_here

# ... (copy dari .env.example untuk sisanya)
```

**PENTING:** Ganti `your_password_here` dengan password PostgreSQL Anda!

### 2. Generate Application Key

```powershell
php artisan key:generate
```

### 3. Clear Cache

```powershell
php artisan config:clear
php artisan cache:clear
php artisan route:clear
```

---

## 🚀 Step 5: Jalankan Migration

### Fresh Migration (Database Kosong)

```powershell
php artisan migrate:fresh
```

### Atau dengan Seeder (Jika Ada Data Sample)

```powershell
php artisan migrate:fresh --seed
```

---

## ✅ Step 6: Verifikasi

### Test Koneksi Database

```powershell
php artisan tinker
```

Di dalam Tinker:
```php
DB::connection()->getPdo();
// Jika berhasil, akan muncul object PDO

// Test query
DB::table('users')->count();

// Exit tinker
exit
```

### Test Model & Validation

```powershell
php artisan tinker
```

```php
// Test Archive model constants
App\Models\Archive::$validTypes;
// Output: ["penelitian", "pengabdian"]

// Test Service model constants
App\Models\Service::$validCategories;
// Output: ["sarana_prasarana", "konsultatif"]

exit
```

---

## 🔄 Migration dari MySQL ke PostgreSQL (Jika Ada Data)

### Jika Anda sudah punya data di MySQL dan ingin pindah:

1. **Export Data dari MySQL**
   ```powershell
   php artisan db:seed --class=ExportDataSeeder
   ```

2. **Atau gunakan tools:**
   - **pgLoader**: https://pgloader.io/
   - **DBeaver**: https://dbeaver.io/ (GUI untuk migrasi antar database)

3. **Atau manual export-import per table:**
   ```powershell
   # Export dari MySQL
   mysqldump -u root -p ncs_laravel > backup.sql
   
   # Convert & Import ke PostgreSQL (butuh tools converter)
   ```

---

## 🧪 Testing

### Run All Tests

```powershell
php artisan test
```

### Run Specific Test

```powershell
php artisan test --filter=ArchiveTest
```

---

## 📊 Tools Rekomendasi untuk PostgreSQL

### GUI Clients (Pilih salah satu):

1. **pgAdmin** (Official, sudah include saat install)
   - Free & powerful
   - Download: https://www.pgadmin.org/

2. **DBeaver** (Recommended!)
   - Support multiple databases
   - Free & open-source
   - Download: https://dbeaver.io/

3. **TablePlus** (Modern & Beautiful)
   - Paid (trial available)
   - Download: https://tableplus.com/

4. **HeidiSQL** (Lightweight)
   - Free
   - Download: https://www.heidisql.com/

---

## 🐛 Troubleshooting

### Error: "could not connect to server"

**Solusi:**
```powershell
# Check apakah PostgreSQL service running
Get-Service postgresql*

# Start service jika stopped
Start-Service postgresql-x64-15  # Sesuaikan dengan versi Anda
```

### Error: "extension pdo_pgsql not found"

**Solusi:**
1. Check `php.ini` sudah di-uncomment
2. Restart web server
3. Verifikasi dengan: `php -m | findstr pgsql`

### Error: "SQLSTATE[08006] FATAL: password authentication failed"

**Solusi:**
- Check password di `.env` sudah benar
- Reset password PostgreSQL:
  ```powershell
  psql -U postgres
  ALTER USER postgres PASSWORD 'new_password';
  ```

### Error: "database does not exist"

**Solusi:**
```powershell
psql -U postgres
CREATE DATABASE ncs_laravel;
\q
```

### Port 5432 Already in Use

**Solusi:**
```powershell
# Check apa yang menggunakan port 5432
netstat -ano | findstr :5432

# Atau ubah port PostgreSQL di postgresql.conf
# Lalu update DB_PORT di .env
```

---

## 📝 Perbedaan MySQL vs PostgreSQL untuk Project Ini

| Fitur | MySQL | PostgreSQL |
|-------|-------|------------|
| ENUM type | Native | Converted to VARCHAR + CHECK constraint |
| YEAR type | Native | Converted to INTEGER |
| Boolean | 0/1 | true/false |
| Case Sensitivity | Case-insensitive | Case-sensitive (use ILIKE) |
| Auto Increment | AUTO_INCREMENT | SERIAL / BIGSERIAL |

**Catatan:** Laravel Eloquent ORM sudah handle semua perbedaan ini secara otomatis!

---

## 🎉 Selesai!

Sekarang aplikasi Anda sudah menggunakan PostgreSQL!

### Next Steps:

1. ✅ Test semua fitur CRUD
2. ✅ Test authentication & authorization
3. ✅ Test file uploads
4. ✅ Run test suite
5. ✅ Deploy ke production

---

## 📞 Butuh Bantuan?

Jika ada masalah, check:
1. PostgreSQL service status
2. PHP extension enabled
3. `.env` configuration
4. Laravel logs: `storage/logs/laravel.log`
5. PostgreSQL logs: Check di pgAdmin atau `psql`

**Happy Coding! 🚀**

