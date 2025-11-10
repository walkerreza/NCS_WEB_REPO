<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
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
        'image_path',
        'type',
        'event_date',
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
        'event_date' => 'date',
    ];

    /**
     * Relasi: Gallery dimiliki oleh user
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
     * Scope: Urutkan berdasarkan tanggal event terbaru
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('event_date', 'desc');
    }
}
