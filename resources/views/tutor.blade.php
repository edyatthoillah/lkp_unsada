
    @include('layouts.header')

    <section class="pt-24 pb-20 bg-gray-100">

        <div class="max-w-7xl mx-auto px-6">

            <!-- Judul -->
            <div class="text-center mb-14">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">
                    Pengajar Profesional LKP Unsada
                </h2>

                <p class="text-gray-600 max-w-2xl mx-auto">
                    Tim pengajar berpengalaman yang siap membimbing peserta
                    menguasai bahasa dan keterampilan profesional.
                </p>
            </div>


            <!-- Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <!-- CARD -->
                @foreach ($tutors as $item)
                    <div class="bg-white border shadow-sm rounded-lg overflow-hidden hover:shadow-md transition">

                        <img src="{{ asset('storage/' . $item->photo) }}" class="w-full aspect-[3/4] object-cover">

                        <div class="p-4">

                            <h3 class="font-semibold text-gray-800">
                                {{ $item->name }}
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                {{ $item->description }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>


    @include('layouts.landing-footer')

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
