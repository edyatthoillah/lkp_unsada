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
    <section id="about" class="py-24 bg-gradient-to-r from-purple-800/20 via-gray-50 to-purple-800/20">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-start gap-12">

            <!-- Image Kiri -->
            <div class="md:w-1/3 flex justify-center md:justify-start">
                <img src="{{ asset('storage/' . $landing->foto_tentang_kami) }}" alt="Tentang Kami"
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
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 pb-12">
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

    <section id="mitra" class="bg-white py-16 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 text-center">

            <!-- Judul -->
            <div class="mb-10">
                <h2 class="text-3xl sm:text-4xl font-extrabold mb-4 text-gray-800">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600">
                         Pengguna Jasa Kami
                    </span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    LKP Universitas Darma Persada
                </p>
            </div>

            <!-- Carousel -->
            <div class="relative w-full overflow-hidden">
                <div class="flex animate-marquee space-x-10 items-center">
                    <!-- Loop 2x biar infinite smooth -->
                    @foreach ($partners->concat($partners) as $item)
                        <div class="flex flex-col items-center min-w-[120px] group">
                            <!-- Logo -->
                            <div
                                class="bg-gray-50 p-2 rounded-xl shadow hover:shadow-lg transition w-20 h-20 flex items-center justify-center">

                                <img src="{{ asset('storage/' . $item->logo) }}" alt="{{ $item->name }}"
                                    class="max-h-full object-contain transition duration-300"
                                    onerror="this.onerror=null;this.src='https://ui-avatars.com/api/?name={{ urlencode($item->name) }}&background=EEF2FF&color=3730A3&size=128';">
                            </div>
                            <!-- Nama -->
                            <p class="mt-2 text-xs text-gray-600 text-center">
                                {{ $item->name }}
                            </p>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- STYLE ANIMATION -->
    <style>
        @keyframes marquee {
            0% {
                transform: translateX(0%);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .animate-marquee {
            display: flex;
            width: max-content;
            animation: marquee 50s linear infinite;
            /* 🔥 ubah di sini */
        }
    </style>

    <section class="bg-gradient-to-r from-purple-800/20 via-gray-50 to-purple-800/20 py-20">
        <div class="max-w-6xl mx-auto text-center px-6">

            <!-- Judul -->
            <h2 class="text-3xl sm:text-4xl font-extrabold mb-4 text-gray-800">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600">
                    Galeri Kegiatan <br>
                    LKP Unsada
                </span>
            </h2>

            <p class="text-gray-600 max-w-2xl mx-auto text-lg sm:text-xl mb-12">
                Intip momen belajar seru peserta kami.
            </p>

            <!-- Wrapper -->
            <div id="galleryWrapper"
                class="relative h-[260px] sm:h-[320px] flex items-center justify-center overflow-hidden">
                <!-- LEFT -->
                <img id="imgLeft"
                    class="absolute w-[35%] h-[200px] sm:h-[240px] object-cover rounded-xl opacity-40 scale-90 -translate-x-[80%]  transition-all duration-700 ease-in-out">

                <!-- CENTER -->
                <img id="imgCenter"
                    class="absolute w-[60%] h-[240px] sm:h-[300px] object-cover rounded-xl shadow-2xl z-10 transition-all duration-700 ease-in-out">

                <!-- RIGHT -->
                <img id="imgRight"
                    class="absolute w-[35%] h-[200px] sm:h-[240px] object-cover rounded-xl opacity-40 scale-90 translate-x-[80%]  transition-all duration-700 ease-in-out">

                <!-- BUTTON -->
                <button id="prevGallery"
                    class="absolute left-2 sm:left-0 bg-white/80 backdrop-blur shadow w-10 h-10 rounded-full hover:bg-white transition">
                    ‹
                </button>

                <button id="nextGallery"
                    class="absolute right-2 sm:right-0 bg-white/80 backdrop-blur shadow w-10 h-10 rounded-full hover:bg-white transition">
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
            const wrapper = document.getElementById("galleryWrapper")

            if (!images.length) return;

            function updateGallery() {
                const prev = (index - 1 + images.length) % images.length
                const next = (index + 1) % images.length

                // preload biar tidak flicker
                const imgPrev = new Image()
                const imgNext = new Image()

                imgPrev.src = images[prev]
                imgNext.src = images[next]

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

            nextBtn.addEventListener("click", () => {
                nextSlide()
                resetAutoSlide()
            })

            prevBtn.addEventListener("click", () => {
                prevSlide()
                resetAutoSlide()
            })

            function startAutoSlide() {
                autoSlide = setInterval(nextSlide, 4000) // 🔥 lebih santai
            }

            function stopAutoSlide() {
                clearInterval(autoSlide)
            }

            function resetAutoSlide() {
                stopAutoSlide()
                startAutoSlide()
            }

            // pause saat hover
            wrapper.addEventListener("mouseenter", stopAutoSlide)
            wrapper.addEventListener("mouseleave", startAutoSlide)

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
                            <div
                                class="bg-white rounded-2xl shadow-md overflow-hidden snap-start 
            hover:shadow-xl hover:-translate-y-2 transition duration-300 group border border-gray-100">
                                <!-- Thumbnail -->
                                <div class="relative overflow-hidden">
                                    <img src="{{ asset('storage/' . $item->thumbnail) }}"
                                        alt="{{ $item->news_title }}"
                                        class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                                    <!-- Overlay Gradient -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                                    <!-- Date Badge -->
                                    <div
                                        class="absolute bottom-3 left-3 bg-white/90 backdrop-blur px-3 py-1 text-xs rounded-full shadow text-gray-700">
                                        {{ $item->created_at->format('d M Y') }}
                                    </div>
                                </div>
                                <!-- Content -->
                                <div class="p-5">
                                    <!-- Title -->
                                    <h3
                                        class="font-semibold text-gray-900 mb-2 group-hover:text-indigo-600 transition line-clamp-2">
                                        {{ $item->news_title }}
                                    </h3>
                                    <!-- Description -->
                                    <p class="text-gray-500 text-sm mb-4 line-clamp-3">
                                        {{ Str::limit(strip_tags(html_entity_decode($item->news_content)), 250) }}
                                    </p>
                                    <!-- Read More -->
                                    <a href="{{ route('news.show', $item->slug) }}"
                                        class="inline-flex items-center gap-1 text-indigo-600 text-sm font-medium hover:gap-2 transition">
                                        Baca Selengkapnya
                                        <span class="transition">→</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- SIDEBAR WRAPPER -->
                <div class="flex flex-col h-[430px]">
                    <!-- LIST BLOG (SCROLL) -->
                    <div class="space-y-3 overflow-y-auto pr-2 scrollbar-hide scroll-smooth flex-1">
                        <!-- Item -->
                        @foreach ($news as $item)
                            <a href="{{ route('news.show', $item->slug) }}" class="group">
                                <div
                                    class="flex gap-4 mb-2 p-1 bg-white rounded-xl 
                hover:bg-gray-50 hover:shadow-md transition duration-300 border border-gray-100">
                                    <!-- Thumbnail -->
                                    <div class="overflow-hidden rounded-lg">
                                        <img src="{{ asset('storage/' . $item->thumbnail) }}"
                                            alt="{{ $item->news_title }}"
                                            class="w-24 h-20 object-cover group-hover:scale-110 transition duration-300">
                                    </div>
                                    <!-- Content -->
                                    <div class="flex flex-col justify-between">
                                        <!-- Date -->
                                        <p class="text-xs text-gray-400 mb-1">
                                            {{ $item->created_at->format('d M Y') }}
                                        </p>
                                        <!-- Title -->
                                        <h4
                                            class="text-sm font-semibold text-gray-800 leading-snug 
                       group-hover:text-indigo-600 transition">
                                            {{ Str::limit(strip_tags(html_entity_decode($item->news_content)), 100) }}
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
                    <a href="mailto:{{ $landing->email }}?subject=Konsultasi%20LKP%20Unsada&body=Halo,%20saya%20ingin%20bertanya%20tentang%20program..."
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
    <a href="https://wa.me/{{ $landing->whatsapp }}?text=Saya%20ingin%20informasi%20LKP%20Universitas%20Darma%20Persada"
        target="_blank"
        class="fixed bottom-10 right-10 w-16 h-16 bg-green-600 rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition-transform"
        title="Chat via WhatsApp">
        <i class="fab fa-whatsapp text-white text-2xl"></i>
    </a>
    </body>
    </div>

    </html>
