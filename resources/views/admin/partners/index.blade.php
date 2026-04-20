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
                            <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600">Dashboard</a>
                        </li>

                        <li>
                            <span class="mx-1">/</span>
                            <a href="#" class="hover:text-blue-600">Mitra</a>
                        </li>

                        <li>
                            <span class="mx-1">/</span>
                            <span class="text-gray-700 font-medium">Create</span>
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
                                        <h2 class="font-semibold text-gray-700 text-md">Mitra LKP Unsada</h2>
                                        <div class="flex gap-1">
                                            <!-- Kembali -->
                                            <!-- Kembali -->
                                            <a href="{{ route('admin.dashboard') }}"
                                                class="flex items-center gap-1 bg-cyan-500 hover:bg-cyan-600 text-white text-xs px-3 py-1 border border-cyan-600 leading-none">
                                                <span>Kembali ke Dashboard</span>
                                            </a>

                                            <!-- Tambah -->
                                            <button @click="openModalAddHero()"
                                                class="flex items-center gap-1 bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-2 border border-blue-700 leading-none">

                                                <span>Tambah</span>
                                            </button>

                                        </div>
                                    </div>

                                    <!-- Modal Add -->
                                    <div x-show="show" class="fixed inset-0 bg-black/40 z-50 overflow-y-auto"
                                        x-transition>

                                        <div class="flex min-h-screen items-start justify-center p-4">
                                            <div
                                                class="bg-white rounded-lg shadow-md w-full max-w-md max-h-screen overflow-y-auto">

                                                <!-- Header -->
                                                <div class="flex items-center justify-between p-4 border-b">
                                                    <h2 class="text-base font-semibold">Tambah Mitra</h2>

                                                    <!-- Close (X) -->
                                                    <button @click="show = false"
                                                        class="text-gray-400 hover:text-gray-600 text-xl leading-none">
                                                        &times;
                                                    </button>
                                                </div>

                                                <!-- Content -->
                                                <div class="p-4">
                                                    <form action="{{ route('admin.partners.store') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <!-- Nama -->
                                                        <div>
                                                            <label class="text-sm font-medium">Nama Mitra</label>
                                                            <input type="text" name="name"
                                                                class="w-full border rounded-md mt-1 text-sm px-2 py-1.5 @error('name') border-red-500 @enderror"
                                                                value="{{ old('name') }}">

                                                            @error('name')
                                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                            @enderror
                                                        </div>

                                                        <!-- Logo -->
                                                        <div class="mt-3">
                                                            <label class="text-sm font-medium">Logo</label>
                                                            <input type="file" name="logo"
                                                                class="w-full border rounded-md mt-1 text-sm px-2 py-1.5 @error('logo') border-red-500 @enderror">

                                                            @error('logo')
                                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                            @enderror
                                                        </div>

                                                        <div class="flex justify-end gap-2 pt-3">
                                                            <button type="button" @click="show=false"
                                                                class="bg-gray-400 text-white px-3 py-1.5 rounded-md">Close</button>

                                                            <button type="submit"
                                                                class="bg-blue-600 text-white px-3 py-1.5 rounded-md">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <!-- Table -->
                                    <div x-data="modalEdit()" class="overflow-x-auto">
                                        <table id="partnerTable" class="w-full text-sm border border-gray-200">
                                            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                                                <tr>
                                                    <th class="p-2 border">No</th>
                                                    <th class="p-2 border">Logo</th>
                                                    <th class="p-2 border">Nama</th>
                                                    <th class="p-2 border">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($partners as $data)
                                                    <tr class="hover:bg-gray-50">
                                                        <td class="text-center p-2 border">{{ $loop->iteration }}</td>

                                                        <!-- LOGO -->
                                                        <td class="p-2 border text-center">
                                                            <img src="{{ asset('storage/' . $data->logo) }}"
                                                                class="h-12 mx-auto object-contain">
                                                        </td>

                                                        <!-- NAMA -->
                                                        <td class="p-2 border">{{ $data->name }}</td>

                                                        <!-- AKSI -->
                                                        <td class="p-2 border">
                                                            <div class="inline-flex">
                                                                <button
                                                                    @click="openModal({
                                id: {{ $data->id }},
                                name: '{{ $data->name }}',
                                logo: '{{ asset('storage/' . $data->logo) }}'
                            })"
                                                                    class="px-3 py-1 text-xs bg-yellow-500 text-white rounded-l">
                                                                    Edit
                                                                </button>

                                                                <form
                                                                    action="{{ route('admin.partners.destroy', $data->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Hapus mitra?')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="px-3 py-1 text-xs bg-red-600 text-white rounded-r">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <!-- Modal Edit -->
                                        <div x-show="show" x-transition @keydown.escape.window="show = false"
                                            class="fixed inset-0 bg-black/40 z-50 flex items-start justify-center p-4 overflow-y-auto">

                                            <div
                                                class="bg-white rounded-lg shadow-md w-full max-w-md max-h-screen overflow-y-auto">

                                                <!-- Header -->
                                                <div class="flex items-center justify-between p-4 border-b">
                                                    <h2 class="text-base font-semibold">Edit Testimonial</h2>

                                                    <!-- Close (X) -->
                                                    <button @click="show = false"
                                                        class="text-gray-400 hover:text-gray-600 text-xl leading-none">
                                                        &times;
                                                    </button>
                                                </div>

                                                <!-- Content -->
                                                <div class="p-4">
                                                    <form :action="'/admin/partners/' + data.id" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')

                                                        <!-- Nama -->
                                                        <div>
                                                            <label class="text-sm font-medium">Nama Mitra</label>
                                                            <input type="text" name="name" x-model="data.name"
                                                                value="{{ old('name') }}"
                                                                class="w-full border rounded-md mt-1 text-sm px-2 py-1.5 
        @error('name') border-red-500 @enderror">

                                                            @error('name')
                                                                <p class="text-red-500 text-xs mt-1">{{ $message }}
                                                                </p>
                                                            @enderror
                                                        </div>

                                                        <div class="mt-3">
                                                            <label class="text-sm font-medium">Ganti Logo</label>
                                                            <input type="file" name="logo"
                                                                class="w-full border rounded-md mt-1 text-sm px-2 py-1.5 
        @error('logo') border-red-500 @enderror">

                                                            @error('logo')
                                                                <p class="text-red-500 text-xs mt-1">{{ $message }}
                                                                </p>
                                                            @enderror
                                                        </div>

                                                        <div class="flex justify-end gap-2 pt-3">
                                                            <button type="button" @click="show=false"
                                                                class="bg-gray-400 text-white px-3 py-1.5 rounded-md">Close</button>

                                                            <button type="submit"
                                                                class="bg-blue-600 text-white px-3 py-1.5 rounded-md">Update</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </div>
    </div>

    <!-- Alpine.js Modal -->
    <script>
        function modalEdit() {
            return {
                show: false,
                data: {},
                openModal(item) {
                    this.data = item;
                    this.show = true;
                }
            }
        }
    </script>


    <script>
        function previewModalAdd() {
            return {
                show: false,
                data: {},
                openModalAddHero(item) {
                    this.data = item
                    this.show = true
                }
            }
        }
    </script>

    <!-- DataTables -->
    <script>
        $(document).ready(function() {
            $('#partnerTable').DataTable({
                pageLength: 9
            });
        });
    </script>

    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</x-app-layout>
