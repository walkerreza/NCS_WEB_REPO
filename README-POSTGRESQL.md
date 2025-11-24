# 🐘 PostgreSQL Migration - Quick Guide

## 🎯 TL;DR (Too Long; Didn't Read)

Aplikasi ini sudah **siap untuk PostgreSQL**! Tinggal install PostgreSQL dan jalankan setup script.

---

## ⚡ Quick Setup (5 Menit)

### 1️⃣ Install PostgreSQL

**Windows:**
```powershell
# Download installer dari:
https://www.postgresql.org/download/windows/

# Atau via Laragon:
Menu → Quick Add → PostgreSQL
```

**Password saat install:** Ingat password untuk user `postgres`!

### 2️⃣ Run Setup Script (Recommended)

```powershell
# Jalankan script otomatis
.\setup-postgresql.ps1
```

Script akan otomatis:
- ✅ Check instalasi PostgreSQL
- ✅ Check PHP extensions
- ✅ Buat database
- ✅ Update .env
- ✅ Run migrations

### 3️⃣ Done! 🎉

```powershell
# Test aplikasi
php artisan serve

# Buka browser: http://localhost:8000
```

---

## 🔧 Manual Setup (Jika Script Gagal)

### 1. Enable PHP Extension

Edit `php.ini`:
```ini
extension=pdo_pgsql
extension=pgsql
```

Restart web server.

### 2. Create Database

```powershell
psql -U postgres
```

```sql
CREATE DATABASE ncs_laravel;
\q
```

### 3. Update .env

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=ncs_laravel
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

### 4. Run Migration

```powershell
php artisan config:clear
php artisan migrate:fresh
```

---

## 📋 What Changed?

### ✅ Migration Files Updated
- ENUM → VARCHAR with CHECK constraint
- YEAR → INTEGER
- Fully PostgreSQL compatible

### ✅ Models Enhanced
- `Archive::$validTypes` constant added
- `Service::$validCategories` constant added

### ✅ Validation Added
- `StoreArchiveRequest` created
- `StoreServiceRequest` created
- Enum validation with Laravel Rules

### ✅ Documentation
- `POSTGRESQL_SETUP.md` - Detailed guide
- `setup-postgresql.ps1` - Automated script

---

## 🧪 Testing

```powershell
# Run all tests
php artisan test

# Test database connection
php artisan tinker
>>> DB::connection()->getPdo();
>>> DB::table('users')->count();
```

---

## 🐛 Troubleshooting

### "psql not found"
→ Install PostgreSQL terlebih dahulu

### "pdo_pgsql extension not found"
→ Enable di `php.ini` dan restart server

### "password authentication failed"
→ Check password di `.env`

### "database does not exist"
→ Buat database dengan `CREATE DATABASE ncs_laravel;`

**Detail troubleshooting:** Lihat `POSTGRESQL_SETUP.md`

---

## 📊 Database Comparison

| Feature | MySQL | PostgreSQL |
|---------|-------|------------|
| License | GPL (dual) | PostgreSQL License (MIT-like) |
| ACID | ✓ | ✓ |
| JSON | Basic | Advanced |
| Performance | Fast reads | Fast complex queries |
| Scalability | Good | Excellent |
| Our App | ✓ Works | ✓ **Now Works!** |

---

## 🎓 Learn More

- PostgreSQL Docs: https://www.postgresql.org/docs/
- Laravel Database: https://laravel.com/docs/database
- Migration Guide: `POSTGRESQL_SETUP.md`

---

## ✨ Benefits of PostgreSQL

✅ Open-source & free for production  
✅ Better performance for complex queries  
✅ Advanced features (JSON, Full-text search, GIS)  
✅ Better data integrity  
✅ Active community & development  

---

## 📞 Need Help?

1. Check `POSTGRESQL_SETUP.md` for detailed guide
2. Check Laravel logs: `storage/logs/laravel.log`
3. Check PostgreSQL status: `Get-Service postgresql*`

---

**Happy Coding with PostgreSQL! 🚀**

