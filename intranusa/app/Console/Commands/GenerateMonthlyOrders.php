<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\Pelanggan;
use Illuminate\Support\Str; // pastikan ada ini di atas

class GenerateMonthlyOrders extends Command
{
    protected $signature = 'generate:monthly-orders';
    protected $description = 'Generate tagihan bulanan otomatis untuk pelanggan aktif';

    public function handle()
    {
        // Ambil semua pelanggan yang punya order status 'paid'
        $pelanggans = Pelanggan::with(['orders', 'paket'])
            ->whereHas('orders', function ($query) {
                $query->where('status', 'Paid');
            })
            ->get();
            foreach ($pelanggans as $pelanggan) {
                // Gunakan pelanggan_id yang benar dari model
                $pelangganId = $pelanggan->pelanggan_id ?? $pelanggan->id;

                $this->info("Memeriksa pelanggan dengan ID: {$pelangganId}");

                if (empty($pelangganId)) {
                    $this->error("❌ ID pelanggan tidak ditemukan untuk user_id {$pelanggan->user_id}");
                    continue;
                }

                // Cek apakah sudah ada tagihan untuk bulan ini
                $sudahAda = Order::where('pelanggan_id', $pelangganId)
                    ->whereMonth('created_at', now()->month)
                    ->whereYear('created_at', now()->year)
                    ->exists();

                if (!$sudahAda) {
                    Order::create([
                        'order_id'      => 'ORD-' . strtoupper(Str::random(10)),
                        'user_id'       => $pelanggan->user_id,
                        'pelanggan_id'  => $pelangganId,
                        'paket_id'      => $pelanggan->paket_id,
                        'total_price'   => $pelanggan->paket->harga ?? 100000,
                        'status'        => 'Unpaid',
                        'created_at'    => now(),
                        'updated_at'    => now(),
                    ]);

                    $this->info("✅ Tagihan baru dibuat untuk pelanggan ID {$pelangganId} (User ID: {$pelanggan->user_id})");
                } else {
                    $this->info("⏭ Tagihan bulan ini sudah ada untuk pelanggan ID {$pelangganId}");
                }

                // ✅ Tambahkan logika update status_langganan di sini
                $tagihanLunas = Order::where('pelanggan_id', $pelangganId)
                    ->whereMonth('created_at', now()->month)
                    ->whereYear('created_at', now()->year)
                    ->where('status', 'Paid')
                    ->exists();

                $pelanggan->status_langganan = $tagihanLunas ? 'Aktif' : 'non-aktif';
                $pelanggan->save();
            }

        // foreach ($pelanggans as $pelanggan) {
        //     // Gunakan pelanggan_id yang benar dari model
        //     $pelangganId = $pelanggan->pelanggan_id ?? $pelanggan->id;

        //     $this->info("Memeriksa pelanggan dengan ID: {$pelangganId}");

        //     if (empty($pelangganId)) {
        //         $this->error("❌ ID pelanggan tidak ditemukan untuk user_id {$pelanggan->user_id}");
        //         continue;
        //     }

        //     // Cek apakah sudah ada tagihan untuk bulan ini
        //     $sudahAda = Order::where('pelanggan_id', $pelangganId)
        //         ->whereMonth('created_at', now()->month)
        //         ->whereYear('created_at', now()->year)
        //         ->exists();

        //     if (!$sudahAda) {
        //         Order::create([
        //             'order_id'      => 'ORD-' . strtoupper(Str::random(10)),
        //             'user_id'       => $pelanggan->user_id,
        //             'pelanggan_id'  => $pelangganId,
        //             'paket_id'      => $pelanggan->paket_id,
        //             'total_price'   => $pelanggan->paket->harga ?? 100000,
        //             'status'        => 'Unpaid',
        //             'created_at'    => now(),
        //             'updated_at'    => now(),
        //         ]);

        //         $this->info("✅ Tagihan baru dibuat untuk pelanggan ID {$pelangganId} (User ID: {$pelanggan->user_id})");
        //     } else {
        //         $this->info("⏭ Tagihan bulan ini sudah ada untuk pelanggan ID {$pelangganId}");
        //     }
        // }

        $this->info("✅ Proses selesai. Semua pelanggan aktif dicek.");
    }
}
