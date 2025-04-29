<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FormController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PDFController;

use App\Http\Controllers\TagihanController;


use App\Http\Controllers\GangguanController;
use App\Http\Controllers\QnaController;
use App\Http\Controllers\FeedbackController;


use App\Http\Controllers\SubscriptionController;

// User membuka halaman berhenti langganan
Route::get('/user/berhenti-berlangganan', [SubscriptionController::class, 'cancelSubscriptionView'])->middleware('auth');

// User submit pembatalan langganan
Route::post('/user/berhenti-berlangganan', [SubscriptionController::class, 'cancelSubscription'])->name('cancel.subscription')->middleware('auth');

// // Admin lihat daftar permintaan pembatalan
// Route::get('/admin/berhenti-berlangganan', [SubscriptionController::class, 'showPendingCancellations'])->middleware('auth');

// // Admin setujui atau tolak pembatalan
// Route::post('/admin/berhenti-berlangganan/{userId}/{status}', [SubscriptionController::class, 'approveCancelSubscription'])->name('admin.approve.cancel')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/berhenti-berlangganan', [SubscriptionController::class, 'showPendingCancellations']);
    Route::post('/admin/approve-cancel/{userId}/{status}', [SubscriptionController::class, 'approveCancelSubscription']);
});


Route::post('/chatbot/respond', [QnaController::class, 'respond'])->name('chatbot.respond');

Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

Route::middleware(['auth'])->group(function () {
    // Halaman untuk admin melihat semua laporan gangguan
    Route::get('/admin/gangguan', [GangguanController::class, 'index'])->name('gangguan.index')->middleware('role:admin');

    // Halaman untuk user membuat laporan gangguan
    Route::get('/gangguan/create', [GangguanController::class, 'create'])->name('gangguan.create');
    Route::post('/gangguan', [GangguanController::class, 'store'])->name('gangguan.store');

    Route::get('/gangguan/{id}', [GangguanController::class, 'show'])->name('gangguan.show');
    Route::post('/gangguan/{id}/update-status', [GangguanController::class, 'updateStatus'])->name('gangguan.updateStatus');

});

// Route::get('/admin/gangguan', [GangguanController::class, 'index'])->name('gangguan.index')->middleware('role:admin');
Route::get('/gangguan', [GangguanController::class, 'index'])->name('gangguan.index');

Route::get('/lapor-gangguan', [GangguanController::class, 'create'])->name('gangguan.create');
Route::post('/lapor-gangguan', [GangguanController::class, 'store'])->name('gangguan.store');

// Halaman pembayaran
Route::get('/pay/{order}', [TagihanController::class, 'pay'])->name('user.tagihan');

// Callback dari Midtrans (POST dari server Midtrans)
Route::post('/midtrans/callback', [TagihanController::class, 'midtransCallback'])->name('midtrans.callback');

// (Opsional) Halaman setelah sukses bayar
Route::view('/payment-success', 'payment.success')->name('payment.success');



// Route::get('/tagihan', [App\Http\Controllers\OrderController::class, 'index'])->name('tagihan.index');
// Route::get('/tagihan', [OrderController::class, 'index']);
// use App\Http\Controllers\TagihanController;

// Route::middleware('auth')->prefix('user')->group(function () {
//     Route::get('/tagihan', [TagihanController::class, 'index'])->name('user.tagihan.index');
// });



use Illuminate\Http\Request;
use App\Models\Transaction; // Ganti model sesuai nama

// Route::post('/midtrans/callback', [NotifikasiController::class, 'handleMidtransCallback']);

// Route::post('/midtrans/webhook', function (Request $request) {
//     $notif = $request->all();

//     \Log::info('Midtrans Webhook', $notif);

//     $orderId = $notif['order_id'] ?? null;
//     $transactionStatus = $notif['transaction_status'] ?? null;

//     if ($orderId && $transactionStatus === 'settlement') {
//         $transaction = Transaction::where('order_id', $orderId)->first();
//         if ($transaction) {
//             $transaction->status = 'paid';
//             $transaction->save();
//         }
//     }

//     return response()->json(['message' => 'Webhook received']);
// });
use App\Http\Controllers\PaymentController;

// Route::middleware('auth')->group(function () {
//     Route::get('/user/payment', function () {
//         return view('user.payment', ['amount' => 50000]);
//     })->name('user.payment.page');

//     Route::post('/user/payment/create', [PaymentController::class, 'createTransaction'])->name('payment.create');
// });

// Callback dari Midtrans
// Route::post('/midtrans/callback', [PaymentController::class, 'handleCallback']);





Route::middleware(['auth'])->group(function () {
    Route::get('/admin/notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi.index');
    Route::post('/admin/notifikasi/{id}/approve', [NotifikasiController::class, 'approveLangganan'])->name('notifikasi.approve');
    Route::post('/admin/notifikasi/{id}/reject', [NotifikasiController::class, 'rejectLangganan'])->name('notifikasi.reject');
});


// Route::get('/admin/notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi.index');

// Route::post('/notifikasi/{id}/read', [NotifikasiController::class, 'markAsRead'])->name('notifikasi.read');

