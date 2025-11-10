<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class FileUploadHelper
{
    /**
     * Upload file PDF ke storage
     * 
     * @param  UploadedFile  $file  File PDF yang akan diupload
     * @param  string  $type  Tipe dokumen (penelitian/pengabdian)
     * @return string  Path file yang tersimpan
     */
    public static function uploadPDF(UploadedFile $file, string $type): string
    {
        $year = date('Y');
        $path = "archives/{$type}/{$year}";
        
        // Buat nama file yang aman dan unik
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeName = Str::slug($originalName);
        $filename = time() . '_' . $safeName . '.pdf';
        
        // Simpan file ke storage/app/public
        return $file->storeAs($path, $filename, 'public');
    }

    /**
     * Upload file gambar ke storage
     * 
     * @param  UploadedFile  $file  File gambar yang akan diupload
     * @param  string  $directory  Direktori tujuan (galleries/agendas/services/profiles)
     * @return string  Path file yang tersimpan
     */
    public static function uploadImage(UploadedFile $file, string $directory): string
    {
        // Buat path dengan struktur year/month untuk organisasi yang lebih baik
        $path = "{$directory}/" . date('Y/m');
        
        // Buat nama file yang unik
        $filename = time() . '_' . Str::random(10) . '.' . $file->extension();
        
        // Simpan file ke storage/app/public
        return $file->storeAs($path, $filename, 'public');
    }

    /**
     * Upload logo untuk profil
     * 
     * @param  UploadedFile  $file  File logo yang akan diupload
     * @param  string  $type  Tipe logo (logos/struktur)
     * @return string  Path file yang tersimpan
     */
    public static function uploadLogo(UploadedFile $file, string $type = 'logos'): string
    {
        $path = "profiles/{$type}";
        $filename = time() . '_' . Str::random(10) . '.' . $file->extension();
        
        return $file->storeAs($path, $filename, 'public');
    }

    /**
     * Hapus file dari storage
     * 
     * @param  string  $path  Path file yang akan dihapus
     * @return bool  Status penghapusan
     */
    public static function deleteFile(?string $path): bool
    {
        if (!$path) {
            return false;
        }

        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->delete($path);
        }

        return false;
    }

    /**
     * Dapatkan ukuran file dalam KB
     * 
     * @param  UploadedFile  $file  File yang akan diukur
     * @return int  Ukuran file dalam KB
     */
    public static function getFileSizeInKB(UploadedFile $file): int
    {
        return round($file->getSize() / 1024);
    }

    /**
     * Dapatkan URL lengkap file dari storage
     * 
     * @param  string|null  $path  Path file di storage
     * @return string|null  URL lengkap file atau null
     */
    public static function getFileUrl(?string $path): ?string
    {
        if (!$path) {
            return null;
        }

        return Storage::disk('public')->url($path);
    }

    /**
     * Cek apakah file exists di storage
     * 
     * @param  string|null  $path  Path file
     * @return bool  True jika file exists
     */
    public static function fileExists(?string $path): bool
    {
        if (!$path) {
            return false;
        }

        return Storage::disk('public')->exists($path);
    }
}
