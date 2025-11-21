# Development Guide

## Menjalankan Server Development

Untuk menjalankan aplikasi dalam mode development, gunakan perintah berikut:

```bash
composer run dev
```

Perintah ini akan menjalankan secara bersamaan:
- **PHP Server** (`php artisan serve`) - Server Laravel backend
- **Queue Worker** (`php artisan queue:listen`) - Worker untuk menjalankan jobs
- **Vite Dev Server** (`npm run dev`) - Hot reload untuk frontend assets (CSS, JS)

## Mengapa Menggunakan `composer run dev`?

### Keuntungan:
- ✅ Menjalankan semua server yang diperlukan dengan satu perintah
- ✅ Auto-reload untuk perubahan frontend (tidak perlu `npm run build` manual)
- ✅ Hot Module Replacement untuk development yang lebih cepat
- ✅ Queue worker untuk background jobs
- ✅ Output dengan warna berbeda untuk setiap service

### Perubahan Frontend Langsung Terlihat:
Ketika `npm run dev` berjalan (melalui `composer run dev`), setiap perubahan pada:
- Tailwind CSS classes
- JavaScript files
- Blade templates
- Asset files

Akan **langsung terlihat di browser** tanpa perlu build manual.

## Alternative: Menjalankan Server Secara Manual

Jika perlu menjalankan server secara terpisah, buka 3 terminal:

**Terminal 1 - Laravel Server:**
```bash
php artisan serve
```

**Terminal 2 - Queue Worker:**
```bash
php artisan queue:listen --tries=1
```

**Terminal 3 - Vite Dev Server:**
```bash
npm run dev
```

## Production Build

Untuk production, build assets dengan:

```bash
npm run build
```

Ini akan menghasilkan file yang dioptimasi di folder `public/build/`.

