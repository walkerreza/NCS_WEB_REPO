<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    /**
     * Atribut yang dapat diisi secara massal
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'type',
        'pdf_path',
        'file_size',
        'author',
        'year',
        'download_count',
        'is_published',
        'created_by',
    ];

    /**
     * Casting tipe data
     *
     * @var array
     */
    protected $casts = [
        'is_published' => 'boolean',
        'download_count' => 'integer',
        'file_size' => 'integer',
        'year' => 'integer',
    ];

    /**
     * Nilai yang diizinkan untuk kolom type
     *
     * @var array
     */
    public const TYPE_PENELITIAN = 'penelitian';

    public const TYPE_PENGABDIAN = 'pengabdian';

    public static array $validTypes = [
        self::TYPE_PENELITIAN,
        self::TYPE_PENGABDIAN,
    ];

    /**
     * Relasi: Archive dimiliki oleh user
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Scope: Filter berdasarkan tipe
     */
    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Scope: Hanya yang dipublikasi
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope: Urutkan berdasarkan tahun terbaru
     */
    public function scopeLatestYear($query)
    {
        return $query->orderBy('year', 'desc');
    }

    /**
     * Scope: Filter berdasarkan tahun
     */
    public function scopeYear($query, $year)
    {
        return $query->where('year', $year);
    }

    /**
     * Helper: Increment download count
     */
    public function incrementDownloadCount()
    {
        $this->increment('download_count');
    }

    /**
     * Helper: Format ukuran file
     */
    public function getFormattedFileSizeAttribute()
    {
        if ($this->file_size < 1024) {
            return $this->file_size.' KB';
        }

        return round($this->file_size / 1024, 2).' MB';
    }
}
