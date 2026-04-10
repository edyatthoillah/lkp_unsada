<x-app-layout>
    <!-- Toastr Config -->
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>

    <!-- Session Toastr -->
    @foreach (['success', 'successedit', 'successeditgambar', 'successdelete'] as $msg)
        @if (Session::has($msg))
            <script>
                toastr.success('{{ Session::get($msg) }}', '');
            </script>
        @endif
    @endforeach
    @if ($errors->any())
        <script>
            toastr.error('Gagal Ditambahkan', '');
        </script>
    @endif

    <div class=" bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto">
            <section class="section main-section bg-white p-6 m-8">
                <!-- Breadcrumb -->
                <nav class="flex text-xs text-gray-500 mb-4" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1">

                        <li class="inline-flex items-center">
                            <a href="/" class="hover:text-blue-600">Dashboard</a>
                        </li>

                        <li>
                            <span class="mx-1">/</span>
                            <a href="/news" class="hover:text-blue-600">Landing Page</a>
                        </li>

                        <li>
                            <span class="mx-1">/</span>
                            <span class="text-gray-700 font-medium">Update</span>
                        </li>

                    </ol>
                </nav>

                <div class="border-t-4 border-green-500 pt-4 flex gap-6 rounded-sm py-3">
                    @include('layouts.admin-sidebar')

                    <div class="w-4/5">
                        <div class="bg-white border border-gray-300 shadow-sm p-4">
                            <div x-data="previewModalAdd()" @keydown.escape.window="show = false">
                                <div class="mb-4">
                                    <div class="flex justify-between items-center mb-3">
                                        <h2 class="font-semibold text-gray-700 text-md">Landing Page</h2>
                                        <div class="flex gap-1">
                                            <!-- Kembali -->
                                            <!-- Kembali -->
                                            <a href="{{ route('admin.dashboard') }}"
                                                class="flex items-center gap-1 bg-cyan-500 hover:bg-cyan-600 text-white text-xs px-3 py-1 border border-cyan-600 leading-none">
                                                <span>Kembali ke Dashboard</span>
                                            </a>
                                        </div>
                                    </div>
                                    <form action="{{ route('admin.landingpage.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                            <!-- IMAGE SECTION -->
                                            <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-4">

                                                <!-- Logo -->
                                                <div>
                                                    <label class="text-xs text-gray-600 block mb-1">Logo</label>

                                                    @if ($landing && $landing->logo)
                                                        <div class="mb-2">
                                                            <img src="{{ $landing->logo_url }}"
                                                                class="h-20 rounded border">
                                                        </div>
                                                    @endif

                                                    <input type="file" name="logo"
                                                        class="w-full border p-2 text-sm">
                                                </div>

                                                <!-- Image Hero -->
                                                <div>
                                                    <label class="text-xs text-gray-600 block mb-1">Image Hero</label>

                                                    @if ($landing && $landing->image_hero)
                                                        <div class="mb-2">
                                                            <img src="{{ $landing->image_hero_url }}"
                                                                class="h-20 rounded border">
                                                        </div>
                                                    @endif

                                                    <input type="file" name="image_hero"
                                                        class="w-full border p-2 text-sm">
                                                </div>

                                                <!-- Foto Tentang Kami -->
                                                <div>
                                                    <label class="text-xs text-gray-600 block mb-1">Foto Tentang
                                                        Kami</label>

                                                    @if ($landing && $landing->foto_tentang_kami)
                                                        <div class="mb-2">
                                                            <img src="{{ $landing->foto_tentang_kami_url }}"
                                                                class="h-20 rounded border">
                                                        </div>
                                                    @endif

                                                    <input type="file" name="foto_tentang_kami"
                                                        class="w-full border p-2 text-sm">
                                                </div>

                                            </div>
                                            <!-- Nama Aplikasi -->
                                            <div>
                                                <label class="text-xs text-gray-600">Nama Aplikasi</label>
                                                <input type="text" name="nama_aplikasi"
                                                    value="{{ $landing->nama_aplikasi ?? '' }}"
                                                    class="w-full border p-2 text-sm" required>
                                            </div>

                                            <!-- Link Brosur -->
                                            <div>
                                                <label class="text-xs text-gray-600">Link Brosur</label>
                                                <input type="text" name="link_brosur"
                                                    value="{{ $landing->link_brosur ?? '' }}"
                                                    class="w-full border p-2 text-sm">
                                            </div>


                                            <!-- Hero Section -->
                                            <div class="md:col-span-2">
                                                <label class="text-xs text-gray-600">Hero Section</label>
                                                <textarea name="hero_section" class="w-full border p-2 text-sm">{{ $landing->hero_section ?? '' }}</textarea>
                                            </div>

                                            <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-4">
                                                <!-- Instagram -->
                                                <div>
                                                    <label class="text-xs text-gray-600">Instagram</label>
                                                    <input type="text" name="instagram"
                                                        value="{{ $landing->instagram ?? '' }}"
                                                        class="w-full border p-2 text-sm">
                                                </div>

                                                <!-- Email -->
                                                <div>
                                                    <label class="text-xs text-gray-600">Email</label>
                                                    <input type="email" name="email"
                                                        value="{{ $landing->email ?? '' }}"
                                                        class="w-full border p-2 text-sm">
                                                </div>

                                                <!-- Whatsapp -->
                                                <div>
                                                    <label class="text-xs text-gray-600">Whatsapp</label>
                                                    <input type="text" name="whatsapp"
                                                        value="{{ $landing->whatsapp ?? '' }}"
                                                        class="w-full border p-2 text-sm">
                                                </div>

                                            </div>

                                            <!-- Tentang Kami -->
                                            <div class="md:col-span-2">
                                                <label class="text-xs text-gray-600">Tentang Kami</label>
                                                <textarea name="tentang_kami" class="w-full border p-2 text-sm">{{ $landing->tentang_kami ?? '' }}</textarea>
                                            </div>

                                            <!-- Footer -->
                                            <div class="md:col-span-2">
                                                <label class="text-xs text-gray-600">Footer Deskripsi</label>
                                                <textarea name="footer_deskripsi" class="w-full border p-2 text-sm">{{ $landing->footer_deskripsi ?? '' }}</textarea>
                                            </div>

                                            <!-- Alamat -->
                                            <div class="md:col-span-2">
                                                <label class="text-xs text-gray-600">Alamat</label>
                                                <textarea name="alamat" class="w-full border p-2 text-sm">{{ $landing->alamat ?? '' }}</textarea>
                                            </div>

                                        </div>

                                        <!-- Button -->
                                        <div class="mt-4 flex justify-end">
                                            <button type="submit"
                                                class="bg-green-500 hover:bg-green-600 text-white text-sm px-4 py-2 border border-green-700 transition">
                                                Simpan Perubahan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</x-app-layout>
