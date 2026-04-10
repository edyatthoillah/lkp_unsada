    <header x-data="{ open: false }"
        class="fixed top-0 left-0 w-full bg-purple-950/100 text-white backdrop-blur shadow-sm shadow-black/50 z-50">

        <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">

            <!-- Logo + App Name -->
            <div class="flex items-center gap-3">
                <img src="{{ asset('storage/' . $landing->logo) }}"" class="h-10 w-auto" alt="Logo">
                <span class="text-lg font-semibold">
                    {{ $landing->nama_aplikasi }}
                </span>
            </div>

            <!-- Navigation Tengah -->
            <nav class="hidden md:flex items-center gap-8 font-medium">
                <a href="{{ route('dashboard') }}" class="hover:text-purple-200">Beranda</a>
                <a href="{{ route('programs') }}" class="hover:text-purple-200">Program</a>
                <a href="{{ route('facilities') }}" class="hover:text-purple-200">Fasilitas</a>
                <a href="{{ route('tutors') }}" class="hover:text-purple-200">Pengajar</a>
                <a href="{{ route('blogs') }}" class="hover:text-purple-200">Berita</a>
            </nav>

            <!-- Right Menu -->
            <div class="hidden md:flex items-center gap-4">
                <a href="{{ $landing->instgram }}" target="_blank"
                    class="hover:text-purple-300 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M7.75 2h8.5A5.75 5.75 0 0122 7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 012 16.25v-8.5A5.75 5.75 0 017.75 2zm8.5 1.5h-8.5A4.25 4.25 0 003.5 7.75v8.5A4.25 4.25 0 007.75 20.5h8.5a4.25 4.25 0 004.25-4.25v-8.5A4.25 4.25 0 0016.25 3.5zM12 7a5 5 0 110 10 5 5 0 010-10zm0 1.5A3.5 3.5 0 1015.5 12 3.5 3.5 0 0012 8.5zm4.88-2.38a1.13 1.13 0 11-2.25 0 1.13 1.13 0 012.25 0z" />
                    </svg>
                </a>
                <!-- Email -->
                <a href="mailto:{{ $landing->email }}" class="hover:text-purple-300 transition">
                    <i class="fas fa-envelope text-lg"></i>
                </a>
                <!-- WhatsApp -->
                <a href="https://wa.me/{{ $landing->whatsapp }}?text=Saya%20ingin%20mendapatkan%20informasi%20lebih%20lanjut%20tentang%20Program%20LKP%20Unsada"
                    target="_blank" class="hover:text-green-400 transition">
                    <i class="fab fa-whatsapp text-lg"></i>
                </a>
                {{-- <!-- Login Button -->
                @guest
                    <a href="{{ route('login') }}"
                        class="bg-white text-purple-800 px-4 py-1.5 rounded-md font-medium hover:bg-purple-100">
                        Login
                    </a>
                @endguest --}}
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
            <a href="{{ route('dashboard') }}" class="block">Beranda</a>
                <a href="{{ route('programs') }}" class="block">Program</a>
                <a href="{{ route('facilities') }}" class="block">Fasilitas</a>
                <a href="{{ route('tutors') }}" class="block">Pengajar</a>
                <a href="{{ route('blogs') }}" class="block">Berita</a>
            {{-- <a href="{{ route('login') }}"
            class="block bg-white text-purple-800 px-4 py-2 rounded-md text-center">Login</a> --}}
        </div>
    </header>