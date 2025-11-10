<?php

namespace App\Http\Controllers\Api;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProfileController extends ApiController
{
    /**
     * Tampilkan semua profil
     * 
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $profiles = Profile::active()->ordered()->get();
        return $this->responseSukses($profiles, 'Berhasil mengambil data profil');
    }

    /**
     * Tampilkan profil berdasarkan section
     * 
     * @param  string  $section  Section profil (visi_misi, struktur_organisasi)
     * @return JsonResponse
     */
    public function show(string $section): JsonResponse
    {
        // Validasi section
        if (!in_array($section, ['visi_misi', 'struktur_organisasi'])) {
            return $this->responseError('Section tidak valid', 404);
        }

        $profiles = Profile::section($section)
            ->active()
            ->ordered()
            ->get();

        if ($profiles->isEmpty()) {
            return $this->responseError('Data profil tidak ditemukan', 404);
        }

        return $this->responseSukses($profiles, 'Berhasil mengambil data profil ' . str_replace('_', ' ', $section));
    }
}
