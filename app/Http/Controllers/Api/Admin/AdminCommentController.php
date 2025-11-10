<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\ApiController;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AdminCommentController extends ApiController
{
    /**
     * Tampilkan semua komentar dengan filter
     */
    public function index(Request $request): JsonResponse
    {
        $query = Comment::latest();

        // Filter berdasarkan status approval
        if ($request->has('status')) {
            if ($request->status === 'pending') {
                $query->pending();
            } elseif ($request->status === 'approved') {
                $query->approved();
            }
        }

        // Filter berdasarkan halaman
        if ($request->has('page')) {
            $query->page($request->page);
        }

        $comments = $query->paginate(20);
        return $this->responseSukses($comments, 'Berhasil mengambil data komentar');
    }

    /**
     * Setujui komentar
     */
    public function approve(int $id): JsonResponse
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return $this->responseError('Komentar tidak ditemukan', 404);
        }

        $comment->update(['is_approved' => true]);

        return $this->responseSukses($comment, 'Komentar berhasil disetujui');
    }

    /**
     * Tolak/batalkan persetujuan komentar
     */
    public function reject(int $id): JsonResponse
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return $this->responseError('Komentar tidak ditemukan', 404);
        }

        $comment->update(['is_approved' => false]);

        return $this->responseSukses($comment, 'Komentar berhasil ditolak');
    }

    /**
     * Hapus komentar
     */
    public function destroy(int $id): JsonResponse
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return $this->responseError('Komentar tidak ditemukan', 404);
        }

        $comment->delete();

        return $this->responseSuksesNoData('Komentar berhasil dihapus');
    }

    /**
     * Dashboard stats - jumlah komentar pending
     */
    public function stats(): JsonResponse
    {
        $pendingCount = Comment::pending()->count();
        $approvedCount = Comment::approved()->count();
        $totalCount = Comment::count();

        return $this->responseSukses([
            'pending' => $pendingCount,
            'approved' => $approvedCount,
            'total' => $totalCount,
        ], 'Berhasil mengambil statistik komentar');
    }
}
