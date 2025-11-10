<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class CommentController extends ApiController
{
    /**
     * Simpan komentar baru dari guest
     * 
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'comment' => 'required|string|max:1000',
            'page' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama maksimal 100 karakter',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Email maksimal 100 karakter',
            'comment.required' => 'Komentar wajib diisi',
            'comment.max' => 'Komentar maksimal 1000 karakter',
            'page.required' => 'Halaman wajib diisi',
        ]);

        if ($validator->fails()) {
            return $this->responseError('Validasi gagal', 422, $validator->errors());
        }

        // Simpan komentar
        $comment = Comment::create([
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'page' => $request->page,
            'ip_address' => $request->ip(),
            'is_approved' => false, // Menunggu persetujuan admin
        ]);

        return $this->responseSukses(
            $comment,
            'Komentar berhasil dikirim. Menunggu persetujuan admin.',
            201
        );
    }

    /**
     * Tampilkan komentar yang sudah disetujui untuk halaman tertentu
     * 
     * @param  Request  $request
     * @return JsonResponse
     */
    public function approved(Request $request): JsonResponse
    {
        $query = Comment::approved()->latest();

        // Filter berdasarkan halaman jika ada
        if ($request->has('page')) {
            $query->page($request->page);
        }

        $comments = $query->paginate(20);

        return $this->responseSukses($comments, 'Berhasil mengambil komentar');
    }
}
