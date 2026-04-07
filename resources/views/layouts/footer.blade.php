    <footer class="bg-black text-white py-12">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Kolom 1: Logo & Deskripsi -->
            <div class="flex flex-col items-start space-y-4">
                <img src="{{ asset('images/landingpage/logo.png') }}" alt="Logo LKP Unsada" class="w-24">
                <p class="text-gray-300 text-sm leading-relaxed">
                    LKP UNSADA membekali peserta dengan keterampilan, bahasa, dan sertifikasi profesional untuk
                    meningkatkan kompetensi, karier, dan daya saing di dunia kerja.
                </p>
                <!-- Sosial Media -->
                <div class="flex space-x-4 mt-2">
                    <a href="{{ url('https://www.instagram.com/lpk_unsada?igsh=OTV6NG9oNW5pNWI5') }}"
                        class="text-gray-300 hover:text-white transition">
                        <i class="fab fa-instagram text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white transition">
                        <i class="fab fa-facebook-f text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white transition">
                        <i class="fab fa-twitter text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white transition">
                        <i class="fab fa-youtube text-lg"></i>
                    </a>
                </div>
            </div>

            <!-- Kolom 2: Tautan Langsung -->
            <div class="flex flex-col items-start space-y-2">
                <h4 class="text-white font-semibold mb-2">Tautan Langsung</h4>
                <a href="#beranda" class="text-gray-300 hover:text-white transition">Beranda</a>
                <a href="#tentang" class="text-gray-300 hover:text-white transition">Tentang</a>
                <a href="#layanan" class="text-gray-300 hover:text-white transition">Layanan</a>
                <a href="#blog" class="text-gray-300 hover:text-white transition">Blog</a>
            </div>

            <!-- Kolom 3: Informasi Kontak -->
            <div class="flex flex-col items-start space-y-2">
                <h4 class="text-white font-semibold mb-2">Informasi Kontak</h4>
                <p class="text-gray-300 flex items-center gap-2">
                    <i class="fas fa-map-marker-alt"></i>
                    Lt. 3-4 Gd. Rektorat, Universitas Darma Persada, Pondok Kelapa, Jakarta Timur, 13450
                </p>
                <p class="text-gray-300 flex items-center gap-2">
                    <i class="fas fa-phone"></i>
                    088214140008
                </p>
                <p class="text-gray-300 flex items-center gap-2">
                    <i class="fas fa-envelope"></i>
                    upklpk@gmail.com
                </p>
            </div>

        </div>

        <!-- Copyright -->
        <div class="mt-10 text-center text-gray-500 text-sm">
            © LKP Unsada 2026
        </div>
    </footer>
