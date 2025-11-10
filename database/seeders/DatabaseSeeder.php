<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Link;
use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     * Membuat data awal untuk Lab Network & Cyber Security Website
     */
    public function run(): void
    {
        // ==================== BUAT ADMIN USER ====================
        User::create([
            'name' => 'Admin Lab NCS',
            'email' => 'admin@ncs.lab',
            'password' => Hash::make('password'), // Password: password
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Buat guest user untuk testing
        User::create([
            'name' => 'Guest User',
            'email' => 'guest@ncs.lab',
            'password' => Hash::make('password'),
            'role' => 'guest',
            'email_verified_at' => now(),
        ]);

        // ==================== LINKS DEFAULT ====================
        $links = [
            [
                'title' => 'Polinema',
                'url' => 'https://www.polinema.ac.id',
                'icon' => 'fa-university',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'SINTA',
                'url' => 'https://sinta.kemdikbud.go.id',
                'icon' => 'fa-graduation-cap',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Google Scholar',
                'url' => 'https://scholar.google.com',
                'icon' => 'fa-google',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Portal Garuda',
                'url' => 'https://garuda.kemdikbud.go.id',
                'icon' => 'fa-book',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($links as $link) {
            Link::create($link);
        }

        // ==================== SITE SETTINGS ====================
        $settings = [
            [
                'key' => 'lab_name',
                'value' => 'Laboratorium Network & Cyber Security',
                'description' => 'Nama lengkap laboratorium',
            ],
            [
                'key' => 'lab_name_short',
                'value' => 'Lab NCS',
                'description' => 'Nama singkat laboratorium',
            ],
            [
                'key' => 'lab_email',
                'value' => 'ncs@polinema.ac.id',
                'description' => 'Email kontak laboratorium',
            ],
            [
                'key' => 'lab_phone',
                'value' => '(0341) 404424',
                'description' => 'Nomor telepon laboratorium',
            ],
            [
                'key' => 'lab_address',
                'value' => 'Jl. Soekarno Hatta No.9, Malang, Jawa Timur 65141',
                'description' => 'Alamat laboratorium',
            ],
            [
                'key' => 'lab_description',
                'value' => 'Laboratorium Network & Cyber Security merupakan salah satu laboratorium unggulan di Jurusan Teknologi Informasi Politeknik Negeri Malang yang fokus pada penelitian dan pengembangan di bidang keamanan jaringan dan cyber security.',
                'description' => 'Deskripsi singkat laboratorium',
            ],
            [
                'key' => 'social_facebook',
                'value' => 'https://facebook.com/labncs.polinema',
                'description' => 'Link Facebook',
            ],
            [
                'key' => 'social_instagram',
                'value' => 'https://instagram.com/labncs.polinema',
                'description' => 'Link Instagram',
            ],
            [
                'key' => 'social_twitter',
                'value' => 'https://twitter.com/labncs_polinema',
                'description' => 'Link Twitter',
            ],
            [
                'key' => 'social_youtube',
                'value' => 'https://youtube.com/@labncspolinema',
                'description' => 'Link YouTube',
            ],
        ];

        foreach ($settings as $setting) {
            SiteSetting::create($setting);
        }

        $this->command->info('✅ Seeder berhasil dijalankan!');
        $this->command->info('📧 Admin Email: admin@ncs.lab');
        $this->command->info('🔑 Password: password');
    }
}
