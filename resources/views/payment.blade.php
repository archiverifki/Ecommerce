<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    {{-- Midtrans --}}
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h1 class="text-2xl font-bold text-center mb-4">Pembayaran</h1>

        <form id="payment-form" class="space-y-4">
            <div>
                <label for="name" class="block text-gray-700">Nama Pelanggan</label>
                <input id="name" type="text" class="w-full border-gray-300 rounded p-2" placeholder="Nama Anda">
            </div>
            <div>
                <label for="email" class="block text-gray-700">Email</label>
                <input id="email" type="email" class="w-full border-gray-300 rounded p-2"
                    placeholder="email@contoh.com">
            </div>
            <div>
                <label for="product" class="block text-gray-700">Produk</label>
                <input id="product" type="text" class="w-full border-gray-300 rounded p-2"
                    placeholder="Nama Produk">
            </div>
            <div>
                <label for="amount" class="block text-gray-700">Jumlah (Rp)</label>
                <input id="amount" type="number" class="w-full border-gray-300 rounded p-2" placeholder="10000">
            </div>
            <button type="button" id="pay-button"
                class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Bayar Sekarang</button>
        </form>
    </div>

    <script>
        document.getElementById('pay-button').addEventListener('click', function() {
            fetch('/payment', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        customer_name: document.getElementById('name').value,
                        customer_email: document.getElementById('email').value,
                        product_name: document.getElementById('product').value,
                        amount: document.getElementById('amount').value,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    window.snap.pay(data.snap_token, {
                        onSuccess: function(result) {
                            alert('Transaksi berhasil!');
                            console.log(result);
                        },
                        onPending: function(result) {
                            alert('Menunggu pembayaran.');
                            console.log(result);
                        },
                        onError: function(result) {
                            alert('Transaksi gagal.');
                            console.log(result);
                        },
                        onClose: function() {
                            alert('Pembayaran belum selesai!');
                        }
                    });
                });
        });
    </script>
</body>

</html>
