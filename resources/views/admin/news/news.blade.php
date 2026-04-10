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
                            <a href="#" class="hover:text-blue-600">News</a>
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
                                                <h2 class="text-base font-semibold">Tambah Berita</h2>
                                                <!-- Button Close -->
                                                <button @click="show = false"
                                                    class="text-gray-400 hover:text-gray-600 text-xl leading-none">
                                                    &times;
                                                </button>
                                            </div>
                                            <script>
                                                document.addEventListener("DOMContentLoaded", function() {

                                                    const quill = new Quill('#editor', {
                                                        theme: 'snow',
                                                        placeholder: 'Tulis isi berita di sini...',
                                                        modules: {
                                                            toolbar: [
                                                                [{
                                                                    header: [1, 2, 3, false]
                                                                }],
                                                                ['bold', 'italic', 'underline'],
                                                                ['link', 'image'],
                                                                [{
                                                                    list: 'ordered'
                                                                }, {
                                                                    list: 'bullet'
                                                                }],
                                                                ['clean']
                                                            ]
                                                        }
                                                    });

                                                    const form = document.querySelector("#newsForm");

                                                    form.addEventListener("submit", function() {
                                                        document.querySelector("#news_content").value = quill.root.innerHTML;
                                                    });

                                                });
                                            </script>
                                            <div class="p-4">
                                                <form id="newsForm" action="{{ route('admin.news.store') }}"
                                                    method="POST" enctype="multipart/form-data" class="space-y-4">
                                                    @csrf

                                                    {{-- Thumbnail --}}
                                                    <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
                                                        <div>
                                                            <x-input-label value="Thumbnail" class="text-sm" />
                                                            <input type="file" name="thumbnail"
                                                                class="mt-1 block w-full text-sm border-gray-300 rounded-md shadow-sm">
                                                        </div>
                                                        <div>
                                                            <x-input-label value="Status" class="text-sm" />
                                                            <select name="status"
                                                                class="mt-1 block w-full text-sm border-gray-300 rounded-md shadow-sm py-1.5">
                                                                <option value="draft">Draft</option>
                                                                <option value="publish">Publish</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    {{-- Judul --}}
                                                    <div>
                                                        <x-input-label value="Judul Berita" class="text-sm" />
                                                        <x-text-input name="news_title"
                                                            class="block mt-1 w-full text-sm py-1.5 px-2" required />
                                                    </div>

                                                    {{-- Isi --}}
                                                    <div>
                                                        <x-input-label value="Isi Berita" class="text-sm" />

                                                        <!-- Editor Quill -->
                                                        <div id="editor" class="bg-white border rounded-md"
                                                            style="height:180px;"></div>

                                                        <!-- textarea untuk kirim ke Laravel -->
                                                        <textarea name="news_content" id="news_content" hidden></textarea>
                                                    </div>

                                                    {{-- Status --}}


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
                                                <th class="px-3 py-2 border">Thumbnail</th>
                                                <th class="px-3 py-2 border">Judul</th>
                                                <th class="px-3 py-2 border">Konten</th>
                                                <th class="px-3 py-2 border">Status</th>
                                                <th class="px-3 py-2 border">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($news as $data)
                                                <tr class="hover:bg-gray-50">
                                                    <td class="text-center px-3 py-2 border">{{ $loop->iteration }}</td>
                                                    <td class="px-3 py-2 border">
                                                        <img src="{{ asset('storage/' . $data->thumbnail) }}"
                                                            class="h-20 rounded">
                                                    </td>
                                                    <td class="px-3 py-2 border">{{ $data->news_title ?? '-' }}</td>
                                                    <td class="px-3 py-2 border">{!! Str::limit(strip_tags($data->news_content ?? '-'), 150) !!}</td>
                                                    <td class="px-3 py-2 border">{{ $data->status }}</td>
                                                    <td class="px-3 py-2 border">
                                                        <div class="inline-flex">
                                                            <button
                                                                @click="openModal({
                                                            id: @js($data->id),
                                                            title: @js($data->news_title),
                                                            content: @js($data->news_content),
                                                            status: @js($data->status),
                                                            thumbnail: @js(asset('storage/' . $data->thumbnail))
                                                        })"
                                                                class="px-3 py-1 text-xs bg-yellow-500 hover:bg-yellow-600 text-white border border-yellow-700 rounded-l transition">
                                                                Edit
                                                            </button>
                                                            <form action="{{ route('admin.news.destroy', $data->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="px-3 py-1 text-xs bg-red-600 hover:bg-red-700 text-white border border-red-800 rounded-r -ml-px transition">Delete</button>
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
                                                <h2 class="text-base font-semibold">Edit Berita</h2>
                                                <!-- Button Close -->
                                                <button @click="show = false"
                                                    class="text-gray-400 hover:text-gray-600 text-xl leading-none">
                                                    &times;
                                                </button>
                                            </div>

                                            <!-- Content -->
                                            <div class="p-4">
                                                <form id="editNewsForm" method="POST" enctype="multipart/form-data"
                                                    class="space-y-4">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" id="news_id">

                                                    <div class="grid grid-cols-2 md:grid-cols-2 gap-4">

                                                        {{-- Thumbnail --}}
                                                        <div>
                                                            <x-input-label value="Thumbnail" class="text-sm" />
                                                            <input type="file" name="thumbnail"
                                                                class="mt-1 block w-full text-sm border-gray-300 rounded-md shadow-sm">
                                                        </div>

                                                        {{-- Status --}}
                                                        <div>
                                                            <x-input-label value="Status" class="text-sm" />
                                                            <select id="edit_status" name="status"
                                                                class="mt-1 block w-full text-sm border-gray-300 rounded-md shadow-sm py-1.5">
                                                                <option value="draft">Draft</option>
                                                                <option value="publish">Publish</option>
                                                            </select>
                                                        </div>

                                                    </div>

                                                    {{-- Judul --}}
                                                    <div>
                                                        <x-input-label value="Judul Berita" class="text-sm" />
                                                        <x-text-input id="edit_title" name="news_title"
                                                            class="block mt-1 w-full text-sm py-1.5 px-2" />
                                                    </div>

                                                    {{-- Isi --}}
                                                    <div>
                                                        <x-input-label value="Isi Berita" />

                                                        <div id="editEditor" style="height:200px"></div>

                                                        <textarea id="edit_news_content" name="news_content" hidden></textarea>
                                                    </div>

                                                    <div class="flex justify-end gap-2 pt-2">
                                                        <button type="button" @click="show=false"
                                                            class="bg-gray-400 hover:bg-gray-500 text-white text-sm px-3 py-1.5 rounded-md transition">
                                                            Close
                                                        </button>
                                                        <button type="submit"
                                                            class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-3 py-1.5 rounded-md transition">
                                                            Edit
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
                                                data: {},
                                                quill: null,
                                                init() {
                                                    this.$nextTick(() => {
                                                        if (!this.quill) {
                                                            this.quill = new Quill('#editEditor', {
                                                                theme: 'snow',
                                                                placeholder: 'Edit isi berita...',
                                                                modules: {
                                                                    toolbar: [
                                                                        [{
                                                                            header: [1, 2, 3, false]
                                                                        }],
                                                                        ['bold', 'italic', 'underline'],
                                                                        ['link', 'image'],
                                                                        [{
                                                                            list: 'ordered'
                                                                        }, {
                                                                            list: 'bullet'
                                                                        }],
                                                                        ['clean']
                                                                    ]
                                                                }
                                                            });
                                                        }
                                                    });
                                                },
                                                openModal(news) {
                                                    this.data = news;
                                                    this.show = true;

                                                    this.$nextTick(() => {
                                                        document.getElementById("editNewsForm").action = "/admin/news/" + news.id;
                                                        document.getElementById("edit_title").value = news.title;
                                                        document.getElementById("edit_status").value = news.status;

                                                        // 🔥 FIX QUILL (pakai dangerouslyPasteHTML)
                                                        if (this.quill) {
                                                            this.quill.setContents([]); // reset dulu
                                                            this.quill.clipboard.dangerouslyPasteHTML(news.content);
                                                        }

                                                        document.getElementById("edit_news_content").value = news.content;
                                                    });
                                                }
                                            }
                                        }

                                        document.addEventListener("DOMContentLoaded", function() {
                                            const form = document.getElementById("editNewsForm");
                                            if (form) form.addEventListener("submit", function() {
                                                const editor = document.querySelector('#editEditor .ql-editor');
                                                if (editor) document.getElementById("edit_news_content").value = editor.innerHTML;
                                            });
                                        });
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
