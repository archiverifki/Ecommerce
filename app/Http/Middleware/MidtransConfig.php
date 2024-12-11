<?php

namespace App\Http\Middleware;

use Closure;
use Midtrans\Config;
use Illuminate\Support\Facades\Log;

class MidtransConfig
{
    public function handle($request, Closure $next)
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Cek log untuk memastikan middleware berjalan
        Log::info('Midtrans configuration applied');

        return $next($request);
    }

}


