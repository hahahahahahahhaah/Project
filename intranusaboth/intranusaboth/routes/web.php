<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FormController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QnaController;
use App\Http\Controllers\FeedbackController;


use App\Http\Controllers\PelangganController;


    // Route untuk menampilkan halaman admin/data dengan form pelanggan
    Route::get('/data', [PelangganController::class, 'data'])->name('admin.data');
    Route::post('/data', [PelangganController::class, 'store'])->name('admin.store');
    Route::post('/chatbot/respond', [QnaController::class, 'respond'])->name('chatbot.respond');

    Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');


    



// Route::get('/form/lokasi', [FormController::class, 'step1']);
// Route::post('/form/datadiri', [FormController::class, 'step2']);
// Route::get('/form/datadiri', [FormController::class, 'showStep2'])->name('form.datadiri');

// Route::post('/form/paket', [FormController::class, 'step3']);
// Route::get('/form/paket', [FormController::class, 'showStep3'])->name('form.paket');

// Route::post('/form/syarat', [FormController::class, 'step4']);
// Route::get('/form/syarat', [FormController::class, 'showStep4'])->name('form.syarat');

// Route::post('/form/sukses', [FormController::class, 'store']);
// Route::get('/form/success', [FormController::class, 'success'])->name('form.success');

Route::get('/form/lokasi', [FormController::class, 'step1'])->name('form.lokasi');
Route::post('/form/lokasi', [FormController::class, 'step2']);

Route::get('/form/datadiri', [FormController::class, 'showStep2'])->name('form.datadiri');
Route::post('/form/datadiri', [FormController::class, 'step3']);

Route::get('/form/syarat', [FormController::class, 'showSyarat'])->name('form.syarat');
Route::post('/form/syarat', [FormController::class, 'acceptSyarat']);

Route::get('/form/paket', [FormController::class, 'showStep3'])->name('form.paket');
Route::post('/form/paket', [FormController::class, 'step4']);

Route::get('/form/success', [FormController::class, 'success'])->name('form.success');

// Halaman Login & Register User
Route::get('/login-register', function () {
    return view('auth.login-register');
})->name('login-register');

// Proses login & register user
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Halaman Login Admin
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard untuk admin
// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard'); // Gantilah dengan tampilan dashboard admin Anda
// })->name('admin.dashboard')->middleware('auth');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/data', [AdminController::class, 'data'])->name('admin.data');
    Route::resource('qna', \App\Http\Controllers\QnaController::class)->names('admin.qna');

    Route::get('/survei', [FeedbackController::class, 'index'])->name('admin.feedback');
    Route::get('/export-feedback', [FeedbackController::class, 'exportPdf'])->name('feedback.exportPdf');
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('/user/edit', [AuthController::class, 'editProfile'])->name('user.edit');
//     Route::put('/user/edit', [AuthController::class, 'uploadProfile'])->name('user.upload_profile');
// });
// Route::middleware(['auth'])->group(function () {
//     Route::get('/user/edit', [AuthController::class, 'editProfile'])->name('user.edit'); // Halaman edit profil
//     Route::put('/user/update', [AuthController::class, 'updateProfile'])->name('user.update'); // Endpoint untuk update profil
// });

// Route::middleware(['auth'])->group(function () {
//     // Halaman edit profile
//     Route::get('/user/edit', [AuthController::class, 'editProfile'])->name('user.editProfile');

//     // Proses update profile (gunakan POST jika form, atau PATCH untuk API)
//     Route::post('/user/update', [AuthController::class, 'updateProfile'])->name('user.updateProfile');

//     // Halaman profile setelah login
//     Route::get('/user', [AuthController::class, 'showUserProfileForIndex'])->name('user.profile');
// });


Route::middleware('auth')->group(function () {
    Route::get('/user/edit', [AuthController::class, 'editProfile'])->name('user.edit');
    Route::post('/user/update-picture', [AuthController::class, 'updateProfilePicture'])->name('user.update-picture');
    Route::post('/user/update-username', [AuthController::class, 'updateUsername'])->name('user.update-username');

    Route::get('/user/history', [AuthController::class, 'showUserHistory'])->name('user.history');
});


// Dashboard untuk user
// Route::get('/user/index', function () {
//     return view('user.index');
// })->name('user.index')->middleware('auth');

// routes/web.php
Route::get('/user/index', [AuthController::class, 'showUserProfileForIndex'])
    ->name('user.index')
    ->middleware('auth');

// // Menampilkan halaman login
// Route::get('/login', function () {
//     return view('auth.login'); // Sesuaikan dengan folder auth
// })->name('login');

// Route::post('/login', [AuthController::class, 'login']);

// // Menampilkan halaman register
// Route::get('/register', function () {
//     return view('auth.register'); // Sesuaikan dengan folder auth
// })->name('register');

// Route::post('/register', [AuthController::class, 'register']);

// Route::get('/login-register', function () {
//     return view('auth.login-register'); // Mengarah ke file di dalam folder auth
// })->name('login-register');




// Halaman dashboard (hanya bisa diakses jika login)
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware('auth');

// Halaman admin (hanya bisa diakses oleh admin)
// Route::get('/admin', function () {
//     return view('admin');
// })->middleware(['auth', 'role:admin']);

// Route untuk halaman utama
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/paket', function () {
    return view('paket');
})->name('paket');

// Route untuk halaman utama
Route::get('/', [QnaController::class, 'listQuestions'], function () {
    return view('welcome') .'';
});


