{{-- Produk Sale --}}
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8">Flash Sale</h2>
        <!-- Slider Container -->
        <div class="relative overflow-hidden group">
            <!-- Slider Wrapper -->
            <div id="slider" class="flex overflow-x-scroll no-scrollbar">
                <!-- Item -->
                @foreach ($produks as $p)
                    <div class="min-w-[250px] bg-white rounded-lg shadow-lg p-3 mx-2">
                        <img src="{{ asset('storage/' . $p->fotodepan) }}" alt="Product 2"
                            class="w-full h-40 object-cover" />
                        <div class="flex flex-col justify-center">
                            <h3 class="text-lg text-black mb-2">{{ $p->name }}</h3>
                            <p class="text-red-600 font-bold mb-2">{{ $p->price }}</p>


                            <a href="{{ Route('chart.item', $p->id) }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>


<script>
    const slider = document.getElementById("slider");

    // Tambahkan event listener untuk wheel (scroll horizontal)
    slider.addEventListener("wheel", (event) => {
        // Cegah scroll vertikal
        if (event.deltaX > 0) {
            event.preventDefault();
            slider.scrollLeft += event.deltaX;
        }
    });
</script>
