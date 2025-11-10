<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\ApiController;
use App\Models\Gallery;
use App\Helpers\FileUploadHelper;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class AdminGalleryController extends ApiController
{
    public function index(): JsonResponse
    {
        $galleries = Gallery::with('creator:id,name')->latest()->paginate(15);
        return $this->responseSukses($galleries, 'Berhasil mengambil data galeri');
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|in:kegiatan,dokumentasi',
            'event_date' => 'required|date',
            'is_published' => 'boolean',
        ], [
            'title.required' => 'Judul wajib diisi',
            'image.required' => 'Gambar wajib diupload',
            'image.max' => 'Ukuran gambar maksimal 2MB',
            'type.in' => 'Tipe harus kegiatan atau dokumentasi',
            'event_date.required' => 'Tanggal acara wajib diisi',
        ]);

        if ($validator->fails()) {
            return $this->responseError('Validasi gagal', 422, $validator->errors());
        }

        $data = $request->only(['title', 'description', 'type', 'event_date', 'is_published']);
        $data['image_path'] = FileUploadHelper::uploadImage($request->file('image'), 'galleries');
        $data['created_by'] = auth()->id();

        $gallery = Gallery::create($data);

        return $this->responseSukses($gallery, 'Galeri berhasil ditambahkan', 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $gallery = Gallery::find($id);
        if (!$gallery) {
            return $this->responseError('Galeri tidak ditemukan', 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'sometimes|in:kegiatan,dokumentasi',
            'event_date' => 'sometimes|date',
            'is_published' => 'boolean',
        ]);

        if ($validator->fails()) {
            return $this->responseError('Validasi gagal', 422, $validator->errors());
        }

        $data = $request->only(['title', 'description', 'type', 'event_date', 'is_published']);

        if ($request->hasFile('image')) {
            FileUploadHelper::deleteFile($gallery->image_path);
            $data['image_path'] = FileUploadHelper::uploadImage($request->file('image'), 'galleries');
        }

        $gallery->update($data);
        return $this->responseSukses($gallery, 'Galeri berhasil diupdate');
    }

    public function destroy(int $id): JsonResponse
    {
        $gallery = Gallery::find($id);
        if (!$gallery) {
            return $this->responseError('Galeri tidak ditemukan', 404);
        }

        FileUploadHelper::deleteFile($gallery->image_path);
        $gallery->delete();

        return $this->responseSuksesNoData('Galeri berhasil dihapus');
    }
}
