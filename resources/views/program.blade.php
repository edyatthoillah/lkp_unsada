<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<div id="sakura-container" class="fixed top-0 left-0 w-full h-full pointer-events-none z-50"></div>

<body class="bg-gray-50">

    @include('layouts.header')

    <section class="pt-32 pb-20 bg-gray-100">

        <div class="max-w-6xl mx-auto px-6">

            <!-- Judul -->
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">
                    Program Layanan LKP Unsada
                </h2>

                <p class="text-gray-600">
                    Program pelatihan bahasa dan sertifikasi profesional
                </p>
            </div>


            <div class="space-y-6">

                @foreach ($program as $item)
                    <!-- PROGRAM SERTIFIKASI -->
                    <div x-data="{ open: false }" class="bg-white border-l-4 shadow-sm rounded-lg"
                        style="border-color: {{ $item->color }}">

                        <button @click="open=!open"
                            class="w-full flex justify-between items-center px-6 py-4 font-semibold text-gray-800">

                            <span class="flex items-center gap-2">
                                <i class="{{ $item->icon }}" style="color: {{ $item->color }}"></i>
                                {{ $item->name }}
                            </span>

                            <i class="fa-solid fa-chevron-down transition-transform"
                                :class="open ? 'rotate-180' : ''"></i>

                        </button>

                        <div x-show="open" x-transition class="border-t divide-y">
                            @foreach ($item->details as $data)
                                <div>

                                    <div class="flex justify-between px-6 py-3 hover:bg-gray-50">

                                        <span>{{ $data->sub_program }}</span>

                                        <span class="bg-slate-50 px-3 py-1 rounded text-sm font-semibold"
                                            style="color: {{ $item->color }}">
                                            @if ($data->harga)
                                                Rp {{ number_format($data->harga, 0, ',', '.') }}
                                            @else
                                                -
                                            @endif
                                        </span>

                                    </div>

                                    <div class="flex justify-between items-center px-6 pb-4">

                                        <p class="text-sm text-gray-500">
                                            - 15x Pertemuan (Full Online/Hybrid)
                                        </p>

                                        <a target="_blank"
                                            href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20mendaftar%20program%20Brivet%20AB%20%26%20Certified%20Tax%20Technician%20di%20LKP%20Universitas%20Darma%20Persada"
                                            class="text-white px-4 py-2 rounded-lg text-sm shadow transition"
                                            style="background-color: {{ $item->color }}">

                                            {{-- <i class="fa-brands fa-whatsapp mr-1"></i> --}}
                                            Daftar Sekarang
                                        </a>

                                    </div>

                                </div>
                            @endforeach

                        </div>

                    </div>
                @endforeach


            </div>


        </div>

        </div>
    </section>


    <!-- Footer -->
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

<style>
    .sakura {
        position: absolute;
        width: 20px;
        height: 20px;
        background-image: url('images/landingpage/sakura.png');
        /* gambar sakura kecil */
        background-size: contain;
        background-repeat: no-repeat;
        animation-name: fall;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
    }

    @keyframes fall {
        0% {
            transform: translateY(-50px) rotate(0deg);
            opacity: 1;
        }

        100% {
            transform: translateY(100vh) rotate(360deg);
            opacity: 0.8;
        }
    }
</style>

<script>
    const container = document.getElementById('sakura-container');
    const numberOfSakura = 20; // bisa diubah sesuai banyak daun

    for (let i = 0; i < numberOfSakura; i++) {
        const leaf = document.createElement('div');
        leaf.classList.add('sakura');

        // posisi awal acak
        leaf.style.left = Math.random() * 100 + 'vw';
        leaf.style.animationDuration = (5 + Math.random() * 5) + 's'; // 5-10 detik
        leaf.style.animationDelay = Math.random() * 5 + 's';
        leaf.style.width = (15 + Math.random() * 20) + 'px';
        leaf.style.height = leaf.style.width;

        container.appendChild(leaf);
    }
</script>

</html>
