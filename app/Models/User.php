<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Tambahan: role admin/guest
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi: User memiliki banyak galleries
     */
    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'created_by');
    }

    /**
     * Relasi: User memiliki banyak agendas
     */
    public function agendas()
    {
        return $this->hasMany(Agenda::class, 'created_by');
    }

    /**
     * Relasi: User memiliki banyak archives
     */
    public function archives()
    {
        return $this->hasMany(Archive::class, 'created_by');
    }

    /**
     * Helper: Cek apakah user adalah admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Helper: Cek apakah user adalah guest
     */
    public function isGuest(): bool
    {
        return $this->role === 'guest';
    }
}
