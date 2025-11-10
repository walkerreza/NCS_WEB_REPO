<?php

namespace App\Http\Controllers\Api;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ServiceController extends ApiController
{
    /**
     * Tampilkan semua layanan dengan filter opsional
     * 
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $query = Service::active()->ordered();

        // Filter berdasarkan kategori
        if ($request->has('category') && in_array($request->category, ['sarana_prasarana', 'konsultatif'])) {
            $query->category($request->category);
        }

        $services = $query->get();

        return $this->responseSukses($services, 'Berhasil mengambil data layanan');
    }

    /**
     * Tampilkan detail layanan
     * 
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $service = Service::active()->find($id);

        if (!$service) {
            return $this->responseError('Layanan tidak ditemukan', 404);
        }

        return $this->responseSukses($service, 'Berhasil mengambil detail layanan');
    }
}
