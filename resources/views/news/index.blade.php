<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Berita | {{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<div id="sakura-container" class="fixed top-0 left-0 w-full h-full pointer-events-none z-50"></div>

<body class="bg-gray-50">

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



<style>
    .sakura {
        position: absolute;
        width: 20px;
        height: 20px;
        background-image: url('images/landingpage/sakura.png');
        background-size: contain;
        background-repeat: no-repeat;
        animation-name: fall;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
    }

    @keyframes fall {
        0% {
            transform: translateY(-50px) rotate(0deg);
        }

        100% {
            transform: translateY(100vh) rotate(360deg);
        }
    }
</style>


<script>
    const container = document.getElementById('sakura-container');
    const numberOfSakura = 20;

    for (let i = 0; i < numberOfSakura; i++) {

        const leaf = document.createElement('div');
        leaf.classList.add('sakura');

        leaf.style.left = Math.random() * 100 + 'vw';
        leaf.style.animationDuration = (5 + Math.random() * 5) + 's';
        leaf.style.animationDelay = Math.random() * 5 + 's';

        container.appendChild(leaf);

    }
</script>

</html>
