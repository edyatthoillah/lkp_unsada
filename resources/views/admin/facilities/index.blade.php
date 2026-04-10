<x-app-layout>
    <!-- Toastr -->
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
                            <a href="#" class="hover:text-blue-600">facilities</a>
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


                                    <!-- Header & Add Button -->
                                    <div class="flex justify-between items-center mb-3">
                                        <h2 class="font-semibold text-gray-700 text-md">News & Update</h2>
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

                                    <div x-show="show" x-transition
                                        class="fixed inset-0 bg-black/40 z-50 flex items-start justify-center p-4 overflow-y-auto">

                                        <div
                                            class="bg-white rounded-lg shadow-md w-full max-w-md max-h-screen overflow-y-auto relative">

                                            <!-- Header -->
                                            <div class="flex items-center justify-between p-4 border-b">
                                                <h2 class="text-base font-semibold">Tambah Fasilitas</h2>
                                                <button @click="show = false"
                                                    class="text-gray-400 hover:text-gray-600 text-xl leading-none">
                                                    &times;
                                                </button>
                                            </div>

                                            <!-- Content -->
                                            <div class="p-4">
                                                <form action="{{ route('admin.facilities.store') }}" method="POST"
                                                    enctype="multipart/form-data" class="space-y-4">
                                                    @csrf

                                                    <!-- Upload Gambar -->
                                                    <div>
                                                        <x-input-label value="Gambar Fasilitas" class="text-sm" />
                                                        <input type="file" name="image"
                                                            class="mt-1 block w-full text-sm border-gray-300 rounded-md shadow-sm"
                                                            required>
                                                    </div>

                                                    <!-- Deskripsi -->
                                                    <div>
                                                        <x-input-label value="Deskripsi" class="text-sm" />
                                                        <textarea name="description" rows="4"
                                                            class="block mt-1 w-full text-sm border-gray-300 rounded-md shadow-sm px-2 py-1.5"
                                                            placeholder="Masukkan deskripsi fasilitas..." required></textarea>
                                                    </div>

                                                    <!-- Action -->
                                                    <div class="flex justify-end gap-2 pt-2">
                                                        <button type="button" @click="show=false"
                                                            class="bg-gray-400 hover:bg-gray-500 text-white text-sm px-3 py-1.5 rounded-md transition">
                                                            Close
                                                        </button>

                                                        <button type="submit"
                                                            class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-3 py-1.5 rounded-md transition">
                                                            Simpan
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Table News -->
                                <div x-data="modalEditNews()" @keydown.escape.window="show = false"
                                    class="overflow-x-auto bg-white  shadow-sm rounded">
                                    <table id="submittedTable" class="w-full text-sm border border-gray-200">
                                        <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                                            <tr>
                                                <th class="px-3 py-2 border">No</th>
                                                <th class="px-3 py-2 border">Gambar</th>
                                                <th class="px-3 py-2 border">Deskripsi</th>
                                                <th class="px-3 py-2 border">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($facilities as $data)
                                                <tr class="hover:bg-gray-50">
                                                    <td class="text-center px-3 py-2 border">
                                                        {{ $loop->iteration }}
                                                    </td>

                                                    <td class="px-3 py-2 border">
                                                        <img src="{{ asset('storage/' . $data->image) }}"
                                                            class="h-20 w-20 object-cover rounded">
                                                    </td>

                                                    <td class="px-3 py-2 border">
                                                        {!! Str::limit(strip_tags($data->description), 150) !!}
                                                    </td>

                                                    <td class="px-3 py-2 border">
                                                        <div class="inline-flex">
                                                            <!-- EDIT -->
                                                            <button
                                                                @click="openModal({
                                id: @js($data->id),
                                description: @js($data->description),
                                image: @js(asset('storage/' . $data->image))
                            })"
                                                                class="px-3 py-1 text-xs bg-yellow-500 hover:bg-yellow-600 text-white border border-yellow-700 rounded-l transition">
                                                                Edit
                                                            </button>

                                                            <!-- DELETE -->
                                                            <form
                                                                action="{{ route('admin.facilities.destroy', $data->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Yakin ingin menghapus fasilitas ini?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="px-3 py-1 text-xs bg-red-600 hover:bg-red-700 text-white border border-red-800 rounded-r -ml-px transition">
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
                                    <div x-show="show" x-transition
                                        class="fixed inset-0 bg-black/40 z-50 flex items-start justify-center p-4 overflow-y-auto">

                                        <div
                                            class="bg-white rounded-lg shadow-md w-full max-w-md max-h-screen overflow-y-auto relative">

                                            <!-- Header -->
                                            <div class="flex items-center justify-between p-4 border-b">
                                                <h2 class="text-base font-semibold">Edit Fasilitas</h2>
                                                <button @click="show = false"
                                                    class="text-gray-400 hover:text-gray-600 text-xl leading-none">
                                                    &times;
                                                </button>
                                            </div>

                                            <!-- Content -->
                                            <div class="p-4">
                                                <form id="editFacilityForm" method="POST" enctype="multipart/form-data"
                                                    class="space-y-4">
                                                    @csrf
                                                    @method('PUT')

                                                    <!-- ID -->
                                                    <input type="hidden" id="facility_id">

                                                    <!-- Preview Gambar Lama -->
                                                    <div>
                                                        <x-input-label value="Preview Gambar" class="text-sm" />
                                                        <img :src="form.image"
                                                            class="h-24 w-24 object-cover rounded border mt-1">
                                                    </div>

                                                    <!-- Upload Gambar Baru -->
                                                    <div>
                                                        <x-input-label value="Ganti Gambar (Opsional)"
                                                            class="text-sm" />
                                                        <input type="file" name="image"
                                                            class="mt-1 block w-full text-sm border-gray-300 rounded-md shadow-sm">
                                                    </div>

                                                    <!-- Deskripsi -->
                                                    <div>
                                                        <x-input-label value="Deskripsi" class="text-sm" />
                                                        <textarea id="edit_description" name="description" rows="4"
                                                            class="block mt-1 w-full text-sm border-gray-300 rounded-md shadow-sm px-2 py-1.5"></textarea>
                                                    </div>

                                                    <!-- Action -->
                                                    <div class="flex justify-end gap-2 pt-2">
                                                        <button type="button" @click="show=false"
                                                            class="bg-gray-400 hover:bg-gray-500 text-white text-sm px-3 py-1.5 rounded-md transition">
                                                            Close
                                                        </button>

                                                        <button type="submit"
                                                            class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-3 py-1.5 rounded-md transition">
                                                            Update
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>

                                    <script>
                                        function modalEditNews() {
                                            return {
                                                show: false,
                                                form: {
                                                    id: null,
                                                    description: '',
                                                    image: ''
                                                },

                                                openModal(data) {
                                                    this.show = true;

                                                    // set data ke form
                                                    this.form.id = data.id;
                                                    this.form.description = data.description;
                                                    this.form.image = data.image;

                                                    this.$nextTick(() => {
                                                        // set action form
                                                        document.getElementById("editFacilityForm").action = "/admin/facilities/" + data.id;

                                                        // set textarea
                                                        document.getElementById("edit_description").value = data.description;
                                                    });
                                                }
                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


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

    <script>
        $(document).ready(function() {
            $('#submittedTable').DataTable({
                pageLength: 5,
                responsive: true
            });
        });
    </script>



    <script src="{{ asset('assets/js/main.min.js?v=1772427751095') }}"></script>
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</x-app-layout>
