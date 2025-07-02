<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransWebhookController extends Controller
{
    //
    public function handle(Request $request)
    {
        // set konfigurasi server key midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');

        // Buat instance notifikasi midtrans
        $notification = new Notification();

        // Ambil order_id dan status transaksi
        $orderId = $notification->order_id;
        $statusCode = $notification->status_code;
        $grossAmount = $notification->gross_amount;
        $transactionStatus = $notification->transaction_status;

        // Dapatkan signature key dari header
        $signatureKey = hash("sha512", $orderId . $statusCode . $grossAmount . config('midtrans.server_key'));

        // Verifikasi signature
        if ($signatureKey !== $notification->signature_key) {
            return response()->json([
                'message' => 'Invalid signature key'
            ], 403);
        }

        // cari booking berdasarkan id
        $bookingId = explode('-', $orderId)[1];
        $booking = Booking::find($bookingId);

        // validasi booking
        if (!$booking) {
            return response()->json([
                'message' => 'Booking not found'
            ], 403);
        }

        // handle status transaksi
        if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
            // Jika pembayaran berhasil
            $booking->update(['status' => 'paid']);
        } else if ($transactionStatus == 'expire' || $transactionStatus == 'cancel' || $transactionStatus == 'deny') {
            $booking->updated(['status' => 'failed']);
        }

        return response()->json(['message' => 'Notificaiton handle successfully']);
    }
}
