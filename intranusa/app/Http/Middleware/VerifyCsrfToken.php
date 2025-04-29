<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        // 'midtrans-callback',
        'api/payment/callback', // jika kamu pakai route api
        'payment/callback',     // jika callback-nya pakai route web
// 'https://858d-103-18-77-78.ngrok-free.app/midtrans-callback',
    ];
}
