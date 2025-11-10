<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\ApiController;
use App\Models\Archive;
use App\Helpers\FileUploadHelper;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class AdminArchiveController extends ApiController
{
    public function index(Request $request): JsonResponse
    {
        $query = Archive::with('creator:id,name');
        
        if ($request->has('type')) {
            $query->type($request->type);
        }

        $archives = $query->latestYear()->paginate(20);
        return $this->responseSukses($archives, 'Berhasil mengambil data arsip');
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:penelitian,pengabdian',
            'pdf_file' => 'required|mimes:pdf|max:5120', // Max 5MB
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:' . date('Y'),
            'is_published' => 'boolean',
        ], [
            'title.required' => 'Judul wajib diisi',
            'pdf_file.required' => 'File PDF wajib diupload',
            'pdf_file.mimes' => 'File harus berformat PDF',
            'pdf_file.max' => 'Ukuran file maksimal 5MB',
            'type.in' => 'Tipe harus penelitian atau pengabdian',
            'author.required' => 'Nama penulis wajib diisi',
            'year.required' => 'Tahun wajib diisi',
        ]);

        if ($validator->fails()) {
            return $this->responseError('Validasi gagal', 422, $validator->errors());
        }

        $pdfFile = $request->file('pdf_file');
        $data = $request->only(['title', 'description', 'type', 'author', 'year', 'is_published']);
        $data['pdf_path'] = FileUploadHelper::uploadPDF($pdfFile, $request->type);
        $data['file_size'] = FileUploadHelper::getFileSizeInKB($pdfFile);
        $data['created_by'] = auth()->id();

        $archive = Archive::create($data);

        return $this->responseSukses($archive, 'Arsip berhasil ditambahkan', 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $archive = Archive::find($id);
        if (!$archive) {
            return $this->responseError('Arsip tidak ditemukan', 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'type' => 'sometimes|in:penelitian,pengabdian',
            'pdf_file' => 'nullable|mimes:pdf|max:5120',
            'author' => 'sometimes|string|max:255',
            'year' => 'sometimes|integer|min:2000|max:' . date('Y'),
            'is_published' => 'boolean',
        ]);

        if ($validator->fails()) {
            return $this->responseError('Validasi gagal', 422, $validator->errors());
        }

        $data = $request->only(['title', 'description', 'type', 'author', 'year', 'is_published']);

        if ($request->hasFile('pdf_file')) {
            FileUploadHelper::deleteFile($archive->pdf_path);
            $pdfFile = $request->file('pdf_file');
            $data['pdf_path'] = FileUploadHelper::uploadPDF($pdfFile, $request->type ?? $archive->type);
            $data['file_size'] = FileUploadHelper::getFileSizeInKB($pdfFile);
        }

        $archive->update($data);
        return $this->responseSukses($archive, 'Arsip berhasil diupdate');
    }

    public function destroy(int $id): JsonResponse
    {
        $archive = Archive::find($id);
        if (!$archive) {
            return $this->responseError('Arsip tidak ditemukan', 404);
        }

        FileUploadHelper::deleteFile($archive->pdf_path);
        $archive->delete();

        return $this->responseSuksesNoData('Arsip berhasil dihapus');
    }
}
