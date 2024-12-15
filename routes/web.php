<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkincareController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserRole;

// Route untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route untuk halaman dashboard (landing page setelah login)
Route::get('/landing', function () {
    return view('landing');
})->middleware(['auth', 'verified'])->name('landing');

// Group route untuk user umum (setelah login)
Route::middleware('auth')->group(function () {
    // Profil pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Quiz
    Route::get('/quiz', [QuizController::class, 'showQuiz'])->name('quiz.show');
    Route::post('/quiz/calculate', [QuizController::class, 'calculateSkinType'])->name('quiz.calculate');

    // Skincare berdasarkan kategori
    Route::get('/skincare-by-category', [ProdukController::class, 'showByCategory'])->name('skincare.byCategory');
    Route::get('/skincare-view', [ProdukController::class, 'skincareView'])->name('skincare.view');
    Route::get('/produk/filter', [ProdukController::class, 'filter'])->name('produk.filter');

});

// Group route untuk admin (akses khusus)
Route::middleware(['auth', EnsureUserRole::class . ':admin'])->group(function () {
    // Produk (CRUD)
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/create', [SkincareController::class, 'create'])->name('skincare.create');
    Route::post('/produk', [SkincareController::class, 'store'])->name('skincare.store');
    Route::get('/produk/{id}/edit', [SkincareController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{id}', [SkincareController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}', [SkincareController::class, 'destroy'])->name('produk.destroy');
});



// Route untuk dashboard umum
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Authentication routes
require __DIR__ . '/auth.php';
