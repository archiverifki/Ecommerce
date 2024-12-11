<div class="flex max-w-4xl mx-auto p-10 rounded-lg shadow-md overflow-hidden">
    <!-- Product Section -->
    <div class=" mt-10 grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
        <!-- Image Section -->
        <div>
            <div class="overflow-hidden group zoom-container border rounded-md w-full h-auto" id="zoomContainer"
                style="height: 400px">
                <img id="mainImage" src="{{ asset('storage/' . $p->fotodepan) }}" alt="Product Image"
                    class="w-full h-full object-cover zoom-image" />
            </div>
            <div class="flex flex-wrap gap-2">
                <div class="flex gap-2 mt-4">
                    <img src="{{ asset('storage/' . $p->fotodepan) }}" alt="Thumbnail 1" onclick="changeImage(this.src)"
                        class="w-16 h-16 object-cover rounded-md cursor-pointer border hover:ring-2 hover:ring-gray-500" />
                </div>
                <div class="flex gap-2 mt-4">
                    <img src="{{ asset('storage/' . $p->fotobelakang) }}" alt="Thumbnail 2"
                        onclick="changeImage(this.src)"
                        class="w-16 h-16 object-cover rounded-md cursor-pointer border hover:ring-2 hover:ring-gray-500" />
                </div>
            </div>
        </div>


        <!-- Info Section -->
        <div>
            {{-- Title --}}
            <h2 class="text-2xl font-semibold text-gray-800">
                {{ $p->name }}
            </h2>
            <p class="mt-4 text-gray-600">
                Tetap aktif dan nyaman sepanjang hari dengan Kaos Bensen dari Greenlight! Dibuat dari bahan katun
                berkualitas tinggi yang mampu menyerap keringat dengan baik, kaos ini memberikan kenyamanan ekstra,
                bahkan
                saat cuaca panas dan aktivitas padat.
            </p>
            <!-- Price -->
            <div class="mt-4">
                <span class="text-red-600 text-xl font-bold">Rp {{ $p->price }}</span>
                <span class="line-through text-red-500 ml-2">Rp 109.000</span>
                <span class="ml-2 text-green-600">5% Off</span>
            </div>
            <!-- Options -->

            <!-- Warna -->
            <div class="mb-4">
                <h4 class="text-gray-700 font-semibold">Warna</h4>
                <div class="flex gap-4 mt-2">
                    <label class="flex items-center">
                        <input type="radio" name="color" value="Graphite Grey" class="hidden peer" />
                        <div
                            class="px-4 py-2 bg-gray-200 rounded-md cursor-pointer flex items-center gap-2 hover:bg-gray-300 peer-checked:bg-red-500 peer-checked:text-white">
                            Graphite Grey
                        </div>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="color" value="Mint Green" class="hidden peer" />
                        <div
                            class="px-4 py-2 bg-gray-200 rounded-md cursor-pointer flex items-center gap-2 hover:bg-gray-300 peer-checked:bg-red-500 peer-checked:text-white">
                            Mint Green
                        </div>
                    </label>
                </div>
            </div>

            <!-- Size -->
            <div class="mb-4">
                <h4 class="text-gray-700 font-semibold">Storage</h4>
                <div class="flex gap-4 mt-2">

                    <label class="flex items-center">
                        <input type="radio" name="size" value="S" class="hidden peer" />
                        <div
                            class="px-4 py-2 bg-gray-200 rounded-md cursor-pointer hover:bg-gray-300 peer-checked:bg-red-500 peer-checked:text-white">
                            S
                        </div>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="size" value="S" class="hidden peer" />
                        <div
                            class="px-4 py-2 bg-gray-200 rounded-md cursor-pointer hover:bg-gray-300 peer-checked:bg-red-500 peer-checked:text-white">
                            S
                        </div>
                    </label>


                </div>
            </div>

            <!-- Kuantitas -->
            <div class="mb-4">
                <h4 class="text-gray-700 font-semibold">Kuantitas</h4>
                <div class="flex items-center gap-4 mt-2">
                    <!-- Tombol Kurangi -->
                    <button id="decrease" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                        -
                    </button>
                    <!-- Input Kuantitas -->
                    <input id="quantity" type="number" min="1"
                        class="w-12 text-center border border-gray-300 rounded-md focus:outline-none" />
                    <!-- Tombol Tambah -->
                    <button id="increase" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                        +
                    </button>
                    <!-- Informasi Stok -->
                    <span id="stock-info" class="text-gray-500">tersisa {{ $p->stock }} buah</span>
                </div>
            </div>


            <!-- Action Button -->
            <div class="mt-6">
                <button id="pay-button" class="w-full bg-red-600 text-white py-3 rounded-md text-lg hover:bg-red-700">
                    Beli Sekarang
                </button>
            </div>


        </div>
    </div>
