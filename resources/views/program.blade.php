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
<!-- PROGRAM SERTIFIKASI -->
<div x-data="{ open: false }" class="bg-white border-l-4 border-green-500 shadow-sm rounded-lg">

    <button @click="open=!open"
        class="w-full flex justify-between items-center px-6 py-4 font-semibold text-gray-800">

        <span class="flex items-center gap-2">
            <i class="fa-solid fa-graduation-cap text-green-500"></i>
            Pelatihan Sertifikasi & Perolehan Gelar Non-Akademik
        </span>

        <i class="fa-solid fa-chevron-down transition-transform"
            :class="open ? 'rotate-180' : ''"></i>

    </button>

    <div x-show="open" x-transition class="border-t divide-y">


        <!-- PROGRAM 1 -->
        <div>

            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">

                <span>Brivet AB & Certified Tax Technician</span>

                <span class="bg-green-100 text-green-600 px-3 py-1 rounded text-sm font-semibold">
                    Rp 1.950.000
                </span>

            </div>

            <div class="flex justify-between items-center px-6 pb-4">

                <p class="text-sm text-gray-500">
                    - 15x Pertemuan (Full Online/Hybrid)
                </p>

                <a target="_blank"
                href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20mendaftar%20program%20Brivet%20AB%20%26%20Certified%20Tax%20Technician%20di%20LKP%20Universitas%20Darma%20Persada"
                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">

                    {{-- <i class="fa-brands fa-whatsapp mr-1"></i> --}}
                    Daftar Sekarang

                </a>

            </div>

        </div>


        <!-- PROGRAM 2 -->
        <div>

            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">

                <span>Pelatihan & Sertifikasi Staff SDM</span>

                <span class="bg-green-100 text-green-600 px-3 py-1 rounded text-sm font-semibold">
                    Rp 1.000.000
                </span>

            </div>

            <div class="flex justify-between items-center px-6 pb-4">

                <p class="text-sm text-gray-500">
                    - 3-4 Pertemuan (Online)
                </p>

                <a target="_blank"
                href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20mendaftar%20program%20Pelatihan%20%26%20Sertifikasi%20Staff%20SDM%20di%20LKP%20Universitas%20Darma%20Persada"
                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">

                    {{-- <i class="fa-brands fa-whatsapp mr-1"></i> --}}
                    Daftar Sekarang

                </a>

            </div>

        </div>


        <!-- PROGRAM 3 -->
        <div>

            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">

                <span>Pelatihan dan Sertifikasi Teknisi Akuntansi</span>

                <span class="bg-green-100 text-green-600 px-3 py-1 rounded text-sm font-semibold">
                    Rp 1.000.000
                </span>

            </div>

            <div class="flex justify-between items-center px-6 pb-4">

                <p class="text-sm text-gray-500">
                    - 3-5 Pertemuan (Offline)
                </p>

                <a target="_blank"
                href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20mendaftar%20program%20Pelatihan%20dan%20Sertifikasi%20Teknisi%20Akuntansi%20di%20LKP%20Universitas%20Darma%20Persada"
                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">

                    {{-- <i class="fa-brands fa-whatsapp mr-1"></i> --}}
                    Daftar Sekarang

                </a>

            </div>

        </div>


    </div>

