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
                            <a href="#" class="hover:text-blue-600">Programs</a>
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
                                        <h2 class="font-semibold text-gray-700 text-md">News & Update</h2>
                                        <div class="flex gap-1">
                                            <!-- Kembali -->
                                            <a href="{{ route('admin.dashboard') }}"
                                                class="flex items-center gap-1 bg-cyan-500 hover:bg-cyan-600 text-white text-xs px-3 py-1 border border-cyan-600 leading-none">
                                                <span>Kembali ke Dashboard</span>
                                            </a>

                                            <a href="{{ url('https://fontawesome.com/icons') }}" target="_blank"
                                                class="flex items-center gap-1 bg-yellow-500 hover:bg-yellow-600 text-white text-xs px-3 py-1 border border-cyan-600 leading-none">
                                                <span>Icon Link</span>
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
                                                class="bg-white shadow-md w-full max-w-md max-h-screen overflow-y-auto border">

                                                <!-- Header -->
                                                <div class="flex items-center justify-between p-3 border-b bg-gray-100">
                                                    <h2 class="text-sm font-semibold text-gray-700 uppercase">
                                                        Tambah Program
                                                    </h2>

                                                    <button @click="show = false"
                                                        class="text-gray-500 hover:text-gray-700 text-lg leading-none">
                                                        &times;
                                                    </button>
                                                </div>

                                                <!-- Content -->
                                                <div class="p-4">
                                                    <form action="{{ route('admin.program.store') }}" method="POST"
                                                        class="space-y-3">
                                                        @csrf

                                                        <!-- Nama Program -->
                                                        <div>
                                                            <label class="text-xs font-semibold text-gray-600">Nama
                                                                Program</label>
                                                            <input type="text" name="name"
                                                                class="w-full border border-gray-300 mt-1 text-xs px-2 py-1.5 focus:outline-none focus:border-blue-500"
                                                                required>
                                                        </div>

                                                        <!-- Icon -->
                                                        <div>
                                                            <label
                                                                class="text-xs font-semibold text-gray-600">Icon</label>
                                                            <input type="text" name="icon"
                                                                placeholder="fa-solid fa-book"
                                                                class="w-full border border-gray-300 mt-1 text-xs px-2 py-1.5 focus:outline-none focus:border-blue-500">
                                                        </div>

                                                        <!-- Color Picker -->
                                                        <div>
                                                            <label
                                                                class="text-xs font-semibold text-gray-600">Warna</label>

                                                            <div class="flex items-center gap-2 mt-1">
                                                                <input type="color" id="colorPicker" name="color"
                                                                    class="w-10 h-8 border border-gray-300 cursor-pointer">

                                                                <input type="text" id="colorText"
                                                                    class="w-full border border-gray-300 px-2 py-1.5 text-xs focus:outline-none focus:border-blue-500"
                                                                    placeholder="#000000">
                                                            </div>
                                                        </div>

                                                        <!-- Footer -->
                                                        <div class="flex justify-end gap-1 pt-2 border-t">
                                                            <button type="button" @click="show=false"
                                                                class="bg-gray-500 hover:bg-gray-600 text-white text-xs px-3 py-1.5 border border-gray-600 transition">
                                                                Batal
                                                            </button>

                                                            <button type="submit"
                                                                class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1.5 border border-blue-700 transition">
                                                                Simpan
                                                            </button>
                                                        </div>

                                                    </form>
                                                </div>

                                            </div>
                                            <script>
                                                const picker = document.getElementById('colorPicker');
                                                const text = document.getElementById('colorText');

                                                picker.addEventListener('input', () => {
                                                    text.value = picker.value;
                                                });

                                                text.addEventListener('input', () => {
                                                    picker.value = text.value;
                                                });
                                            </script>
                                        </div>
                                    </div>

                                    <!-- Table -->
                                    <div x-data="modalEdit()" class="overflow-x-auto">
                                        <table class="w-full text-sm border border-gray-200">
                                            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                                                <tr>
                                                    <th class="p-2 border text-center">No</th>
                                                    <th class="p-2 border text-center">Icon</th>
                                                    <th class="p-2 border">Nama Program</th>
                                                    <th class="p-2 border text-center">Warna</th>
                                                    <th class="p-2 border text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($programs as $data)
                                                    <tr class="hover:bg-gray-50">

                                                        <!-- No -->
                                                        <td class="text-center p-2 border">
                                                            {{ $loop->iteration }}
                                                        </td>

                                                        <!-- Icon -->
                                                        <td class="p-2 border text-center">
                                                            <i class="{{ $data->icon }}"></i>
                                                        </td>

                                                        <!-- Nama -->
                                                        <td class="p-2 border">
                                                            {{ $data->name }}
                                                        </td>

                                                        <!-- Warna -->
                                                        <td class="p-2 border text-center">
                                                            <div class="flex items-center justify-center gap-2">
                                                                <div class="w-5 h-5 border"
                                                                    style="background: {{ $data->color }}"></div>
                                                                <span
                                                                    class="text-xs text-gray-600">{{ $data->color }}</span>
                                                            </div>
                                                        </td>

                                                        <!-- Aksi -->
                                                        <td class="p-2 border text-center">
                                                            <div class="inline-flex">

                                                                <!-- Detail -->
                                                                <a href="{{ route('admin.program.show', $data->id) }}"
                                                                    class="px-3 py-1 text-xs bg-blue-600 hover:bg-blue-700 text-white border border-blue-800 transition">
                                                                    Detail
                                                                </a>

                                                                <!-- Edit -->
                                                                <button
                                                                    @click="openModal({
            id: {{ $data->id }},
            name: '{{ $data->name }}',
            icon: '{{ $data->icon }}',
            color: '{{ $data->color }}'
        })"
                                                                    class="px-3 py-1 text-xs bg-yellow-500 hover:bg-yellow-600 text-white border border-yellow-700 -ml-px transition">
                                                                    Edit
                                                                </button>

                                                                <!-- Delete -->
                                                                <form
                                                                    action="{{ route('admin.program.destroy', $data->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Hapus program?')">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <button type="submit"
                                                                        class="px-3 py-1 text-xs bg-red-600 hover:bg-red-700 text-white border border-red-800 -ml-px transition">
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
                                                class="bg-white shadow-md w-full max-w-md max-h-screen overflow-y-auto border">

                                                <!-- Header -->
                                                <div class="flex items-center justify-between p-3 border-b bg-gray-100">
                                                    <h2 class="text-sm font-semibold text-gray-700 uppercase">
                                                        Edit Program
                                                    </h2>

                                                    <button @click="show = false"
                                                        class="text-gray-500 hover:text-gray-700 text-lg leading-none">
                                                        &times;
                                                    </button>
                                                </div>

                                                <!-- Content -->
                                                <div class="p-4">
                                                    <form :action="'/admin/program/' + data.id" method="POST"
                                                        class="space-y-3">
                                                        @csrf
                                                        @method('PUT')

                                                        <!-- Nama Program -->
                                                        <div>
                                                            <label class="text-xs font-semibold text-gray-600">Nama
                                                                Program</label>
                                                            <input type="text" name="name" x-model="data.name"
                                                                class="w-full border border-gray-300 mt-1 text-xs px-2 py-1.5 focus:outline-none focus:border-blue-500">
                                                        </div>

                                                        <!-- Icon -->
                                                        <div>
                                                            <label
                                                                class="text-xs font-semibold text-gray-600">Icon</label>
                                                            <input type="text" name="icon" x-model="data.icon"
                                                                class="w-full border border-gray-300 mt-1 text-xs px-2 py-1.5 focus:outline-none focus:border-blue-500"
                                                                placeholder="fa-solid fa-book">
                                                        </div>

                                                        <!-- Color -->
                                                        <div>
                                                            <label
                                                                class="text-xs font-semibold text-gray-600">Warna</label>

                                                            <div class="flex items-center gap-2 mt-1">
                                                                <input type="color" name="color"
                                                                    class="w-10 h-8 border border-gray-300 cursor-pointer"
                                                                    x-model="data.color">
                                                            </div>

                                                            <!-- Preview -->
                                                            <div class="flex items-center gap-2 mt-2">
                                                                <div class="w-5 h-5 border"
                                                                    :style="'background-color:' + data.color"></div>
                                                                <span class="text-xs text-gray-500">Preview</span>
                                                            </div>
                                                        </div>

                                                        <!-- Footer -->
                                                        <div class="flex justify-end gap-1 pt-2 border-t">
                                                            <button type="button" @click="show=false"
                                                                class="bg-gray-500 hover:bg-gray-600 text-white text-xs px-3 py-1.5 border border-gray-600 transition">
                                                                Batal
                                                            </button>

                                                            <button type="submit"
                                                                class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1.5 border border-blue-700 transition">
                                                                Update
                                                            </button>
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
            $('#testimonialTable').DataTable({
                pageLength: 9
            });
        });
    </script>

    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</x-app-layout>
