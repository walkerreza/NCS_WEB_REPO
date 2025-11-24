<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Public Routes
|--------------------------------------------------------------------------
| Routes untuk halaman publik website Lab NCS
*/

// Beranda
Route::get('/', function () {
    return view('pages.beranda');
})->name('beranda');

// Profil Routes
Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/visi-misi', function () {
        return view('pages.profil.visi-misi');
    })->name('visi-misi');
    
    Route::get('/logo', function () {
        return view('pages.profil.logo');
    })->name('logo');
    
    Route::get('/struktur', function () {
        return view('pages.profil.struktur');
    })->name('struktur');
});

// Galeri & Agenda
Route::get('/galeri', function () {
    return view('pages.galeri');
})->name('galeri');

// Arsip Routes
Route::prefix('arsip')->name('arsip.')->group(function () {
    Route::get('/penelitian', function () {
        return view('pages.arsip.penelitian');
    })->name('penelitian');
    
    Route::get('/pengabdian', function () {
        return view('pages.arsip.pengabdian');
    })->name('pengabdian');
});

// Layanan Routes
Route::prefix('layanan')->name('layanan.')->group(function () {
    Route::get('/sarana-prasarana', function () {
        return view('pages.layanan.sarana');
    })->name('sarana');
    
    Route::get('/konsultatif', function () {
        return view('pages.layanan.konsultatif');
    })->name('konsultatif');
});

// Link
Route::get('/link', function () {
    return view('pages.link');
})->name('link');

/*
|--------------------------------------------------------------------------
| Admin/Dashboard Routes
|--------------------------------------------------------------------------
| Routes untuk admin dashboard (memerlukan autentikasi)
*/

Route::get('/dashboard', function () {
    return view('pages.Admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
    
Route::get('/visi-misi', function () {
    return view('pages.Admin.VisiMisi');
})->middleware(['auth', 'verified'])->name('admin.visi-misi');

Route::get('/logo', function () {
    return view('pages.Admin.logo');
})->middleware(['auth', 'verified'])->name('admin.logo');

Route::get('/struktur-organisasi', function () {
    return view('pages.Admin.StrukturOrg');
})->middleware(['auth', 'verified'])->name('admin.struktur-organisasi');

Route::get('/galeri', function () {
    return view('pages.Admin.galeri');
})->middleware(['auth', 'verified'])->name('admin.galeri');

Route::get('/penelitian', function () {
    return view('pages.Admin.penelitian');
})->middleware(['auth', 'verified'])->name('admin.penelitian');

Route::get('/pengabdian', function () {
    return view('pages.Admin.pengabdian');
})->middleware(['auth', 'verified'])->name('admin.pengabdian');

Route::get('/sarana-prasarana', function () {
    return view('pages.Admin.Sarpras');
})->middleware(['auth', 'verified'])->name('admin.sarana-prasarana');

Route::get('/konsul', function () {
    return view('pages.Admin.konsul');
})->middleware(['auth', 'verified'])->name('admin.konsul');

Route::get('/link', function () {
    return view('pages.Admin.link');
})->middleware(['auth', 'verified'])->name('admin.link');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
