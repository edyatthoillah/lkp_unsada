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
                            <a href="/" class="hover:text-blue-600">Dashboard</a>
                        </li>

                        <li>
                            <span class="mx-1">/</span>
                            <a href="/news" class="hover:text-blue-600">News</a>
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

                                    <!-- Modal Tambah -->
                                    <div x-show="showAdd" x-transition
                                        class="fixed inset-0 bg-black/40 z-50 flex items-start justify-center p-4 overflow-y-auto">

                                        <div class="bg-white rounded-lg shadow-md w-full max-w-md relative">

                                            <!-- Header -->
                                            <div class="flex items-center justify-between p-4 border-b">
                                                <h2 class="text-base font-semibold">Tambah Service</h2>
                                                <button @click="showAdd = false"
                                                    class="text-gray-400 hover:text-gray-600 text-xl">&times;</button>
                                            </div>

                                            <!-- Content -->
                                            <div class="p-4">
                                                <form action="{{ route('admin.services.store') }}" method="POST" class="space-y-4">
                                                    @csrf
                                                    <!-- Icon -->
                                                    <div>
                                                        <x-input-label value="Icon (Font Awesome)" class="text-sm" />
                                                        <input type="text" name="icon"
                                                            placeholder="contoh: fa-solid fa-graduation-cap"
                                                            class="mt-1 block w-full text-sm border-gray-300 rounded-md shadow-sm">
                                                    </div>
                                                    <div>
                                                        <x-input-label value="Nama Layanan" class="text-sm" />
                                                        <input type="text" name="name"
                                                            placeholder="Pelatihan Bahasa"
                                                            class="mt-1 block w-full text-sm border-gray-300 rounded-md shadow-sm">
                                                    </div>

                                                    <!-- Description -->
                                                    <div>
                                                        <x-input-label value="Deskripsi" class="text-sm" />
                                                        <textarea name="description" rows="3" class="mt-1 block w-full text-sm border-gray-300 rounded-md shadow-sm"></textarea>
                                                    </div>

                                                    <!-- Button -->
                                                    <div class="flex justify-end gap-2">
                                                        <button type="button" @click="showAdd=false"
                                                            class="bg-gray-400 text-white px-3 py-1.5 rounded">
                                                            Close
                                                        </button>

                                                        <button type="submit"
                                                            class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded">
                                                            Simpan
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div x-data="modalEditService()" @keydown.escape.window="show = false"
                                    class="overflow-x-auto bg-white shadow-sm rounded">

                                    <table class="w-full text-sm border border-gray-200">
                                        <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                                            <tr>
                                                <th class="px-3 py-2 border">No</th>
                                                <th class="px-3 py-2 border">Icon</th>
                                                <th class="px-3 py-2 border">Nama Layanan</th>
                                                <th class="px-3 py-2 border">Deskripsi</th>
                                                <th class="px-3 py-2 border">Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($services as $data)
                                                <tr class="hover:bg-gray-50">

                                                    <!-- No -->
                                                    <td class="text-center px-3 py-2 border">
                                                        {{ $loop->iteration }}
                                                    </td>

                                                    <!-- Icon -->
                                                    <td class="px-3 py-2 border text-center">
                                                        <i class="{{ $data->icon }} text-xl"></i>
                                                        <div class="text-xs text-gray-500 mt-1">{{ $data->icon }}
                                                        </div>
                                                    </td>

                                                    <!-- Icon -->
                                                    <td class="px-3 py-2 border text-center">
                                                        <div class="text-xs text-gray-500 mt-1">{{ $data->name }}
                                                        </div>
                                                    </td>

                                                    <!-- Description -->
                                                    <td class="px-3 py-2 border">
                                                        {{ Str::limit($data->description, 50) }}
                                                    </td>

                                                    <!-- Aksi -->
                                                    <td class="px-3 py-2 border">
                                                        <div class="inline-flex">

                                                            <!-- EDIT -->
                                                            <button
                                                                @click="openModal({
                                                                        id: @js($data->id),
                                                                        icon: @js($data->icon),
                                                                        name: @js($data->name),
                                                                        description: @js($data->description)
                                                                    })"
                                                                class="px-3 py-1 text-xs bg-yellow-500 hover:bg-yellow-600 text-white border border-yellow-700 rounded-l">
                                                                Edit
                                                            </button>

                                                            <!-- DELETE -->
                                                            <form
                                                                action="{{ route('admin.services.destroy', $data->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="px-3 py-1 text-xs bg-red-600 hover:bg-red-700 text-white border border-red-800 rounded-r -ml-px">
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

                                        <div class="bg-white rounded-lg shadow-md w-full max-w-md relative">

                                            <!-- Header -->
                                            <div class="flex items-center justify-between p-4 border-b">
                                                <h2 class="text-base font-semibold">Edit Service</h2>
                                                <button @click="show = false"
                                                    class="text-gray-400 hover:text-gray-600 text-xl">&times;</button>
                                            </div>

                                            <!-- Content -->
                                            <div class="p-4">
                                                <form id="editServiceForm" method="POST" class="space-y-4">
                                                    @csrf
                                                    @method('PUT')

                                                    <!-- Icon -->
                                                    <div>
                                                        <x-input-label value="Icon" class="text-sm" />
                                                        <input type="text" name="icon" x-model="form.icon"
                                                            class="mt-1 block w-full text-sm border-gray-300 rounded-md shadow-sm">
                                                        <i :class="form.icon" class="text-2xl mt-2"></i>
                                                    </div>

                                                    <!-- Icon -->
                                                    <div>
                                                        <x-input-label value="Name" class="text-sm" />
                                                        <input type="text" name="name" x-model="form.name"
                                                            class="mt-1 block w-full text-sm border-gray-300 rounded-md shadow-sm">
                                                        <i :class="form.name" class="text-2xl mt-2"></i>
                                                    </div>

                                                    <!-- Description -->
                                                    <div>
                                                        <x-input-label value="Deskripsi" class="text-sm" />
                                                        <textarea name="description" x-model="form.description" rows="3"
                                                            class="mt-1 block w-full text-sm border-gray-300 rounded-md shadow-sm"></textarea>
                                                    </div>

                                                    <div class="flex justify-end gap-2">
                                                        <button type="button" @click="show=false"
                                                            class="bg-gray-400 text-white px-3 py-1.5 rounded">Close</button>

                                                        <button type="submit"
                                                            class="bg-blue-600 text-white px-3 py-1.5 rounded">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <script>
                                    function modalEditService() {
                                        return {
                                            show: false,
                                            form: {
                                                id: null,
                                                icon: '',
                                                name: '',
                                                description: ''
                                            },
                                            openModal(data) {
                                                this.form = data;
                                                this.show = true;

                                                // set action form
                                                document.getElementById('editServiceForm').action =
                                                    `/admin/services/${data.id}`;
                                            }
                                        }
                                    }
                                </script>
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
                showAdd: false,
                preview: null,
                openModalAddHero() {
                    this.showAdd = true;
                    this.preview = null;
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
