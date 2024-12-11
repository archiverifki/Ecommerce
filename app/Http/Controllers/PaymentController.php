<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{

    public function itemshow($idProduk)
    {


        // $p = Produk::find($idProduk);
        $produks = Produk::get();
        $p = Produk::where('id', $idProduk)->first();


        // dd($produks);
        return view('app.chart', compact('p', 'produks'));

        // $produks->dd();


    }

    public function paymentProcess(Request $request, $id)
    {



        // Validasi data
        $validated = $request->validate([
            'customer_name' => 'required|string',
            'customer_email' => 'required|email',
            'product_name' => 'required|string',
            'amount' => 'required|numeric|min:1000',
            // 'quantity' => 'required|numeric|min:1',

        ]);

        try {
            // Buat parameter transaksi
            $transactionDetails = [
                'order_id' => 'ORDER_' . time(), // Buat Order ID unik
                'gross_amount' => $validated['amount'],
            ];

            $customerDetails = [
                'first_name' => $validated['customer_name'],
                'email' => $validated['customer_email'],
            ];

            $itemDetails = [
                [
                    'id' => 'product_' . $id,  // Ganti dengan ID produk yang sesuai
                    'price' => $validated['amount'],
                    // 'quantity' => $validated['quantity'],
                    'quantity' => 1,

                    'name' => $validated['product_name'],
                ],
            ];

            // Buat payload untuk Midtrans Snap
            $snapPayload = [
                'transaction_details' => $transactionDetails,
                'customer_details' => $customerDetails,
                'item_details' => $itemDetails,
            ];

            // Dapatkan snap token
            $snapToken = Snap::getSnapToken($snapPayload);

            return response()->json(['snap_token' => $snapToken], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }


    }







}
