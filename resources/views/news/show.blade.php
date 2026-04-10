<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $news->news_title }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">

    @include('layouts.header')

    <!-- Content -->
    <section class="py-16 mt-16">
        <div class="max-w-4xl mx-auto px-6">

            <!-- Judul -->
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {{ $news->news_title }}
            </h1>

            <!-- Tanggal -->
            <div class="flex items-center text-gray-500 text-sm mb-6">
                <i class="fa-regular fa-clock mr-2"></i>
                {{ $news->created_at->format('d F Y') }}
            </div>

            <!-- Thumbnail -->
            <img src="{{ asset('storage/' . $news->thumbnail) }}" class="w-full h-[420px] object-cover rounded-xl mb-8">

            <!-- Isi Berita -->
            <div class="prose max-w-none text-gray-700 leading-8 text-lg text-justify">
                {!! $news->news_content !!}
            </div>

        </div>
    </section>


    <!-- Berita lainnya -->
    @if ($latestNews->count())
        <section class="pb-20">
            <div class="max-w-7xl mx-auto px-6">

                <h2 class="text-2xl font-bold mb-8">Berita Lainnya</h2>

                <div class="grid md:grid-cols-3 gap-6">

                    @foreach ($latestNews as $item)
                        <a href="{{ route('news.show', $item->slug) }}"
                            class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition">

                            <img src="{{ asset('storage/' . $item->thumbnail) }}" class="w-full h-40 object-cover">

                            <div class="p-4">

                                <p class="text-gray-400 text-sm mb-2">
                                    {{ $item->created_at->format('d M Y') }}
                                </p>

                                <h3 class="font-semibold text-gray-900">
                                    {{ Str::limit($item->news_title, 60) }}
                                </h3>

                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </section>
    @endif


@include('layouts.landing-footer')

</body>

</html>
