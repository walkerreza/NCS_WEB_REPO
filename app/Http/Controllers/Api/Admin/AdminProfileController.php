<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\ApiController;
use App\Models\Profile;
use App\Helpers\FileUploadHelper;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class AdminProfileController extends ApiController
{
    /**
     * Tampilkan semua profil
     */
    public function index(): JsonResponse
    {
        $profiles = Profile::orderBy('order', 'asc')->get();
        return $this->responseSukses($profiles, 'Berhasil mengambil data profil');
    }

    /**
     * Simpan profil baru
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'section' => 'required|in:visi_misi,struktur_organisasi',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ], [
            'section.required' => 'Section wajib diisi',
            'section.in' => 'Section harus visi_misi atau struktur_organisasi',
            'title.required' => 'Judul wajib diisi',
            'content.required' => 'Konten wajib diisi',
            'image.image' => 'File harus berupa gambar',
            'image.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        if ($validator->fails()) {
            return $this->responseError('Validasi gagal', 422, $validator->errors());
        }

        $data = $request->only(['section', 'title', 'content', 'order', 'is_active']);

        // Upload image jika ada
        if ($request->hasFile('image')) {
            $data['image'] = FileUploadHelper::uploadLogo($request->file('image'), 'logos');
        }

        $profile = Profile::create($data);

        return $this->responseSukses($profile, 'Profil berhasil ditambahkan', 201);
    }

    /**
     * Update profil
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $profile = Profile::find($id);

        if (!$profile) {
            return $this->responseError('Profil tidak ditemukan', 404);
        }

        $validator = Validator::make($request->all(), [
            'section' => 'sometimes|in:visi_misi,struktur_organisasi',
            'title' => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return $this->responseError('Validasi gagal', 422, $validator->errors());
        }

        $data = $request->only(['section', 'title', 'content', 'order', 'is_active']);

        // Upload image baru jika ada
        if ($request->hasFile('image')) {
            // Hapus image lama
            FileUploadHelper::deleteFile($profile->image);
            $data['image'] = FileUploadHelper::uploadLogo($request->file('image'), 'logos');
        }

        $profile->update($data);

        return $this->responseSukses($profile, 'Profil berhasil diupdate');
    }

    /**
     * Hapus profil
     */
    public function destroy(int $id): JsonResponse
    {
        $profile = Profile::find($id);

        if (!$profile) {
            return $this->responseError('Profil tidak ditemukan', 404);
        }

        // Hapus image jika ada
        FileUploadHelper::deleteFile($profile->image);

        $profile->delete();

        return $this->responseSuksesNoData('Profil berhasil dihapus');
    }
}
