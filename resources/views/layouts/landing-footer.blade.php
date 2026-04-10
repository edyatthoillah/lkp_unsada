    <!-- Footer -->
    <footer class="bg-black text-white py-12">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Kolom 1: Logo & Deskripsi -->
            <div class="flex flex-col items-start space-y-4">
                <img src="{{ asset('storage/' . $landing->logo) }}" alt="Logo LKP Unsada" class="w-24">
                <p class="text-gray-300 text-sm leading-relaxed">
                    LKP UNSADA membekali peserta dengan keterampilan, bahasa, dan sertifikasi profesional untuk
                    meningkatkan kompetensi, karier, dan daya saing di dunia kerja.
                </p>
                <!-- Sosial Media -->
                <div class="flex space-x-4 mt-2">
                    <a href="{{ $landing->instgram }}" target="_blank"
                        class="text-gray-300 hover:text-white transition">
                        <i class="fab fa-instagram text-lg"></i>
                    </a>
                    <a href="mailto:{{ $landing->email }}"
                        class="text-gray-300 hover:text-white transition">
                        <i class="fas fa-envelope text-lg"></i>
                    </a>
                    <a href="https://wa.me/{{ $landing->whatsapp }}?text=Saya%20ingin%20mendapatkan%20informasi%20lebih%20lanjut%20tentang%20Program%20LKP%20Unsada"
                        target="_blank" class="text-gray-300 hover:text-white transition">
                        <i class="fab fa-whatsapp text-lg"></i>
                    </a>
                </div>
            </div>

            <!-- Kolom 2: Tautan Langsung -->
            <div class="flex flex-col items-start space-y-2">
                <h4 class="text-white font-semibold mb-2">Tautan Langsung</h4>
                <a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-white transition">Beranda</a>
                <a href="{{ route('programs') }}" class="text-gray-300 hover:text-white transition">Program</a>
                <a href="{{ route('facilities') }}" class="text-gray-300 hover:text-white transition">Fasilitas</a>
                <a href="{{ route('tutors') }}" class="text-gray-300 hover:text-white transition">Pengajar</a>
                <a href="{{ route('blogs') }}" class="text-gray-300 hover:text-white transition">Berita</a>
            </div>

            <!-- Kolom 3: Informasi Kontak -->
            <div class="flex flex-col items-start space-y-2">
                <h4 class="text-white font-semibold mb-2">Informasi Kontak</h4>
                <p class="text-gray-300 flex items-center gap-2">
                    <i class="fas fa-map-marker-alt"></i>
                    {{ $landing->alamat }}
                </p>
                <p class="text-gray-300 flex items-center gap-2">
                    <i class="fas fa-phone"></i>
                    {{ $landing->whatsapp }}
                </p>
                <p class="text-gray-300 flex items-center gap-2">
                    <i class="fas fa-envelope"></i>
                    {{ $landing->email }}
                </p>
            </div>

        </div>

        <!-- Copyright -->
        <div class="mt-10 text-center text-gray-500 text-sm">
            © LKP Unsada 2026
        </div>
    </footer>