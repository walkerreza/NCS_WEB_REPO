<?php

namespace App\Http\Controllers\Api;

use App\Models\Archive;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class ArchiveController extends ApiController
{
    /**
     * Tampilkan semua arsip dengan filter
     * 
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $query = Archive::published()->with('creator:id,name');

        // Filter berdasarkan tipe
        if ($request->has('type') && in_array($request->type, ['penelitian', 'pengabdian'])) {
            $query->type($request->type);
        }

        // Filter berdasarkan tahun
        if ($request->has('year')) {
            $query->year($request->year);
        }

        // Filter berdasarkan author
        if ($request->has('author')) {
            $query->where('author', 'like', '%' . $request->author . '%');
        }

        // Sorting
        $archives = $query->latestYear()->paginate(15);

        return $this->responseSukses($archives, 'Berhasil mengambil data arsip');
    }

    /**
     * Tampilkan detail arsip
     * 
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $archive = Archive::published()
            ->with('creator:id,name')
            ->find($id);

        if (!$archive) {
            return $this->responseError('Arsip tidak ditemukan', 404);
        }

        return $this->responseSukses($archive, 'Berhasil mengambil detail arsip');
    }

    /**
     * Download file PDF arsip
     * 
     * @param  int  $id
     * @return mixed
     */
    public function download(int $id)
    {
        $archive = Archive::published()->find($id);

        if (!$archive) {
            return $this->responseError('Arsip tidak ditemukan', 404);
        }

        // Cek apakah file exists
        if (!Storage::disk('public')->exists($archive->pdf_path)) {
            return $this->responseError('File PDF tidak ditemukan', 404);
        }

        // Increment download count
        $archive->incrementDownloadCount();

        // Download file
        $filePath = Storage::disk('public')->path($archive->pdf_path);
        $fileName = $archive->title . '.pdf';

        return response()->download($filePath, $fileName);
    }

    /**
     * Dapatkan daftar tahun yang tersedia
     * 
     * @return JsonResponse
     */
    public function years(): JsonResponse
    {
        $years = Archive::published()
            ->select('year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return $this->responseSukses($years, 'Berhasil mengambil daftar tahun');
    }
}
