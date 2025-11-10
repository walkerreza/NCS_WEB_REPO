<?php

namespace App\Http\Controllers\Api;

use App\Models\SiteSetting;
use Illuminate\Http\JsonResponse;

class SiteSettingController extends ApiController
{
    /**
     * Tampilkan semua pengaturan site
     * 
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $settings = SiteSetting::all()->mapWithKeys(function ($item) {
            return [$item->key => $item->value];
        });

        return $this->responseSukses($settings, 'Berhasil mengambil pengaturan site');
    }

    /**
     * Tampilkan pengaturan berdasarkan key
     * 
     * @param  string  $key
     * @return JsonResponse
     */
    public function show(string $key): JsonResponse
    {
        $value = SiteSetting::getValue($key);

        if ($value === null) {
            return $this->responseError('Pengaturan tidak ditemukan', 404);
        }

        return $this->responseSukses(['key' => $key, 'value' => $value], 'Berhasil mengambil pengaturan');
    }
}
