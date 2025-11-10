<?php

namespace App\Http\Controllers\Api;

use App\Models\Link;
use Illuminate\Http\JsonResponse;

class LinkController extends ApiController
{
    /**
     * Tampilkan semua link
     * 
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $links = Link::active()->ordered()->get();

        return $this->responseSukses($links, 'Berhasil mengambil data link');
    }
}
