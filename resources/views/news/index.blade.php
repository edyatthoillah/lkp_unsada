    @include('layouts.header')
    <!-- HERO BLOG -->
    <section class="bg-white border-b mt-16">
        <div class="max-w-7xl mx-auto px-6 py-14 text-center">

            <h1 class="text-4xl font-bold text-gray-900 mb-4">
                Berita & Artikel
            </h1>

            <p class="text-gray-500 max-w-xl mx-auto">
                Temukan informasi terbaru mengenai kegiatan, pelatihan, dan berita
                dari LKP Universitas Darma Persada.
            </p>

        </div>
    </section>
    <!-- BLOG LIST -->
    <section class="py-16">

        <div class="max-w-7xl mx-auto px-6">
            <!-- GRID NEWS -->
            <div class="grid md:grid-cols-3 gap-8">

                @foreach ($news as $item)
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition">

                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->news_title }}" loading="lazy"
                            class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex items-center text-gray-400 text-sm mb-3">
                                <i class="fa-regular fa-clock mr-2"></i>
                                {{ $item->created_at->format('d M Y') }}
                            </div>

                            <h3 class="font-semibold text-gray-900 mb-3 text-lg">
                                {{ $item->news_title }}
                            </h3>
                            <p class="text-gray-500 text-sm mb-4">
                                {{ Str::limit(strip_tags($item->news_content), 120) }}
                            </p>
                            <a href="{{ route('news.show', $item->slug) }}" class="text-red-500 font-medium text-sm">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- PAGINATION -->
            <div class="mt-14 flex justify-center">
                {{ $news->links() }}
            </div>
        </div>
    </section>
    @include('layouts.landing-footer')
    <!-- Floating WA -->
    <a href="https://wa.me/6288214140008"
        class="fixed bottom-10 right-10 w-16 h-16 bg-green-600 rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition">
        <i class="fab fa-whatsapp text-white text-2xl"></i>
    </a>
    </body>
    </html>
