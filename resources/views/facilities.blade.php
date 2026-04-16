
    @include('layouts.header')

    <!-- SECTION FASILITAS -->
    <section class="pt-32 pb-20 bg-gradient-to-b from-purple-50 to-white">

        <div class="max-w-7xl mx-auto px-6">

            <!-- Judul -->
            <div class="text-center mb-14">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Fasilitas LKP Unsada
                </h2>
                <p class="text-gray-500 max-w-2xl mx-auto">
                    LKP Universitas Darma Persada menyediakan berbagai fasilitas modern
                    untuk mendukung proses pembelajaran yang nyaman, efektif, dan
                    berkualitas bagi seluruh peserta pelatihan.
                </p>
            </div>

            <!-- Grid Fasilitas -->
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                @foreach ($facilities as $item)
                <!-- Fasilitas 1 -->
                <div class="group relative overflow-hidden rounded-lg shadow-md">
                    <img src="{{ asset('storage/' . $item->image) }}"
                        class="w-full h-60 object-cover group-hover:scale-110 transition duration-500">

                    <div
                        class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                        <p class="text-white font-semibold text-lg">
                            {{ $item->description }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>

        </div>

    </section>

    @include('layouts.landing-footer')

    <!-- Floating WhatsApp Button -->
    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6288214140008?text=Saya%20ingin%20informasi%20LKP%20Universitas%20Darma%20Persada"
        target="_blank"
        class="fixed bottom-10 right-10 w-16 h-16 bg-green-600 rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition-transform"
        title="Chat via WhatsApp">
        <i class="fab fa-whatsapp text-white text-2xl"></i>
    </a>
</body>
</div>
</html>
