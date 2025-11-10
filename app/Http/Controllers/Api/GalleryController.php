<?php

namespace App\Http\Controllers\Api;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GalleryController extends ApiController
{
    /**
     * Tampilkan semua galeri dengan filter opsional
     * 
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $query = Gallery::published()->with('creator:id,name');

        // Filter berdasarkan tipe jika ada
        if ($request->has('type') && in_array($request->type, ['kegiatan', 'dokumentasi'])) {
            $query->type($request->type);
        }

        // Filter berdasarkan tahun jika ada
        if ($request->has('year')) {
            $query->whereYear('event_date', $request->year);
        }

        // Sorting
        $galleries = $query->latest()->paginate(12);

        return $this->responseSukses($galleries, 'Berhasil mengambil data galeri');
    }

    /**
     * Tampilkan detail galeri
     * 
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $gallery = Gallery::published()
            ->with('creator:id,name')
            ->find($id);

        if (!$gallery) {
            return $this->responseError('Galeri tidak ditemukan', 404);
        }

        return $this->responseSukses($gallery, 'Berhasil mengambil detail galeri');
    }
}
