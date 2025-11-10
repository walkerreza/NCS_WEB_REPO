<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * Atribut yang dapat diisi secara massal
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'comment',
        'page',
        'is_approved',
        'ip_address',
    ];

    /**
     * Casting tipe data
     *
     * @var array
     */
    protected $casts = [
        'is_approved' => 'boolean',
    ];

    /**
     * Scope: Hanya komentar yang disetujui
     */
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    /**
     * Scope: Komentar yang menunggu persetujuan
     */
    public function scopePending($query)
    {
        return $query->where('is_approved', false);
    }

    /**
     * Scope: Filter berdasarkan halaman
     */
    public function scopePage($query, $page)
    {
        return $query->where('page', $page);
    }

    /**
     * Scope: Urutkan terbaru
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
