<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    ProfileController,
    GalleryController,
    AgendaController,
    ArchiveController,
    ServiceController,
    LinkController,
    CommentController,
    SiteSettingController
};
use App\Http\Controllers\Api\Admin\{
    AdminProfileController,
    AdminGalleryController,
    AdminAgendaController,
    AdminArchiveController,
    AdminServiceController,
    AdminLinkController,
    AdminCommentController,
    DashboardController
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Routes untuk REST API Lab Network & Cyber Security Website
|
*/

// ==================== PUBLIC ENDPOINTS ====================

// Profil Laboratorium
Route::prefix('profiles')->group(function () {
    Route::get('/', [ProfileController::class, 'index']);
    Route::get('/{section}', [ProfileController::class, 'show']); // visi_misi, struktur_organisasi
});

// Galeri
Route::prefix('galleries')->group(function () {
    Route::get('/', [GalleryController::class, 'index']);
    Route::get('/{id}', [GalleryController::class, 'show']);
});

// Agenda
Route::prefix('agendas')->group(function () {
    Route::get('/', [AgendaController::class, 'index']);
    Route::get('/{id}', [AgendaController::class, 'show']);
});

// Arsip (Penelitian & Pengabdian)
Route::prefix('archives')->group(function () {
    Route::get('/', [ArchiveController::class, 'index']);
    Route::get('/years', [ArchiveController::class, 'years']); // Daftar tahun tersedia
    Route::get('/{id}', [ArchiveController::class, 'show']);
    Route::get('/{id}/download', [ArchiveController::class, 'download']); // Download PDF
});

// Layanan
Route::prefix('services')->group(function () {
    Route::get('/', [ServiceController::class, 'index']);
    Route::get('/{id}', [ServiceController::class, 'show']);
});

// Links
Route::get('/links', [LinkController::class, 'index']);

// Komentar
Route::prefix('comments')->group(function () {
    Route::post('/', [CommentController::class, 'store']); // Guest submit comment
    Route::get('/approved', [CommentController::class, 'approved']); // Tampilkan komentar yang disetujui
});

// Site Settings
Route::prefix('settings')->group(function () {
    Route::get('/', [SiteSettingController::class, 'index']);
    Route::get('/{key}', [SiteSettingController::class, 'show']);
});

// ==================== ADMIN ENDPOINTS (Protected) ====================

Route::middleware(['auth:sanctum', 'role:admin'])->prefix('admin')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/stats', [DashboardController::class, 'stats']);
    
    // Profiles Management
    Route::apiResource('profiles', AdminProfileController::class);
    
    // Galleries Management
    Route::apiResource('galleries', AdminGalleryController::class);
    
    // Agendas Management
    Route::apiResource('agendas', AdminAgendaController::class);
    
    // Archives Management
    Route::apiResource('archives', AdminArchiveController::class);
    
    // Services Management
    Route::apiResource('services', AdminServiceController::class);
    
    // Links Management
    Route::apiResource('links', AdminLinkController::class);
    
    // Comments Management
    Route::prefix('comments')->group(function () {
        Route::get('/', [AdminCommentController::class, 'index']);
        Route::get('/stats', [AdminCommentController::class, 'stats']);
        Route::put('/{id}/approve', [AdminCommentController::class, 'approve']);
        Route::put('/{id}/reject', [AdminCommentController::class, 'reject']);
        Route::delete('/{id}', [AdminCommentController::class, 'destroy']);
    });
});

// Route untuk mendapatkan user yang sedang login (dengan Sanctum)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json([
        'sukses' => true,
        'data' => $request->user(),
    ]);
});
