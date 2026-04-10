<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LKP Unsada') }}</title>

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

    <!-- HERO SECTION -->
    <section x-data="heroSlider()" x-init="start()"
        class="relative h-[100vh] flex items-center justify-center text-white text-center overflow-hidden">
        <!-- Background Images -->
        <img src="{{ asset('storage/' . $landing->image_hero) }}" class="absolute inset-0 w-full h-full object-cover"
            alt="Hero">
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black/70"></div>
        <!-- Content -->
        <div class="relative z-10 max-w-6xl mx-auto px-6">
            <h1 class="text-2xl md:text-4xl lg:text-5xl font-black m-8">
                {{ $landing->hero_section }}
            </h1>
            <a href="https://wa.me/{{ $landing->whatsapp }}?text=Saya%20ingin%20mendapatkan%20informasi%20lebih%20lanjut%20tentang%20Program%20LKP%20Unsada"
                target="_blank"
                class="inline-flex items-center gap-3
                        bg-gradient-to-r from-indigo-600 via-purple-600 to-fuchsia-600
                        hover:from-indigo-700 hover:via-purple-700 hover:to-fuchsia-700
                        px-7 py-3 rounded-lg font-semibold text-white
                        shadow-[0_8px_25px_rgba(124,58,237,0.5)]
                        hover:shadow-[0_12px_35px_rgba(124,58,237,0.7)]
                        transition-all duration-300
                        hover:scale-105 hover:-translate-y-0.5">
                Daftar Sekarang
            </a>
        </div>

    </section>
    <!-- Tentang Kami Section Modern -->
    <section id="about"
        class="py-24 relative min-h-[100vh] bg-gradient-to-r from-purple-800/20 via-gray-50 to-purple-800/20">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-start gap-12">

            <!-- Image Kiri -->
            <div class="md:w-1/3 flex justify-center md:justify-start">
                <img src="{{ asset('images/landingpage/about.jpg') }}" alt="Tentang Kami"
                    class="rounded-lg shadow-2xl w-full max-w-sm object-cover hover:scale-105 transition-transform duration-500">
            </div>

            <!-- Konten Teks Kanan -->
            <div class="md:w-2/3 flex flex-col justify-center text-center md:text-left">
                <h2 class="text-4xl font-extrabold text-gray-800 mb-6">Tentang Kami</h2>
                <p class="text-gray-600 mb-8 leading-relaxed text-lg break-words text-justify">
                    {{ $landing->tentang_kami }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <a href="{{ $landing->link_brosur }}" target="_blank"
                        class="py-3 px-8 bg-blue-900 text-white font-semibold rounded-lg shadow-lg hover:bg-blue-950 transition flex items-center justify-center gap-2">
                        <i class="fas fa-download"></i> Unduh Brosur
                    </a>
                </div>
            </div>

        </div>
    </section>


    <!-- Layanan Section -->
    {{-- bg-gray-50 --}}
    <section id="layanan" class="bg-gradient-to-r from-purple-800/20 via-gray-50 to-purple-800/20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <!-- Judul Section -->
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-extrabold mb-4 text-gray-800 relative inline-block">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600">
                        Layanan Kami
                    </span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg sm:text-xl leading-relaxed">
                    LKP Unsada menyelenggarakan pelatihan bahasa Inggris, Jepang, Mandarin, dan Indonesia (BIPA) untuk
                    meningkatkan kemampuan komunikasi dan profesionalisme peserta.
                </p>
            </div>

            <!-- Grid 4 Card -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

                @foreach ($services as $item)
                    <div
                        class="bg-white p-7 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 border border-gray-100 group">

                        <div class="flex flex-col items-center text-center">

                            <div
                                class="w-16 h-16 flex items-center justify-center bg-indigo-100 rounded-full shadow-md mb-5 group-hover:bg-indigo-600 transition">
                                <i
                                    class="{{ $item->icon }} text-indigo-600 text-2xl group-hover:text-white transition"></i>
                            </div>

                            <h3 class="text-xl font-bold mb-3 text-gray-800">
                                {{ $item->name }}
                            </h3>

                            <p class="text-gray-600 leading-relaxed text-sm sm:text-base text-center">
                                {{ $item->description }}
                            </p>

                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class=" bg-gradient-to-r from-purple-800/20 via-gray-50 to-purple-800/20 py-20">
        <div class="max-w-5xl mx-auto text-center px-6">

            {{-- <h2 class="text-3xl font-bold text-gray-900">
                Galeri Kegiatan <br>
                Lembaga Kursus dan Pelatihan (LKP) Unsada
            </h2> --}}
            <h2 class="text-3xl sm:text-4xl font-extrabold mb-4 text-gray-800 relative inline-block">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600">
                    Galeri Kegiatan <br>
                    Lembaga Kursus dan Pelatihan (LKP) Unsada
                </span>
            </h2>

            <p class="text-gray-600 max-w-2xl mx-auto text-lg sm:text-xl leading-relaxed">
                Galeri kegiatan LKP UNSADA – Intip momen belajar seru peserta kami.
            </p>

            {{-- <p class="text-gray-500 max-w-2xl mx-auto mt-4 mb-12">
                Galeri kegiatan LKP UNSADA – Intip momen belajar seru peserta kami.
            </p> --}}

            <div class="relative h-[320px] flex items-center justify-center overflow-hidden">

                <!-- IMAGE LEFT -->
                <img id="imgLeft"
                    class="absolute w-[40%] h-[240px] object-cover rounded-lg opacity-50 scale-90 -translate-x-[70%] transition-all duration-900 ease-in-out">

                <!-- IMAGE CENTER -->
                <img id="imgCenter"
                    class="absolute w-[55%] h-[300px] object-cover rounded-lg shadow-xl z-10 transition-all duration-900 ease-in-out">

                <!-- IMAGE RIGHT -->
                <img id="imgRight"
                    class="absolute w-[40%] h-[240px] object-cover rounded-lg opacity-50 scale-90 translate-x-[70%] transition-all duration-900 ease-in-out">

                <!-- BUTTON -->
                <button id="prevGallery"
                    class="absolute left-0 bg-white shadow w-10 h-10 rounded-full hover:bg-gray-100">
                    ‹
                </button>

                <button id="nextGallery"
                    class="absolute right-0 bg-white shadow w-10 h-10 rounded-full hover:bg-gray-100">
                    ›
                </button>

            </div>

        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const images = @json($galleries->map(fn($item) => asset('storage/' . $item->image)));

            let index = 0;
            let autoSlide;

            const left = document.getElementById("imgLeft")
            const center = document.getElementById("imgCenter")
            const right = document.getElementById("imgRight")

            const nextBtn = document.getElementById("nextGallery")
            const prevBtn = document.getElementById("prevGallery")

            function updateGallery() {

                if (images.length === 0) return;

                const prev = (index - 1 + images.length) % images.length
                const next = (index + 1) % images.length

                left.src = images[prev]
                center.src = images[index]
                right.src = images[next]
            }

            function nextSlide() {
                index = (index + 1) % images.length
                updateGallery()
            }

            function prevSlide() {
                index = (index - 1 + images.length) % images.length
                updateGallery()
            }

            nextBtn.addEventListener("click", nextSlide)
            prevBtn.addEventListener("click", prevSlide)

            function startAutoSlide() {
                autoSlide = setInterval(nextSlide, 3000)
            }

            function stopAutoSlide() {
                clearInterval(autoSlide)
            }

            const gallery = document.querySelector(".relative")

            gallery.addEventListener("mouseenter", stopAutoSlide)
            gallery.addEventListener("mouseleave", startAutoSlide)

            updateGallery()
            startAutoSlide()

        })
    </script>

    <section class="bg-blue-950 py-20">
        <div class="max-w-7xl mx-auto px-6 text-center">

            <h2 class="text-4xl font-bold text-white mb-4">
                Apa Kata Mereka <br> Tentang LKP Unsada ?
            </h2>

            <p class="text-blue-100 max-w-3xl mx-auto mb-16">
                Dengarkan pengalaman para peserta yang telah mengikuti pelatihan di LPK UNSADA.
            </p>

            <div class="overflow-hidden">

                <!-- SLIDER -->
                <div id="testimonialSlider" class="flex transition-transform duration-500">

                    @foreach ($testimonials as $item)
                        <div class="basis-full sm:basis-1/2 lg:basis-1/3 flex-shrink-0 px-4">

                            <div
                                class="bg-white rounded-lg shadow-lg p-8 h-full hover:shadow-2xl transition duration-300">

                                <!-- Quote Icon -->
                                <div class="text-red-400 text-5xl mb-4 leading-none">
                                    “
                                </div>

                                <!-- Message -->
                                <p class="text-gray-600 text-sm leading-relaxed text-justify mb-8">
                                    {{ $item->message }}
                                </p>

                                <!-- Divider -->
                                <div class="border-t border-gray-100 mb-4"></div>

                                <!-- User -->
                                <div class="flex justify-between gap-3">

                                    {{-- <img src="{{ $item->photo ? asset('storage/' . $item->photo) : 'https://i.pravatar.cc/60' }}"
                                        class="w-14 h-14 rounded-full object-cover border"> --}}


                                    <p class="font-semibold text-gray-800">
                                        {{ $item->name }}
                                    </p>

                                    <p class="text-sm text-gray-500">
                                        {{ $item->position }}
                                    </p>


                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>
            </div>

            <!-- BUTTON -->
            <div class="flex justify-center mt-10 gap-4">

                <button id="prevBtn"
                    class="w-12 h-12 rounded-full border border-purple-600 text-purple-500 flex items-center justify-center hover:bg-purple-600 hover:text-white">
                    ‹
                </button>

                <button id="nextBtn"
                    class="w-12 h-12 rounded-full bg-purple-500 text-white flex items-center justify-center hover:bg-purple-600">
                    ›
                </button>

            </div>

        </div>
    </section>

    <section class="bg-gradient-to-r from-purple-800/20 via-gray-50 to-purple-800/20 py-20">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Heading -->
            <div class="text-center mb-14">
                <h2 class="text-3xl font-bold text-gray-900">
                    Berita <br>
                    Lembaga Kursus dan Pelatihan (LKP) Unsada
                </h2>
            </div>

            <!-- Grid -->
            <div class="grid lg:grid-cols-3 gap-10">

                <!-- BLOG BESAR -->
                <div class="lg:col-span-2 overflow-x-auto scrollbar-hide scroll-smooth">

                    <div class="grid grid-flow-col grid-rows-1 auto-cols-[48%] gap-8 min-w-full snap-x snap-mandatory">

                        @foreach ($news as $item)
                            <!-- Card -->
                            <div class="bg-white rounded-lg shadow-sm overflow-hidden snap-start">
                                <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->news_title }}"
                                    class="w-full h-48 object-cover">

                                <div class="p-6">
                                    <div class="flex items-center text-gray-400 text-sm mb-3">
                                        <span>🕒</span>
                                        <span class="ml-2">{{ $item->created_at->format('d-m-Y') }}</span>
                                    </div>

                                    <h3 class="font-semibold text-gray-900 mb-3">
                                        {{ $item->news_title }}
                                    </h3>

                                    <p class="text-gray-500 text-sm mb-4">
                                        {{ Str::limit(strip_tags(html_entity_decode($item->news_content)), 120) }}
                                    </p>

                                    <a href="{{ route('news.show', $item->slug) }}"
                                        class="text-red-500 text-sm font-medium">
                                        Baca Selengkapnya →
                                    </a>

                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>

                <!-- SIDEBAR WRAPPER -->
                <div class="flex flex-col h-[500px]">

                    <!-- LIST BLOG (SCROLL) -->
                    <div class="space-y-6 overflow-y-auto pr-2 scrollbar-hide scroll-smooth flex-1">

                        <!-- Item -->
                        @foreach ($news as $item)
                            <a href="{{ route('news.show', $item->slug) }}">
                                <div class="flex gap-4 mb-3 bg-white rounded-lg">
                                    <img src="{{ asset('storage/' . $item->thumbnail) }}"
                                        alt="{{ $item->news_title }}" class="w-24 h-20 object-cover rounded-lg">

                                    <div>
                                        <p class="text-xs text-gray-400 mb-1">{{ $item->created_at->format('d-m-Y') }}
                                        </p>
                                        <h4 class="text-sm font-semibold text-gray-800">
                                            {{ Str::limit(strip_tags(html_entity_decode($item->news_content)), 90) }}
                                        </h4>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <!-- LINK BAWAH -->
                    <div class="pt-4 text-right">
                        <a href="{{ route('blogs') }}" class="text-red-500 text-sm font-medium hover:underline">
                            Lihat berita lainnya →
                        </a>
                    </div>

                </div>


            </div>

        </div>
    </section>

    <style>
        /* Hilangkan scrollbar tapi tetap bisa scroll */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            /* IE dan Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>

    <section class="bg-gradient-to-r from-purple-800/20 via-gray-50 to-purple-800/20 py-20">
        <div class="max-w-4xl mx-auto text-center px-6">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                Siap jadi bagian dari LKP Unsada ? <br>
                Daftar Sekarang !
            </h2>
            <p class="text-gray-500 mb-12 max-w-2xl mx-auto">
                Jangan tunda lagi! Bergabunglah dengan LKP UNSADA dan raih peluang terbaik
                untuk meningkatkan kompetensi dan karier Anda.
            </p>
            <div class="flex flex-wrap justify-center gap-8">
                <!-- WhatsApp -->
                <div class="relative">
                    <div class="absolute -left-5 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow-lg">
                        <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" class="w-7 h-7">
                    </div>
                    <a href="https://wa.me/{{ $landing->whatsapp }}?text=Halo%20saya%20ingin%20informasi%20tentang%20program%20di%20LPK%20Universitas%20Darma%20Persada"
                        target="_blank"
                        class="bg-green-600 text-white pl-10 pr-6 py-3 rounded-lg
                        shadow-xl ring-1 ring-black/5
                        hover:bg-green-700 hover:shadow-2xl
                        transition duration-300">
                        WhatsApp
                    </a>
                </div>
                <!-- Instagram -->
                <div class="relative">
                    <div class="absolute -left-5 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow-lg">
                        <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" class="w-7 h-7">
                    </div>
                    <a href="{{ $landing->instagram }}" target="_blank"
                        class="bg-pink-500 text-white pl-10 pr-6 py-3 rounded-lg
                        shadow-xl ring-1 ring-black/5
                        hover:bg-pink-600 hover:shadow-2xl
                        transition duration-300">
                        Instagram
                    </a>
                </div>
                <!-- Email -->
                <div class="relative">
                    <div class="absolute -left-5 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow-lg">
                        <img src="https://cdn-icons-png.flaticon.com/512/732/732200.png" class="w-7 h-7">
                    </div>
                    <a href="mailto:{{ $landing->email }}"
                        class="bg-blue-500 text-white pl-10 pr-6 py-3 rounded-lg
                        shadow-xl ring-1 ring-black/5
                        hover:bg-blue-600 hover:shadow-2xl
                        transition duration-300">
                        Email
                    </a>
                </div>
            </div>
        </div>
    </section>

@include('layouts.landing-footer')

    <!-- Floating WhatsApp Button -->
    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/{{ $landing->whatsapp }}?text=Saya%20ingin%20informasi%20LKP%20Universitas%20Darma%20Persada"
        target="_blank"
        class="fixed bottom-10 right-10 w-16 h-16 bg-green-600 rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition-transform"
        title="Chat via WhatsApp">
        <i class="fab fa-whatsapp text-white text-2xl"></i>
    </a>
    <script>
        function heroSlider() {
            return {
                current: 0,
                images: [
                    "{{ asset('images/landingpage/hero1.png') }}",
                    "{{ asset('images/landingpage/hero2.png') }}",
                    "{{ asset('images/landingpage/hero3.png') }}"
                ],
                start() {
                    setInterval(() => {
                        this.current = (this.current + 1) % this.images.length
                    }, 5000) // ganti gambar tiap 5 detik
                }
            }
        }
    </script>
    <script>
        const slider = document.getElementById("testimonialSlider")
        const next = document.getElementById("nextBtn")
        const prev = document.getElementById("prevBtn")

        let index = 0

        function getCardsPerView() {
            if (window.innerWidth < 640) return 1
            if (window.innerWidth < 1024) return 2
            return 3
        }

        function updateSlider() {
            const cardsPerView = getCardsPerView()
            const move = 100 / cardsPerView
            slider.style.transform = `translateX(-${index * move}%)`
        }

        next.onclick = () => {
            const cards = slider.children.length
            const cardsPerView = getCardsPerView()

            if (index < cards - cardsPerView) {
                index++
                updateSlider()
            }
        }

        prev.onclick = () => {
            if (index > 0) {
                index--
                updateSlider()
            }
        }

        window.addEventListener("resize", updateSlider)
    </script>
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
