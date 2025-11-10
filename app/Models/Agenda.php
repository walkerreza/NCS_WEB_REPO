<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
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
        'event_date',
        'event_time',
        'location',
        'image_path',
        'is_active',
        'created_by',
    ];

    /**
     * Casting tipe data
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
        'event_date' => 'date',
        'event_time' => 'datetime:H:i',
    ];

    /**
     * Relasi: Agenda dimiliki oleh user
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Scope: Hanya yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: Agenda yang akan datang
     */
    public function scopeUpcoming($query)
    {
        return $query->where('event_date', '>=', now()->toDateString())
                     ->orderBy('event_date', 'asc');
    }

    /**
     * Scope: Agenda yang sudah lewat
     */
    public function scopePast($query)
    {
        return $query->where('event_date', '<', now()->toDateString())
                     ->orderBy('event_date', 'desc');
    }
}
