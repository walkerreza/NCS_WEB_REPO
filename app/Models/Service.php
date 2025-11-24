<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * Atribut yang dapat diisi secara massal
     *
     * @var array
     */
    protected $fillable = [
        'category',
        'title',
        'description',
        'image_path',
        'icon',
        'order',
        'is_active',
    ];

    /**
     * Casting tipe data
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Nilai yang diizinkan untuk kolom category
     *
     * @var array
     */
    public const CATEGORY_SARANA_PRASARANA = 'sarana_prasarana';

    public const CATEGORY_KONSULTATIF = 'konsultatif';

    public static array $validCategories = [
        self::CATEGORY_SARANA_PRASARANA,
        self::CATEGORY_KONSULTATIF,
    ];

    /**
     * Scope: Filter berdasarkan kategori
     */
    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Scope: Hanya yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: Urutkan berdasarkan order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
