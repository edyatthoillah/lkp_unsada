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
                                    <div class="flex justify-between items-center mb-3">
                                        <h2 class="font-semibold text-gray-700 text-md">Detail Program</h2>
                                        <div class="flex gap-1">
                                            <!-- Kembali -->
                                            <a href="{{ route('admin.program.index') }}"
    class="flex items-center gap-1 bg-cyan-500 hover:bg-cyan-600 text-white text-xs px-3 py-1 border border-cyan-600 leading-none">

    <span>Kembali</span>
</a>

                                            <!-- Tambah -->
                                            <button @click="openModalAddHero()"
                                                class="flex items-center gap-1 bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-2 border border-blue-700 leading-none">

                                                <span>Tambah</span>
                                            </button>

                                        </div>
                                    </div>

                                    <!-- Modal Add Detail Program -->
                                    <div x-show="show" class="fixed inset-0 bg-black/40 z-50 overflow-y-auto"
                                        x-transition>

                                        <div class="flex min-h-screen items-start justify-center p-4">
                                            <div
                                                class="bg-white shadow-md w-full max-w-md max-h-screen overflow-y-auto border">

                                                <!-- Header -->
                                                <div class="flex items-center justify-between p-3 border-b bg-gray-100">
                                                    <h2 class="text-sm font-semibold text-gray-700 uppercase">
                                                        Tambah Detail Program
                                                    </h2>

                                                    <button @click="show = false"
                                                        class="text-gray-500 hover:text-gray-700 text-lg leading-none">
                                                        &times;
                                                    </button>
                                                </div>

                                                <!-- Content -->
                                                <div class="p-4">
                                                    <form action="{{ route('admin.detail.store') }}" method="POST"
                                                        class="space-y-3">
                                                        @csrf

                                                        <!-- WAJIB: relasi ke program -->
                                                        <input type="hidden" name="program_id"
                                                            value="{{ $program->id }}">

                                                        <!-- Sub Program -->
                                                        <div>
                                                            <label class="text-xs font-semibold text-gray-600">Sub
                                                                Program</label>
                                                            <input type="text" name="sub_program"
                                                                class="w-full border border-gray-300 mt-1 text-xs px-2 py-1.5 focus:outline-none focus:border-blue-500"
                                                                placeholder="Contoh: JLPT N5" required>
                                                        </div>

                                                        <!-- Detail -->
                                                        <div>
                                                            <label
                                                                class="text-xs font-semibold text-gray-600">Detail</label>
                                                            <textarea name="detail" rows="3"
                                                                class="w-full border border-gray-300 mt-1 text-xs px-2 py-1.5 focus:outline-none focus:border-blue-500"
                                                                placeholder="Deskripsi program"></textarea>
                                                        </div>

                                                        <!-- Harga -->
                                                        <div>
                                                            <label
                                                                class="text-xs font-semibold text-gray-600">Harga</label>
                                                            <input type="number" name="harga"
                                                                class="w-full border border-gray-300 mt-1 text-xs px-2 py-1.5 focus:outline-none focus:border-blue-500"
                                                                placeholder="1500000">
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
                                        </div>
                                    </div>

                                    <!-- Table -->
                                    <div x-data="modalEdit()" class="overflow-x-auto">
                                        <table class="w-full text-xs border border-gray-300">
                                            <thead class="bg-gray-100 text-gray-600 uppercase">
                                                <tr>
                                                    <th class="p-2 border text-center w-10">No</th>
                                                    <th class="p-2 border">Sub Program</th>
                                                    <th class="p-2 border">Detail</th>
                                                    <th class="p-2 border text-center w-32">Harga</th>
                                                    <th class="p-2 border text-center w-40">Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @forelse ($program->details as $item)
                                                    <tr class="hover:bg-gray-50">

                                                        <!-- No -->
                                                        <td class="p-2 border text-center">
                                                            {{ $loop->iteration }}
                                                        </td>

                                                        <!-- Sub Program -->
                                                        <td class="p-2 border font-medium text-gray-700">
                                                            {{ $item->sub_program }}
                                                        </td>

                                                        <!-- Detail -->
                                                        <td class="p-2 border">
                                                            {{ $item->detail ?? '-' }}
                                                        </td>

                                                        <!-- Harga -->
                                                        <td class="p-2 border text-center">
                                                            @if ($item->harga)
                                                                Rp {{ number_format($item->harga, 0, ',', '.') }}
                                                            @else
                                                                -
                                                            @endif
                                                        </td>

                                                        <!-- Aksi -->
                                                        <td class="p-2 border text-center">
                                                            <div class="inline-flex">

                                                                <!-- Edit -->
                                                                <button
                                                                    @click="openModal({
                                id: {{ $item->id }},
                                program_id: {{ $item->program_id }},
                                sub_program: '{{ $item->sub_program }}',
                                detail: `{{ $item->detail }}`,
                                harga: '{{ $item->harga }}'
                            })"
                                                                    class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white border border-yellow-700 transition">
                                                                    Edit
                                                                </button>

                                                                <!-- Delete -->
                                                                <form
                                                                    action="{{ route('admin.detail.delete', $item->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Hapus detail program?')">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <button type="submit"
                                                                        class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white border border-red-800 -ml-px transition">
                                                                        Delete
                                                                    </button>
                                                                </form>

                                                            </div>
                                                        </td>

                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center p-4 text-gray-500">
                                                            Belum ada detail program
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>

                                        <!-- Modal Edit Detail -->
                                        <div x-show="show" x-transition @keydown.escape.window="show = false"
                                            class="fixed inset-0 bg-black/40 z-50 flex items-start justify-center p-4 overflow-y-auto">

                                            <div
                                                class="bg-white shadow-md w-full max-w-md max-h-screen overflow-y-auto border">

                                                <!-- Header -->
                                                <div class="flex items-center justify-between p-3 border-b bg-gray-100">
                                                    <h2 class="text-sm font-semibold text-gray-700 uppercase">
                                                        Edit Detail Program
                                                    </h2>

                                                    <button @click="show = false"
                                                        class="text-gray-500 hover:text-gray-700 text-lg leading-none">
                                                        &times;
                                                    </button>
                                                </div>

                                                <!-- Content -->
                                                <div class="p-4">
                                                    <form
                                                        :action="`{{ route('admin.detail.update', ':id') }}`.replace(':id', data.id)"
                                                        method="POST" class="space-y-3">
                                                        @csrf
                                                        @method('PUT')

                                                        <!-- Sub Program -->
                                                        <div>
                                                            <label class="text-xs font-semibold text-gray-600">
                                                                Sub Program
                                                            </label>
                                                            <input type="text" name="sub_program"
                                                                x-model="data.sub_program"
                                                                class="w-full border border-gray-300 mt-1 text-xs px-2 py-1.5 focus:outline-none focus:border-blue-500">
                                                        </div>

                                                        <!-- Detail -->
                                                        <div>
                                                            <label class="text-xs font-semibold text-gray-600">
                                                                Detail
                                                            </label>
                                                            <textarea name="detail" x-model="data.detail" rows="3"
                                                                class="w-full border border-gray-300 mt-1 text-xs px-2 py-1.5 focus:outline-none focus:border-blue-500"></textarea>
                                                        </div>

                                                        <!-- Harga -->
                                                        <div>
                                                            <label class="text-xs font-semibold text-gray-600">
                                                                Harga
                                                            </label>
                                                            <input type="number" name="harga" x-model="data.harga"
                                                                class="w-full border border-gray-300 mt-1 text-xs px-2 py-1.5 focus:outline-none focus:border-blue-500">
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