use App\Http\Controllers\PelangganController;

    // Route untuk menampilkan halaman admin/data dengan form pelanggan
    // Route::get('/data', [PelangganController::class, 'data'])->name('admin.data');
    // Route::post('/data', [PelangganController::class, 'store'])->name('admin.store');
    Route::get('/admin/data-pelanggan', [AdminController::class, 'data_laporan'])->name('admin.data_laporan');

    Route::middleware(['auth'])->group(function () {
        Route::get('/admin/data', [PelangganController::class, 'data'])->name('pelanggan.data');
        Route::post('/data', [PelangganController::class, 'store'])->name('pelanggan.store');
        // Route::get('/data/detail/{id}', [AdminController::class, 'getDetail'])->name('admin.data.detail');
    });
    Route::get('/data/detail/{id}', [AdminController::class, 'getDetail'])->name('admin.data.detail');

    // Route::get('/data/detail/{id}', [AdminController::class, 'getDetail'])->name('admin.data.detail');
    // Route::get('/data/detail/{id}', [AdminController::class, 'getDetail'])->name('admin.data.detail');

    // Route::get('/data', [PelangganController::class, 'data'])->name('pelanggan.data');
    // Route::get('/data', [PelangganController::class, 'data'])->name('pelanggan.data');

// Route::get('/form/lokasi', [FormController::class, 'step1']);
// Route::post('/form/datadiri', [FormController::class, 'step2']);
// Route::get('/form/datadiri', [FormController::class, 'showStep2'])->name('form.datadiri');

// Route::post('/form/paket', [FormController::class, 'step3']);
// Route::get('/form/paket', [FormController::class, 'showStep3'])->name('form.paket');

// Route::post('/form/syarat', [FormController::class, 'step4']);
// Route::get('/form/syarat', [FormController::class, 'showStep4'])->name('form.syarat');

// Route::post('/form/sukses', [FormController::class, 'store']);
// Route::get('/form/success', [FormController::class, 'success'])->name('form.success');

// Route::get('/user/form/lokasi', [FormController::class, 'step1'])->name('user.form.lokasi');
// Route::post('/form/lokasi', [FormController::class, 'step2']);

// Route::get('/form/datadiri', [FormController::class, 'showStep2'])->name('form.datadiri');
// Route::post('/form/datadiri', [FormController::class, 'step3']);

// Route::get('/form/syarat', [FormController::class, 'showSyarat'])->name('form.syarat');
// Route::post('/form/syarat', [FormController::class, 'acceptSyarat']);

// Route::get('/form/paket', [FormController::class, 'showStep3'])->name('form.paket');
// Route::post('/form/paket', [FormController::class, 'step4']);

// Route::get('/form/success', [FormController::class, 'success'])->name('form.success');

Route::get('/user/form/lokasi', [FormController::class, 'step1'])->name('user.form.lokasi');
Route::post('/user/form/lokasi', [FormController::class, 'step2']);

Route::get('/user/form/datadiri', [FormController::class, 'showStep2'])->name('user.form.datadiri');
Route::post('/user/form/datadiri', [FormController::class, 'step3']);

Route::get('/user/form/syarat', [FormController::class, 'showSyarat'])->name('user.form.syarat');
Route::post('/user/form/syarat', [FormController::class, 'acceptSyarat']);

Route::get('/user/form/paket', [FormController::class, 'showStep3'])->name('user.form.paket');
Route::post('/user/form/paket', [FormController::class, 'step4']);

// Route::get('/form/payment', [FormController::class, 'step5'])->name('user.form.payment');
Route::post('/form/syarat', [FormController::class, 'acceptSyarat'])->name('user.form.syarat.accept');
// Route::get('/form/payment', [FormController::class, 'showPaymentMethod'])->name('user.form.payment');

Route::post('/payment/callback', [FormController::class, 'handleCallback'])->name('payment.callback');

Route::get('/user/form/success', [FormController::class, 'success'])->name('user.form.success');

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

// Route::middleware('auth')->prefix('admin')->group(function () {

//     Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');


//         Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

//     Route::get('/data', [AdminController::class, 'data'])->name('admin.data');

//     // Halaman Survei Admin
//     Route::get('/survei', function () {
//         return view('admin.survei');
//     })->name('admin.survei');
// });

use App\Http\Middleware\RoleMiddleware;

Route::middleware(['auth', RoleMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/dashboard/detail/{id}', [AdminController::class, 'getDetail'])->name('admin.dashboard.detail');
    // Route::get('/users', [PDFController::class, 'generatePDF']);
    Route::get('/laporan/view', [PDFController::class, 'viewPDF'])->name('laporan.view');
    Route::get('/laporan/download', [PDFController::class, 'downloadPDF'])->name('laporan.download');

    // Jika ingin halaman biasa untuk laporan pelanggan
    Route::get('/laporan_pelanggan', function () {
        return view('admin.laporan_pelanggan');
    });
    Route::get('/laporan', function () {
        return view('admin.laporan');
    });

    Route::resource('qna', \App\Http\Controllers\QnaController::class)->names('admin.qna');

    Route::get('/survei', [FeedbackController::class, 'index'])->name('admin.feedback');
    Route::get('/export-feedback', [FeedbackController::class, 'exportPdf'])->name('feedback.exportPdf');

    // Route::get('/data', [AdminController::class, 'data'])->name('admin.data');
    // Route::get('/survei', function () {
    //     return view('admin.survei');
    // })->name('admin.survei');
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


// Halaman pembayaran untuk user
Route::get('/user/payment', [PaymentController::class, 'showPaymentPage'])->name('user.payment');
// Route::get('/user/tagihan', [TagihanController::class, 'showPaymentPage'])->name('user.tagihan');

// Proses checkout pembayaran
Route::post('/user/checkout', [PaymentController::class, 'checkout'])->name('user.checkout');


Route::post('/midtrans/callback', [PaymentController::class, 'callback']);


// Route::post('/midtrans/callback', [PaymentController::class, 'callback'])->name('midtrans.callback');
// Menampilkan invoice setelah pembayaran
Route::get('/user/invoice/{id}', [PaymentController::class, 'invoice'])->name('user.invoice');

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
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [QnaController::class, 'listQuestions'], function () {
    return view('welcome') .'';
});
