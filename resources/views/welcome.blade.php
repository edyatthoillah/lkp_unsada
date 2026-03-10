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

    <header x-data="{ open: false }"
        class="fixed top-0 left-0 w-full bg-purple-950/100 text-white backdrop-blur shadow-sm shadow-black/50 z-50">

        <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">

            <!-- Logo + App Name -->
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/landingpage/logo.png') }}" class="h-10 w-auto" alt="Logo">
                <span class="text-lg font-semibold">
                    LKP Unsada
                </span>
            </div>

            <!-- Navigation Tengah -->
            <nav class="hidden md:flex items-center gap-8 font-medium">
                <a href="#" class="hover:text-purple-200">Beranda</a>
                <a href="#" class="hover:text-purple-200">Program</a>
                <a href="#" class="hover:text-purple-200">Fakultas</a>
                <a href="#" class="hover:text-purple-200">Pengajar</a>
                <a href="#" class="hover:text-purple-200">Blog</a>
            </nav>

            <!-- Right Menu -->
            <div class="hidden md:flex items-center gap-4">
                <!-- Social Media Icons -->
                <!-- Social Media -->
                <a href="{{ url('https://www.instagram.com/lpk_unsada?igsh=OTV6NG9oNW5pNWI5') }}"
                    class="hover:text-purple-300"> <!-- Instagram --> <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M7.75 2h8.5A5.75 5.75 0 0122 7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 012 16.25v-8.5A5.75 5.75 0 017.75 2zm8.5 1.5h-8.5A4.25 4.25 0 003.5 7.75v8.5A4.25 4.25 0 007.75 20.5h8.5a4.25 4.25 0 004.25-4.25v-8.5A4.25 4.25 0 0016.25 3.5zM12 7a5 5 0 110 10 5 5 0 010-10zm0 1.5A3.5 3.5 0 1015.5 12 3.5 3.5 0 0012 8.5zm4.88-2.38a1.13 1.13 0 11-2.25 0 1.13 1.13 0 012.25 0z" />
                    </svg> </a> <!-- Youtube --> <a href="#" class="hover:text-purple-300"> <svg
                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M23.5 6.2s-.2-1.7-.9-2.5c-.9-1-1.9-1-2.4-1.1C16.8 2.3 12 2.3 12 2.3h0s-4.8 0-8.2.3c-.5.1-1.5.1-2.4 1.1C.7 4.5.5 6.2.5 6.2S.2 8.2.2 10.2v1.6c0 2 .3 4 .3 4s.2 1.7.9 2.5c.9 1 2 1 2.5 1.1 1.8.2 7.6.3 7.6.3s4.8 0 8.2-.3c.5-.1 1.5-.1 2.4-1.1.7-.8.9-2.5.9-2.5s.3-2 .3-4v-1.6c0-2-.3-4-.3-4zM9.8 14.6V7.9l6.5 3.3-6.5 3.4z" />
                    </svg> <!-- Facebook -->
                    <a href="#" class="hover:text-purple-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.988h-2.54v-2.89h2.54V9.797c0-2.507 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562v1.875h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" />
                        </svg>
                    </a>

                    <!-- Login Button -->
                    @guest
                        <a href="{{ route('login') }}"
                            class="bg-white text-purple-800 px-4 py-1.5 rounded-md font-medium hover:bg-purple-100">
                            Login
                        </a>
                    @endguest
            </div>

            <!-- Hamburger -->
            <button @click="open=!open" class="md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

        </div>

        <!-- Mobile Menu -->
        <div x-show="open" x-transition class="md:hidden px-6 pb-6 space-y-4">
            <a href="#" class="block">Beranda</a>
            <a href="#" class="block">Program</a>
            <a href="#" class="block">Fakultas</a>
            <a href="#" class="block">Pengajar</a>
            <a href="#" class="block">Blog</a>
            <a href="{{ route('login') }}"
                class="block bg-white text-purple-800 px-4 py-2 rounded-md text-center">Login</a>
        </div>
    </header>
    <!-- HERO SECTION -->
    <section x-data="heroSlider()" x-init="start()"
        class="relative h-[100vh] flex items-center justify-center text-white text-center overflow-hidden">

        <!-- Background Images -->
        <template x-for="(image, index) in images" :key="index">
            <img :src="image" x-show="current === index" x-transition:enter="transition-opacity duration-1000"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                class="absolute inset-0 w-full h-full object-cover" alt="Hero">
        </template>

        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black/70"></div>

        <!-- Content -->
        <div class="relative z-10 max-w-6xl mx-auto px-6">

            <h1 class="text-2xl md:text-4xl lg:text-5xl font-black m-4">
                Lembaga Kursus dan Pelatihan (LKP)
            </h1>

            <h1 class="text-2xl md:text-4xl lg:text-5xl font-black mb-6">
                Universitas Darma Persada
            </h1>
            <a href="https://wa.me/6281234567890?text=Saya%20ingin%20mendapatkan%20informasi%20lebih%20lanjut%20tentang%20Program%20LKP%20Unsada"
                target="_blank"
                class="inline-flex items-center gap-3
                        bg-gradient-to-r from-indigo-600 via-purple-600 to-fuchsia-600
                        hover:from-indigo-700 hover:via-purple-700 hover:to-fuchsia-700
                        px-7 py-3 rounded-xl font-semibold text-white
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
                    class="rounded-xl shadow-2xl w-full max-w-sm object-cover hover:scale-105 transition-transform duration-500">
            </div>

            <!-- Konten Teks Kanan -->
            <div class="md:w-2/3 flex flex-col justify-center text-center md:text-left">
                <h2 class="text-4xl font-extrabold text-gray-800 mb-6">Tentang Kami</h2>
                <p class="text-gray-600 mb-8 leading-relaxed text-lg break-words">
                    Era globalisasi yang didukung dengan terbentuknya APEC dan
                    AFTA mengharuskan semua negara mempersiapkan diri untuk
                    menghadapi persaingan serta kerja sama dalam bidang
                    perdagangan internasional dan pengembangan hubungan
                    antarnegara. Kondisi tersebut membutuhkan peningkatan
                    keterampilan staf dalam hubungan luar negeri
                    Faktor utama yang sangat penting sebagai sarana mengikuti
                    perkembangan tersebut adalah pengetahuan kemampuan
                    berkomunikasi
                    Dalam kaitan tersebut, LPK UNSADA di bawah pembinaan
                    Universitas Darma Persada yang didirikan pada tanggal 6 Juli
                    1986 ikut membantu meningkatkan kemampuan keterampilan
                    berbahasa asing khususnya bahasa Asia Timur (Jepang,
                    Cina/Mandarin). Di samping itu, LPK UNSADA memberikan
                    pelayanan kursus Bahasa Indonesia sebagai Bahasa Asing,
                    kursus Bahasa Inggris, kursus Aplikasi Komputer dan pelayanan
                    Jasa Penerjamahan
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <a href="{{ url('https://drive.google.com/file/d/114xvaIUdO3PbeOfk2N9PGlvS2R2dwpkJ/view?usp=drive_link') }}"
                        target="_blank"
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

                <!-- Card 1 -->
                <div
                    class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition duration-300 flex flex-col items-center text-center">
                    <div class="w-16 h-16 flex items-center justify-center bg-indigo-100 rounded-full shadow-md mb-4">
                        <i class="fas fa-language text-indigo-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Pelatihan Bahasa</h3>
                    <p class="text-gray-600 leading-relaxed text-sm sm:text-base">
                        LKP Unsada menyelenggarakan pelatihan bahasa Inggris, Jepang, Mandarin, dan Indonesia (BIPA)
                        untuk meningkatkan kemampuan komunikasi dan profesionalisme peserta.
                    </p>
                </div>

                <!-- Card 2 -->
                <div
                    class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition duration-300 flex flex-col items-center text-center">
                    <div class="w-16 h-16 flex items-center justify-center bg-indigo-100 rounded-full shadow-md mb-4">
                        <i class="fas fa-chalkboard-teacher text-indigo-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Kelas Intensive</h3>
                    <p class="text-gray-600 leading-relaxed text-sm sm:text-base">
                        Kelas Intensive JLPT, HSK, TEFL, dan TOEIC untuk meningkatkan kemampuan bahasa dan persiapan
                        sertifikasi profesional peserta.
                    </p>
                </div>

                <!-- Card 3 -->
                <div
                    class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition duration-300 flex flex-col items-center text-center">
                    <div class="w-16 h-16 flex items-center justify-center bg-indigo-100 rounded-full shadow-md mb-4">
                        <i class="fas fa-certificate text-indigo-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Sertifikasi</h3>
                    <p class="text-gray-600 leading-relaxed text-sm sm:text-base">
                        Menyediakan sertifikasi BNSP, Gelar Non-Akademik, dan BRIVET A&B untuk meningkatkan kompetensi
                        dan profesionalisme peserta.
                    </p>
                </div>

                <!-- Card 4 -->
                <div
                    class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition duration-300 flex flex-col items-center text-center">
                    <div class="w-16 h-16 flex items-center justify-center bg-indigo-100 rounded-full shadow-md mb-4">
                        <i class="fas fa-globe text-indigo-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Cultural Immersion</h3>
                    <p class="text-gray-600 leading-relaxed text-sm sm:text-base">
                        LKP Unsada menghadirkan Indonesian Language & Cultural Immersion Program untuk mempelajari
                        bahasa Indonesia sekaligus mengenal budaya secara langsung.
                    </p>
                </div>

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
                    class="absolute w-[40%] h-[240px] object-cover rounded-2xl opacity-50 scale-90 -translate-x-[70%] transition-all duration-900 ease-in-out">

                <!-- IMAGE CENTER -->
                <img id="imgCenter"
                    class="absolute w-[55%] h-[300px] object-cover rounded-2xl shadow-xl z-10 transition-all duration-900 ease-in-out">

                <!-- IMAGE RIGHT -->
                <img id="imgRight"
                    class="absolute w-[40%] h-[240px] object-cover rounded-2xl opacity-50 scale-90 translate-x-[70%] transition-all duration-900 ease-in-out">

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

            const images = [
                "{{ asset('images/landingpage/slider/slide1.webp') }}",
                "{{ asset('images/landingpage/slider/slide2.webp') }}",
                "{{ asset('images/landingpage/slider/slide3.webp') }}",
                "{{ asset('images/landingpage/slider/slide4.webp') }}",
                "{{ asset('images/landingpage/slider/slide5.webp') }}"
            ];

            let index = 0
            let autoSlide

            const left = document.getElementById("imgLeft")
            const center = document.getElementById("imgCenter")
            const right = document.getElementById("imgRight")

            const nextBtn = document.getElementById("nextGallery")
            const prevBtn = document.getElementById("prevGallery")

            function updateGallery() {

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

                    <!-- CARD -->
                    <div class="basis-full sm:basis-1/2 lg:basis-1/3 flex-shrink-0 px-4">
                        <div class="bg-white rounded-2xl shadow-lg p-8 h-full">

                            <div class="text-gray-300 text-5xl mb-4">“</div>

                            <p class="text-gray-600 text-sm mb-8">
                                Mengikuti pelatihan di LPK UNSADA benar-benar membuka wawasan saya.
                            </p>

                            <div class="-mx-8 border-t mb-4"></div>

                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/60?img=3" class="w-12 h-12 rounded-full">
                                <div>
                                    <p class="font-semibold">Santoso Budi</p>
                                    <p class="text-sm text-gray-500">Peserta TOEIC</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- CARD -->
                    <div class="basis-full sm:basis-1/2 lg:basis-1/3 flex-shrink-0 px-4">
                        <div class="bg-white rounded-2xl shadow-lg p-8 h-full">

                            <div class="text-gray-300 text-5xl mb-4">“</div>

                            <p class="text-gray-600 text-sm mb-8">
                                Program sertifikasi dan kelas intensif sangat membantu karier saya.
                            </p>

                            <div class="-mx-8 border-t mb-4"></div>

                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/60?img=5" class="w-12 h-12 rounded-full">
                                <div>
                                    <p class="font-semibold">Siti Aminah</p>
                                    <p class="text-sm text-gray-500">Peserta JLPT</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- CARD -->
                    <div class="basis-full sm:basis-1/2 lg:basis-1/3 flex-shrink-0 px-4">
                        <div class="bg-white rounded-2xl shadow-lg p-8 h-full">

                            <div class="text-gray-300 text-5xl mb-4">“</div>

                            <p class="text-gray-600 text-sm mb-8">
                                Materinya sangat aplikatif untuk dunia kerja.
                            </p>

                            <div class="-mx-8 border-t mb-4"></div>

                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/60?img=12" class="w-12 h-12 rounded-full">
                                <div>
                                    <p class="font-semibold">Rina Ackerman</p>
                                    <p class="text-sm text-gray-500">Peserta BIPA</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- CARD -->
                    <div class="basis-full sm:basis-1/2 lg:basis-1/3 flex-shrink-0 px-4">
                        <div class="bg-white rounded-2xl shadow-lg p-8 h-full">

                            <div class="text-gray-300 text-5xl mb-4">“</div>

                            <p class="text-gray-600 text-sm mb-8">
                                Materinya sangat aplikatif untuk dunia kerja.
                            </p>

                            <div class="-mx-8 border-t mb-4"></div>

                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/60?img=12" class="w-12 h-12 rounded-full">
                                <div>
                                    <p class="font-semibold">Rina Ackerman</p>
                                    <p class="text-sm text-gray-500">Peserta BIPA</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- CARD -->
                    <div class="basis-full sm:basis-1/2 lg:basis-1/3 flex-shrink-0 px-4">
                        <div class="bg-white rounded-2xl shadow-lg p-8 h-full">

                            <div class="text-gray-300 text-5xl mb-4">“</div>

                            <p class="text-gray-600 text-sm mb-8">
                                Materinya sangat aplikatif untuk dunia kerja.
                            </p>

                            <div class="-mx-8 border-t mb-4"></div>

                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/60?img=12" class="w-12 h-12 rounded-full">
                                <div>
                                    <p class="font-semibold">Rina Ackerman</p>
                                    <p class="text-sm text-gray-500">Peserta BIPA</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- CARD -->
                    <div class="basis-full sm:basis-1/2 lg:basis-1/3 flex-shrink-0 px-4">
                        <div class="bg-white rounded-2xl shadow-lg p-8 h-full">

                            <div class="text-gray-300 text-5xl mb-4">“</div>

                            <p class="text-gray-600 text-sm mb-8">
                                Materinya sangat aplikatif untuk dunia kerja.
                            </p>

                            <div class="-mx-8 border-t mb-4"></div>

                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/60?img=12" class="w-12 h-12 rounded-full">
                                <div>
                                    <p class="font-semibold">Rina Ackerman</p>
                                    <p class="text-sm text-gray-500">Peserta BIPA</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- CARD -->
                    <div class="basis-full sm:basis-1/2 lg:basis-1/3 flex-shrink-0 px-4">
                        <div class="bg-white rounded-2xl shadow-lg p-8 h-full">

                            <div class="text-gray-300 text-5xl mb-4">“</div>

                            <p class="text-gray-600 text-sm mb-8">
                                Materinya sangat aplikatif untuk dunia kerja.
                            </p>

                            <div class="-mx-8 border-t mb-4"></div>

                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/60?img=12" class="w-12 h-12 rounded-full">
                                <div>
                                    <p class="font-semibold">Rina Ackerman</p>
                                    <p class="text-sm text-gray-500">Peserta BIPA</p>
                                </div>
                            </div>

                        </div>
                    </div>

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
                    Blog <br>
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
                            <div class="bg-white rounded-xl shadow-sm overflow-hidden snap-start">
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
                                        {{ Str::limit($item->news_content, 100) }}
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
                <div class="flex flex-col h-[440px]">

                    <!-- LIST BLOG (SCROLL) -->
                    <div class="space-y-6 overflow-y-auto pr-2 scrollbar-hide scroll-smooth flex-1">

                        <!-- Item -->
                        <div class="flex gap-4">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=300&q=60"
                                class="w-24 h-20 object-cover rounded-lg">

                            <div>
                                <p class="text-xs text-gray-400 mb-1">16 Mei 2024</p>
                                <h4 class="text-sm font-semibold text-gray-800">
                                    LKP Unsada Berhasil mencetak lulusan profesional
                                </h4>
                            </div>
                        </div>

                        <!-- Item -->
                        <div class="flex gap-4">
                            <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=300&q=60"
                                class="w-24 h-20 object-cover rounded-lg">

                            <div>
                                <p class="text-xs text-gray-400 mb-1">16 Mei 2024</p>
                                <h4 class="text-sm font-semibold text-gray-800">
                                    Pelatihan berbasis industri di LKP Unsada
                                </h4>
                            </div>
                        </div>

                        <!-- Item -->
                        <div class="flex gap-4">
                            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=300&q=60"
                                class="w-24 h-20 object-cover rounded-lg">

                            <div>
                                <p class="text-xs text-gray-400 mb-1">16 Mei 2024</p>
                                <h4 class="text-sm font-semibold text-gray-800">
                                    Tips sukses mengikuti kursus profesional
                                </h4>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="flex gap-4">
                            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=300&q=60"
                                class="w-24 h-20 object-cover rounded-lg">

                            <div>
                                <p class="text-xs text-gray-400 mb-1">16 Mei 2024</p>
                                <h4 class="text-sm font-semibold text-gray-800">
                                    Tips sukses mengikuti kursus profesional
                                </h4>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="flex gap-4">
                            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=300&q=60"
                                class="w-24 h-20 object-cover rounded-lg">

                            <div>
                                <p class="text-xs text-gray-400 mb-1">16 Mei 2024</p>
                                <h4 class="text-sm font-semibold text-gray-800">
                                    Tips sukses mengikuti kursus profesional
                                </h4>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="flex gap-4">
                            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=300&q=60"
                                class="w-24 h-20 object-cover rounded-lg">

                            <div>
                                <p class="text-xs text-gray-400 mb-1">16 Mei 2024</p>
                                <h4 class="text-sm font-semibold text-gray-800">
                                    Tips sukses mengikuti kursus profesional
                                </h4>
                            </div>
                        </div>

                    </div>

                    <!-- LINK BAWAH -->
                    <div class="pt-4 text-right">
                        <a href="#" class="text-red-500 text-sm font-medium hover:underline">
                            Lihat blog lainnya →
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

                    <a href="https://wa.me/6288214140008?text=Saya%20ingin%20informasi%20LKP%20Universitas%20Darma%20Persada"
                        class="bg-green-600 text-white pl-10 pr-6 py-3 rounded-lg
        shadow-xl ring-1 ring-black/5
        hover:bg-green-700 hover:shadow-2xl
        transition duration-300">
                        Whatsapp
                    </a>
                </div>

                <!-- Instagram -->
                <div class="relative">
                    <div class="absolute -left-5 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow-lg">
                        <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" class="w-7 h-7">
                    </div>

                    <a href="{{ url('https://www.instagram.com/lpk_unsada?igsh=OTV6NG9oNW5pNWI5') }}"
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

                    <a href="#"
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
