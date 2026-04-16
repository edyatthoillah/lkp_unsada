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
                                            {{ $data->detail }}
                                        </p>
                                        <a target="_blank"
                                            href="https://wa.me/6288214140008?text={{ urlencode('Halo saya ingin mendaftar program ' . $item->name . ' (' . $data->sub_program . ') di LKP Universitas Darma Persada') }}"
                                            class="text-white px-4 py-2 rounded-lg text-sm shadow transition"
                                            style="background-color: {{ $item->color }}">

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
    </section>
    @include('layouts.landing-footer')
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