</div>

                <!-- PROGRAM BAHASA JEPANG -->
                <div x-data="{ open: false }" class="bg-white border-l-4 border-red-500 shadow-sm rounded-lg">

                    <button @click="open=!open"
                        class="w-full flex justify-between items-center px-6 py-4 font-semibold text-gray-800">

                        <span class="flex items-center gap-2">
                            <i class="fa-solid fa-flag text-red-500"></i>
                            Program Bahasa Jepang
                        </span>

                        <i class="fa-solid fa-chevron-down transition-transform" :class="open ? 'rotate-180' : ''"></i>
                    </button>

                    <div x-show="open" x-transition class="border-t">
                        <div class="divide-y">


                            <!-- SOCKYU I -->
                            <div>
                                <div class="flex justify-between px-6 py-3 hover:bg-gray-50">
                                    <span>Kelas Reguler Tingkat Dasar Sockyu I</span>

                                    <span class="bg-red-100 text-red-600 px-3 py-1 rounded text-sm font-semibold">
                                        Rp 1.800.000
                                    </span>
                                </div>

                                <div class="flex justify-between items-center px-6 pb-4">
                                    <p class="text-sm text-gray-500">
                                        - 20 Pertemuan/Level (1A, 1B, 1C) 5-8 Orang
                                    </p>

                                    <a target="_blank"
                                        href="https://wa.me/6288214140008?text={{ urlencode('Halo, saya ingin mendaftar program Kelas Reguler Tingkat Dasar Sockyu I di LKP Universitas Darma Persada.') }}"
                                        class="bg-red-500 text-white px-4 py-1 rounded text-sm hover:bg-red-600 transition">
                                        Daftar Sekarang
                                    </a>
                                </div>
                            </div>


                            <!-- SOCKYU II -->
                            <div>
                                <div class="flex justify-between px-6 py-3 hover:bg-gray-50">
                                    <span>Kelas Reguler Tingkat Dasar Sockyu II</span>

                                    <span class="bg-red-100 text-red-600 px-3 py-1 rounded text-sm font-semibold">
                                        Rp 1.800.000
                                    </span>
                                </div>

                                <div class="flex justify-between items-center px-6 pb-4">
                                    <p class="text-sm text-gray-500">
                                        - 20 Pertemuan/Level (2A, 2B, 2C) 5-8 Orang
                                    </p>

                                    <a target="_blank"
                                        href="https://wa.me/6288214140008?text={{ urlencode('Halo, saya ingin mendaftar program Kelas Reguler Tingkat Dasar Sockyu II di LKP Universitas Darma Persada.') }}"
                                        class="bg-red-500 text-white px-4 py-1 rounded text-sm hover:bg-red-600 transition">
                                        Daftar Sekarang
                                    </a>
                                </div>
                            </div>


                            <!-- JLPT N5 OFFLINE -->
                            <div>
                                <div class="flex justify-between px-6 py-3 hover:bg-gray-50">
                                    <span>Intensive Class JLPT N5 (Offline)</span>

                                    <span class="bg-red-100 text-red-600 px-3 py-1 rounded text-sm font-semibold">
                                        Rp 2.250.000
                                    </span>
                                </div>

                                <div class="flex justify-between items-center px-6 pb-4">
                                    <p class="text-sm text-gray-500">
                                        - 24 Pertemuan (Termasuk biaya placement test & buku) 8-10 Orang
                                    </p>

                                    <a target="_blank"
                                        href="https://wa.me/6288214140008?text={{ urlencode('Halo, saya ingin mendaftar program Intensive Class JLPT N5 Offline di LKP Universitas Darma Persada.') }}"
                                        class="bg-red-500 text-white px-4 py-1 rounded text-sm hover:bg-red-600 transition">
                                        Daftar Sekarang
                                    </a>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>


                <!-- PROGRAM BAHASA INGGRIS -->
                <div x-data="{ open: false }" class="bg-white border-l-4 border-blue-500 shadow-sm rounded-lg">

                    <button @click="open=!open"
                        class="w-full flex justify-between items-center px-6 py-4 font-semibold text-gray-800">

                        <span class="flex items-center gap-2">
                            <i class="fa-solid fa-globe text-blue-500"></i>
                            Program Bahasa Inggris
                        </span>

                        <i class="fa-solid fa-chevron-down transition-transform" :class="open ? 'rotate-180' : ''"></i>

                    </button>

                    <div x-show="open" x-transition class="border-t divide-y">

                        <!-- TOEFL Offline -->
                        <div>
                            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">
                                <span>Intensive Class TOEFL (Offline)</span>

                                <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded text-sm font-semibold">
                                    Rp 1.065.000
                                </span>
                            </div>

                            <div class="flex justify-between items-center px-6 pb-4 gap-4">

                                <p class="text-sm text-gray-500">
                                    10 Pertemuan (Pre Test, pelatihan, Unlimited TOEFL ITP Test + Sertifikat) 8-10 Orang
                                </p>

                                <a target="_blank"
                                    href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20mendaftar%20program%20Intensive%20Class%20TOEFL%20Offline%20di%20LPK%20Unsada"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">

                                    Daftar Sekarang

                                </a>

                            </div>
                        </div>


                        <!-- TOEFL Online -->
                        <div>
                            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">
                                <span>Intensive Class TOEFL (Online)</span>

                                <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded text-sm font-semibold">
                                    Rp 480.000
                                </span>
                            </div>

                            <div class="flex justify-between items-center px-6 pb-4 gap-4">

                                <p class="text-sm text-gray-500">
                                    10 Pertemuan (Pre Test, pelatihan, Unlimited TOEFL ITP Test + Sertifikat) 15-20
                                    Orang
                                </p>

                                <a target="_blank"
                                    href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20mendaftar%20program%20Intensive%20Class%20TOEFL%20Online%20di%20LPK%20Unsada"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">

                                    Daftar Sekarang

                                </a>

                            </div>
                        </div>


                        <!-- TOEIC Offline -->
                        <div>
                            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">
                                <span>Intensive Class TOEIC (Offline)</span>

                                <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded text-sm font-semibold">
                                    Rp 1.065.000
                                </span>
                            </div>

                            <div class="flex justify-between items-center px-6 pb-4 gap-4">

                                <p class="text-sm text-gray-500">
                                    10 Pertemuan (Pre Test, pelatihan, Unlimited TOEFL ITP Test + Sertifikat)
                                </p>

                                <a target="_blank"
                                    href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20mendaftar%20program%20Intensive%20Class%20TOEIC%20Offline%20di%20LPK%20Unsada"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">

                                    Daftar Sekarang

                                </a>

                            </div>
                        </div>


                        <!-- TOEIC Online -->
                        <div>
                            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">
                                <span>Intensive Class TOEIC (Online)</span>

                                <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded text-sm font-semibold">
                                    Rp 480.000
                                </span>
                            </div>

                            <div class="flex justify-between items-center px-6 pb-4 gap-4">

                                <p class="text-sm text-gray-500">
                                    10 Pertemuan (Pre Test, pelatihan, Unlimited TOEFL ITP Test + Sertifikat)
                                </p>

                                <a target="_blank"
                                    href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20mendaftar%20program%20Intensive%20Class%20TOEIC%20Online%20di%20LPK%20Unsada"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">

                                    Daftar Sekarang

                                </a>

                            </div>
                        </div>


                        <!-- Test TOEFL -->
                        <div>
                            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">
                                <span>Test TOEFL ITP / TOEIC + Sertifikat</span>

                                <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded text-sm font-semibold">
                                    Rp 170.000
                                </span>
                            </div>

                            <div class="flex justify-between items-center px-6 pb-4 gap-4">

                                <p class="text-sm text-gray-500">
                                    Unlimited test on 7 days
                                </p>

                                <a target="_blank"
                                    href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20mendaftar%20Test%20TOEFL%20ITP%20atau%20TOEIC%20di%20LPK%20Unsada"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">

                                    Daftar Sekarang

                                </a>

                            </div>
                        </div>

                    </div>

                </div>

                <!-- PROGRAM BAHASA MANDARIN -->
                <div x-data="{ open: false }" class="bg-white border-l-4 border-orange-500 shadow-sm rounded-lg">

                    <button @click="open=!open"
                        class="w-full flex justify-between items-center px-6 py-4 font-semibold text-gray-800">

                        <span class="flex items-center gap-2">
                            <i class="fa-solid fa-comments text-orange-500"></i>
                            Program Bahasa Mandarin
                        </span>

                        <i class="fa-solid fa-chevron-down transition-transform" :class="open ? 'rotate-180' : ''"></i>

                    </button>

                    <div x-show="open" x-transition class="border-t divide-y">

                        <!-- HSK 4 Offline -->
                        <div>

                            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">
                                <span>HSK 4 Preparation Offline (6–8 orang)</span>

                                <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded text-sm font-semibold">
                                    Rp 2.900.000
                                </span>
                            </div>

                            <div class="flex justify-between items-center px-6 pb-4 gap-4">

                                <p class="text-sm text-gray-500">
                                    24 pertemuan (termasuk biaya placement test dan buku)
                                </p>

                                <a target="_blank"
                                    href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20mendaftar%20program%20HSK%204%20Preparation%20Offline%20di%20LPK%20Unsada"
                                    class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">
                                    Daftar Sekarang

                                </a>

                            </div>

                        </div>


                        <!-- HSK 4 Online -->
                        <div>

                            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">
                                <span>HSK 4 Preparation Online (15–20 orang)</span>

                                <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded text-sm font-semibold">
                                    Rp 1.650.000
                                </span>
                            </div>

                            <div class="flex justify-between items-center px-6 pb-4 gap-4">

                                <p class="text-sm text-gray-500">
                                    1x pretest, pelatihan, dan 1x prediction test
                                </p>

                                <a target="_blank"
                                    href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20mendaftar%20program%20HSK%204%20Preparation%20Online%20di%20LPK%20Unsada"
                                    class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">
                                    Daftar Sekarang

                                </a>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- BAHASA INDONESIA (BIPA) -->
                <div x-data="{ open: false }" class="bg-white border-l-4 border-purple-500 shadow-sm rounded-lg">

                    <button @click="open=!open"
                        class="w-full flex justify-between items-center px-6 py-4 font-semibold text-gray-800">

                        <span class="flex items-center gap-2">
                            <i class="fa-solid fa-language text-purple-500"></i>
                            Bahasa Indonesia (BIPA)
                        </span>

                        <i class="fa-solid fa-chevron-down transition-transform" :class="open ? 'rotate-180' : ''"></i>

                    </button>

                    <div x-show="open" x-transition class="border-t divide-y">

                        <!-- Privat -->
                        <div>
                            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">
                                <span>Privat (1–4 orang)</span>

                                <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded text-sm font-semibold">
                                    Rp 10.000.000 / Kelas
                                </span>
                            </div>

                            <div class="flex justify-between items-center px-6 pb-4 gap-4">

                                <p class="text-sm text-gray-500">
                                    13 Pertemuan @90 menit
                                </p>

                                <a target="_blank"
                                    href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20mendaftar%20program%20BIPA%20Privat%20(1-4%20orang)%20di%20LPK%20Unsada"
                                    class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">

                                    Daftar Sekarang

                                </a>

                            </div>
                        </div>


                        <!-- Semi Privat -->
                        <div>
                            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">
                                <span>Reguler Semi Privat (5–7 orang)</span>

                                <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded text-sm font-semibold">
                                    Rp 5.000.000 / orang
                                </span>
                            </div>

                            <div class="flex justify-between items-center px-6 pb-4 gap-4">

                                <p class="text-sm text-gray-500">
                                    32 Pertemuan @90 menit
                                </p>

                                <a target="_blank"
                                    href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20mendaftar%20program%20BIPA%20Reguler%20Semi%20Privat%20(5-7%20orang)%20di%20LPK%20Unsada"
                                    class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">

                                    Daftar Sekarang

                                </a>

                            </div>
                        </div>


                        <!-- Reguler BIPA -->
                        <div>
                            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">
                                <span>Reguler BIPA (min 10 orang) termasuk tour wisata kota</span>

                                <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded text-sm font-semibold">
                                    Rp 2.500.000 / orang
                                </span>
                            </div>

                            <div class="flex justify-between items-center px-6 pb-4 gap-4">

                                <p class="text-sm text-gray-500">
                                    10 hari / 3 sesi per hari (30 Pertemuan @90 menit)
                                </p>

                                <a target="_blank"
                                    href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20mendaftar%20program%20Reguler%20BIPA%20(min%2010%20orang)%20di%20LPK%20Unsada"
                                    class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">

                                    Daftar Sekarang

                                </a>

                            </div>
                        </div>

                    </div>

                </div>

                <!-- PRIVAT NON-NATIVE SPEAKER -->
                <div x-data="{ open: false }" class="bg-white border-l-4 border-amber-500 shadow-sm rounded-lg">

                    <button @click="open=!open"
                        class="w-full flex justify-between items-center px-6 py-4 font-semibold text-gray-800">

                        <span class="flex items-center gap-2">
                            <i class="fa-solid fa-user text-amber-500"></i>
                            Privat Non-Native Speaker (Bahasa Jepang, Mandarin)
                        </span>

                        <i class="fa-solid fa-chevron-down transition-transform" :class="open ? 'rotate-180' : ''"></i>

                    </button>

                    <div x-show="open" x-transition class="border-t divide-y">

                        <!-- ITEM 1 -->
                        <div>

                            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">

                                <span>Privat (1-2 orang)</span>

                                <span class="bg-amber-100 text-amber-600 px-3 py-1 rounded text-sm font-semibold">
                                    Rp 5.000.000 / kelas
                                </span>

                            </div>

                            <div class="flex justify-between items-center px-6 pb-4">

                                <p class="text-sm text-gray-500">
                                    6 pertemuan @120 menit
                                </p>

                                <a target="_blank"
                                    href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20mendaftar%20Privat%20Non-Native%20Speaker%20Bahasa%20Jepang/Mandarin%20(1-2%20orang)"
                                    class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">

                                    {{-- <i class="fa-brands fa-whatsapp mr-1"></i> --}}
                                    Daftar Sekarang

                                </a>

                            </div>

                        </div>


                        <!-- ITEM 2 -->
                        <div>

                            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">

                                <span>Privat (3-4 orang)</span>

                                <span class="bg-amber-100 text-amber-600 px-3 py-1 rounded text-sm font-semibold">
                                    Rp 6.500.000 / kelas
                                </span>

                            </div>

                            <div class="flex justify-between items-center px-6 pb-4">

                                <p class="text-sm text-gray-500">
                                    6 pertemuan @120 menit
                                </p>

                                <a target="_blank"
                                    href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20mendaftar%20Privat%20Non-Native%20Speaker%20Bahasa%20Jepang/Mandarin%20(3-4%20orang)"
                                    class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">

                                    {{-- <i class="fa-brands fa-whatsapp mr-1"></i> --}}
                                    Daftar Sekarang

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- PRIVAT NATIVE SPEAKER -->
                <div x-data="{ open: false }" class="bg-white border-l-4 border-indigo-500 shadow-sm rounded-lg">

                    <button @click="open=!open"
                        class="w-full flex justify-between items-center px-6 py-4 font-semibold text-gray-800">

                        <span class="flex items-center gap-2">
                            <i class="fa-solid fa-user-tie text-indigo-500"></i>
                            Privat Native Speaker Bahasa Jepang
                        </span>

                        <i class="fa-solid fa-chevron-down transition-transform" :class="open ? 'rotate-180' : ''"></i>

                    </button>

                    <div x-show="open" x-transition class="border-t divide-y">

                        <!-- ITEM 1 -->
                        <div>

                            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">

                                <span>Privat (1-2 orang)</span>

                                <span class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded text-sm font-semibold">
                                    Rp 3.000.000 / kelas
                                </span>

                            </div>

                            <div class="flex justify-between items-center px-6 pb-4">

                                <p class="text-sm text-gray-500">
                                    - 6 pertemuan @120 menit
                                </p>

                                <a target="_blank"
                                    href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20mendaftar%20Privat%20Native%20Speaker%20Bahasa%20Jepang%20(1-2%20orang)"
                                    class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">

                                    {{-- <i class="fa-brands fa-whatsapp mr-1"></i> --}}
                                    Daftar Sekarang

                                </a>

                            </div>

                        </div>

                        <!-- ITEM 2 -->
                        <div>

                            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">

                                <span>Privat (3-4 orang)</span>

                                <span class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded text-sm font-semibold">
                                    Rp 3.900.000 / kelas
                                </span>

                            </div>

                            <div class="flex justify-between items-center px-6 pb-4">

                                <p class="text-sm text-gray-500">
                                    - 6 pertemuan @120 menit
                                </p>

                                <a target="_blank"
                                    href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20mendaftar%20Privat%20Native%20Speaker%20Bahasa%20Jepang%20(3-4%20orang)"
                                    class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">

                                    {{-- <i class="fa-brands fa-whatsapp mr-1"></i> --}}
                                    Daftar Sekarang

                                </a>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- TERJEMAH & INTERPRETER -->
                <div x-data="{ open: false }" class="bg-white border-l-4 border-yellow-500 shadow-sm rounded-lg">

                    <button @click="open=!open"
                        class="w-full flex justify-between items-center px-6 py-4 font-semibold text-gray-800">

                        <span class="flex items-center gap-2">
                            <i class="fa-solid fa-file-lines text-yellow-500"></i>
                            Jasa Terjemah & Interpreter
                        </span>

                        <i class="fa-solid fa-chevron-down transition-transform" :class="open ? 'rotate-180' : ''"></i>

                    </button>

                    <div x-show="open" x-transition class="border-t divide-y">

                        <!-- ITEM 1 -->
                        <div>

                            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">
                                <span>Bahasa Indonesia → Jepang / Mandarin - Sebaliknya</span>

                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded text-sm font-semibold">
                                    Rp 250.000 / lembar
                                </span>
                            </div>

                            <div class="flex justify-between items-center px-6 pb-4">

                                <p class="text-sm text-gray-500">
                                    Minimal 1 lembar
                                </p>

                                <a target="_blank"
                                    href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20menggunakan%20layanan%20Terjemah%20Bahasa%20Indonesia%20ke%20Jepang/Mandarin"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">

                                    {{-- <i class="fa-brands fa-whatsapp mr-1"></i> --}}
                                    Daftar Sekarang

                                </a>

                            </div>

                        </div>


                        <!-- ITEM 2 -->
                        <div>

                            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">
                                <span>Bahasa Indonesia → Inggris - Sebaliknya</span>

                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded text-sm font-semibold">
                                    Rp 200.000 / lembar
                                </span>
                            </div>

                            <div class="flex justify-between items-center px-6 pb-4">

                                <p class="text-sm text-gray-500">
                                    Minimal 1 lembar
                                </p>

                                <a target="_blank"
                                    href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20menggunakan%20layanan%20Terjemah%20Bahasa%20Indonesia%20ke%20Inggris"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">

                                    {{-- <i class="fa-brands fa-whatsapp mr-1"></i> --}}
                                    Daftar Sekarang

                                </a>

                            </div>

                        </div>


                        <!-- ITEM 3 -->
                        <div>

                            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">
                                <span>Inggris → Jepang / Mandarin - Sebaliknya</span>

                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded text-sm font-semibold">
                                    Rp 350.000 / lembar
                                </span>
                            </div>

                            <div class="flex justify-between items-center px-6 pb-4">

                                <p class="text-sm text-gray-500">
                                    Minimal 1 lembar
                                </p>

                                <a target="_blank"
                                    href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20menggunakan%20layanan%20Terjemah%20Bahasa%20Inggris%20ke%20Jepang/Mandarin"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">

                                    {{-- <i class="fa-brands fa-whatsapp mr-1"></i> --}}
                                    Daftar Sekarang

                                </a>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- INTERPRETER -->
                <div x-data="{ open: false }" class="bg-white border-l-4 border-green-500 shadow-sm rounded-lg">

                    <button @click="open=!open"
                        class="w-full flex justify-between items-center px-6 py-4 font-semibold text-gray-800">

                        <span class="flex items-center gap-2">
                            <i class="fa-solid fa-headset text-green-500"></i>
                            Interpreter
                        </span>

                        <i class="fa-solid fa-chevron-down transition-transform" :class="open ? 'rotate-180' : ''"></i>

                    </button>

                    <div x-show="open" x-transition class="border-t divide-y">

                        <!-- NEGOSIASI DALAM KOTA -->
                        <div>

                            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">

                                <span>Negosiasi dalam kota</span>

                                <span class="bg-green-100 text-green-600 px-3 py-1 rounded text-sm font-semibold">
                                    Rp 3.500.000 / hari
                                </span>

                            </div>

                            <div class="flex justify-between items-center px-6 pb-4">

                                <p class="text-sm text-gray-500">
                                    Interpreter profesional
                                </p>

                                <a target="_blank"
                                    href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20memesan%20layanan%20Interpreter%20untuk%20Negosiasi%20dalam%20kota"
                                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">

                                    {{-- <i class="fa-brands fa-whatsapp mr-1"></i> --}}
                                    Daftar Sekarang

                                </a>

                            </div>

                        </div>


                        <!-- NEGOSIASI LUAR KOTA -->
                        <div>

                            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">

                                <span>Negosiasi luar kota JABODETABEK</span>

                                <span class="bg-green-100 text-green-600 px-3 py-1 rounded text-sm font-semibold">
                                    Rp 4.500.000 / hari
                                </span>

                            </div>

                            <div class="flex justify-between items-center px-6 pb-4">

                                <p class="text-sm text-gray-500">
                                    Transport belum termasuk
                                </p>

                                <a target="_blank"
                                    href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20memesan%20layanan%20Interpreter%20untuk%20Negosiasi%20luar%20kota%20JABODETABEK"
                                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">

                                    {{-- <i class="fa-brands fa-whatsapp mr-1"></i> --}}
                                    Daftar Sekarang

                                </a>

                            </div>

                        </div>


                        <!-- SEMINAR -->
                        <div>

                            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">

                                <span>Seminar</span>

                                <span class="bg-green-100 text-green-600 px-3 py-1 rounded text-sm font-semibold">
                                    Rp 3.500.000 / hari
                                </span>

                            </div>

                            <div class="flex justify-between items-center px-6 pb-4">

                                <p class="text-sm text-gray-500">
                                    Interpreter acara seminar
                                </p>

                                <a target="_blank"
                                    href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20memesan%20layanan%20Interpreter%20untuk%20acara%20Seminar"
                                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">

                                    {{-- <i class="fa-brands fa-whatsapp mr-1"></i> --}}
                                    Daftar Sekarang

                                </a>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- PENGETIKAN -->
                <div x-data="{ open: false }" class="bg-white border-l-4 border-gray-500 shadow-sm rounded-lg">

                    <button @click="open=!open"
                        class="w-full flex justify-between items-center px-6 py-4 font-semibold text-gray-800">

                        <span class="flex items-center gap-2">
                            <i class="fa-solid fa-keyboard text-gray-500"></i>
                            Pengetikan
                        </span>

                        <i class="fa-solid fa-chevron-down transition-transform" :class="open ? 'rotate-180' : ''"></i>

                    </button>

                    <div x-show="open" x-transition class="border-t divide-y">

                        <div>

                            <div class="flex justify-between px-6 py-3 hover:bg-gray-50">

                                <span>Pengetikan Bahasa Jepang / Mandarin</span>

                                <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded text-sm font-semibold">
                                    Rp 175.000 / lembar
                                </span>

                            </div>

                            <div class="flex justify-between items-center px-6 pb-4">

                                <p class="text-sm text-gray-500">
                                    Minimal 1 lembar
                                </p>

                                <a target="_blank"
                                    href="https://wa.me/6288214140008?text=Halo%20saya%20ingin%20memesan%20layanan%20Pengetikan%20Bahasa%20Jepang/Mandarin"
                                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">

                                    {{-- <i class="fa-brands fa-whatsapp mr-1"></i> --}}
                                    Daftar Sekarang

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

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