</div>



{{-- Zoom Image --}}
<script>
    const zoomContainer = document.getElementById("zoomContainer");
    const mainImage = document.getElementById("mainImage");

    // Add event listeners for mouse movement over the zoom container
    zoomContainer.addEventListener("mousemove", (e) => {
        const rect = zoomContainer.getBoundingClientRect();
        const x = ((e.clientX - rect.left) / rect.width) * 100;
        const y = ((e.clientY - rect.top) / rect.height) * 100;

        // Adjust the transform-origin based on mouse position
        mainImage.style.transformOrigin = `${x}% ${y}%`;
        mainImage.style.transform = "scale(2.5)"; // Zoom level
    });

    // Reset zoom on mouse leave
    zoomContainer.addEventListener("mouseleave", () => {
        mainImage.style.transformOrigin = "center center";
        mainImage.style.transform = "scale(1)";
    });

    // Change the main image
    function changeImage(src) {
        mainImage.src = src;
    }
</script>

{{-- QTY Count --}}
<script>
    // Jumlah stok maksimal (diambil dari server atau atribut data)
    const maxStock = {{ $p->stock }};
    let quantity = 1;
    const qty = document.getElementById("quantity");



    // Ambil elemen dari DOM
    const quantityInput = document.getElementById("quantity");
    const decreaseButton = document.getElementById("decrease");
    const increaseButton = document.getElementById("increase");
    const stockInfo = document.getElementById("stock-info");

    // Fungsi untuk memperbarui kuantitas
    function updateQuantity(newQuantity) {
        quantity = newQuantity;
        quantityInput.value = quantity;

        // Perbarui informasi stok
        // stockInfo.textContent = `tersisa ${maxStock - quantity} buah`;

        // console.log(quantity);
    }

    // Event listener untuk tombol kurangi
    decreaseButton.addEventListener("click", () => {
        if (quantity > 1) {
            updateQuantity(quantity - 1);
        }
    });

    // Event listener untuk tombol tambah
    increaseButton.addEventListener("click", () => {
        if (quantity < maxStock) {
            updateQuantity(quantity + 1);
        }
    });

    // Event listener untuk input manual
    quantityInput.addEventListener("input", (e) => {
        let inputValue = parseInt(e.target.value, 10);

        // Validasi input angka
        if (isNaN(inputValue) || inputValue < 1) {
            inputValue = 1;
        } else if (inputValue > maxStock) {
            inputValue = maxStock;
        }

        updateQuantity(inputValue);
    });

    // Inisialisasi tampilan awal
    updateQuantity(quantity);
</script>




<script>
    const productId = @json($p->id);

    const nama = "yoi";
    const email = "yoi@yoi.com";
    const product = "tshirt";
    const amount = 15000;



    $(document).ready(function() {
        // Menangani klik tombol bayar
        $('#pay-button').click(function() {

            // Kirim data ke server menggunakan AJAX
            $.ajax({
                url: "/produk/" + productId,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF Token
                    customer_name: nama,
                    customer_email: email,
                    product_name: product,
                    // quantity: quantity,
                    amount: amount,
                },
                success: function(response) {
                    // Ketika server merespons dengan snap_token
                    window.snap.pay(response.snap_token, {
                        onSuccess: function(result) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Pembayaran Sukses!',
                                text: 'Terima kasih atas pembayaran Anda.',
                                confirmButtonText: 'OK'
                            });
                            console.log('Pembayaran sukses:', result);
                        },
                        onPending: function(result) {
                            Swal.fire({
                                icon: 'info',
                                title: 'Menunggu Pembayaran!',
                                text: 'Pembayaran Anda sedang diproses. Mohon tunggu sebentar.',
                                confirmButtonText: 'OK'
                            });
                            console.log('Pembayaran tertunda:', result);
                        },
                        onError: function(result) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Pembayaran Gagal!',
                                text: 'Terjadi kesalahan pada sistem pembayaran. Silakan coba lagi.',
                                confirmButtonText: 'OK'
                            });
                            console.log('Error pembayaran:', result);
                        },
                        onClose: function() {
                            Swal.fire({
                                icon: 'info',
                                title: 'Transaksi Dibatalkan',
                                text: 'Anda telah menutup pembayaran sebelum selesai.',
                                confirmButtonText: 'OK'
                            });

                        }
                    });
                },
                error: function(xhr, status, error) {
                    // Menangani jika terjadi error saat mengirim request
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan!',
                        text: 'Tidak dapat memproses pembayaran. Silakan coba lagi.',
                        confirmButtonText: 'OK'
                    });
                    console.log('Error:', error);
                }
            });
        });
    });
</script>

{{-- Midtrans Ajax --}}
