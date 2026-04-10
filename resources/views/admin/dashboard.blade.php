<x-app-layout>
    <div class="py-8 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-4">

            <!-- WRAPPER -->
            <div class="bg-gray-50 border border-gray-200 p-6">

                <!-- WELCOME -->
                <div class="bg-white border border-gray-200 p-6 mb-6">

                    <h1 class="text-xl font-semibold text-gray-800">
                        Dashboard Admin
                    </h1>

                    <p class="text-sm text-gray-500 mt-1">
                        Selamat datang, {{ Auth::user()->name }}
                    </p>

                </div>


                <!-- STATISTIK -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">

                    <div class="bg-white border border-gray-200 border-l-4 border-blue-600 p-4">
                        <p class="text-xs text-gray-500">TOTAL PENGAJAR</p>
                        <h2 class="text-xl font-semibold text-gray-800">{{ $countTutors }}</h2>
                    </div>

                    <div class="bg-white border border-gray-200 border-l-4 border-green-600 p-4">
                        <p class="text-xs text-gray-500">TOTAL BERITA</p>
                        <h2 class="text-xl font-semibold text-gray-800">{{ $countNews }}</h2>
                    </div>

                    <div class="bg-white border border-gray-200 border-l-4 border-purple-600 p-4">
                        <p class="text-xs text-gray-500">TOTAL TESTIMONI</p>
                        <h2 class="text-xl font-semibold text-gray-800">{{ $countTestimonial }}</h2>
                    </div>

                    <div class="bg-white border border-gray-200 border-l-4 border-red-600 p-4">
                        <p class="text-xs text-gray-500">TOTAL PROGRAM</p>
                        <h2 class="text-xl font-semibold text-gray-800">{{ $countPrograms }}</h2>
                    </div>

                </div>


                <!-- INFORMASI SISTEM -->
                <div class="bg-white border border-gray-200 p-6">

                    <h2 class="text-sm font-semibold text-gray-700 border-b pb-2 mb-4">
                        INFORMASI SISTEM
                    </h2>

                    <div class="grid grid-cols-2 gap-y-2 text-sm text-gray-600">

                        <div>Website</div><div>: LKP Unsada</div>
                        <div>Framework</div><div>: Laravel</div>
                        <div>UI</div><div>: Tailwind CSS</div>
                        <div>Tahun</div><div>: 2026</div>
                        <div>Developer</div><div>: Tim IT Unsada</div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>
