<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LKP Unsada | News</title>

    <!-- Tailwind is included -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css?v=1772427751095') }}">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-130795909-1');
    </script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">

</head>

<body>
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

    @if (Session::has('success'))
        <script>
            toastr.success('Data Berhasil Ditambahkan', '')
        </script>
    @endif
    @if (Session::has('successedit'))
        <script>
            toastr.success('Data Berhasil Diedit', '')
        </script>
    @endif
    @if (Session::has('successeditgambar'))
        <script>
            toastr.success('Data Berhasil Diedit', '')
        </script>
    @endif
    @if (Session::has('successdelete'))
        <script>
            toastr.success('Data Berhasil Dihapus', '')
        </script>
    @endif
    @if ($errors->any())
        <script>
            toastr.error('Gagal Ditambahkan', '')
        </script>
    @endif
    <div id="app">

        <nav id="navbar-main" class="navbar is-fixed-top">
            <div class="navbar-brand">
                <a class="navbar-item mobile-aside-button">
                    <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
                </a>
            </div>
            <div class="navbar-brand is-right">
                <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
                    <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
                </a>
            </div>
            <div class="navbar-menu" id="navbar-menu">
                <div class="navbar-end">
                    <div class="navbar-item dropdown has-divider">
                        <div class="navbar-dropdown">
                            <a href="profile.html" class="navbar-item">
                                <span class="icon"><i class="mdi mdi-account"></i></span>
                                <span>My Profile</span>
                            </a>
                            <hr class="navbar-divider">


                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="navbar-item">
                                    <span class="icon"><i class="mdi mdi-logout"></i></span>
                                    <span>Log Out</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="navbar-item dropdown has-divider has-user-avatar">
                        <a class="navbar-link">
                            <div class="is-user-name"><span>{{ Auth::user()->name }}</span></div>
                            <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
                        </a>
                        <div class="navbar-dropdown">
                            <a href="profile.html" class="navbar-item">
                                <span class="icon"><i class="mdi mdi-account"></i></span>
                                <span>My Profile</span>
                            </a>
                            <a class="navbar-item">
                                <span class="icon"><i class="mdi mdi-settings"></i></span>
                                <span>Settings</span>
                            </a>
                            <a class="navbar-item">
                                <span class="icon"><i class="mdi mdi-email"></i></span>
                                <span>Messages</span>
                            </a>
                            <hr class="navbar-divider">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="navbar-item">
                                    <span class="icon"><i class="mdi mdi-logout"></i></span>
                                    <span>Log Out</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

            @include('layouts.sidebar')
        <section class="section main-section">
            <div class="bg-white shadow rounded-lg p-4">
                <div x-data="previewModalAdd()" @keydown.escape.window="show = false">
                    <div class="mb-4">
                        <div class="flex justify-between">
                            <h2 class="text-sm font-semibold text-gray-700">
                                News & Update
                            </h2>
                            <button @click="openModalAddHero()" class="bg-blue-500 text-white px-3 py-1 rounded">
                                Tambah Data
                            </button>
                        </div>
                    </div>
                    <div x-show="show" class="fixed inset-0 bg-black bg-opacity-50 z-50 overflow-y-auto" x-transition>
                        <div class="flex min-h-screen items-start justify-center p-6">
                            <div class="bg-white p-6 rounded shadow-lg w-full max-w-2xl max-h-screen overflow-y-auto">
                                <h2 class="text-lg font-bold mb-4">Tambah Data</h2>
                                <form id="newsForm" action="{{ route('admin.news.store') }}" method="POST"
                                    enctype="multipart/form-data" class="space-y-5">
                                    @csrf

                                    {{-- Thumbnail --}}
                                    <div>
                                        <x-input-label value="Thumbnail" />
                                        <input type="file" name="thumbnail"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>

                                    {{-- Judul --}}
                                    <div>
                                        <x-input-label value="Judul Berita" />
                                        <x-text-input name="news_title" class="block mt-1 w-full" required />
                                    </div>

                                    {{-- Isi --}}
                                    <div>
                                        <x-input-label value="Isi Berita" />

                                        <!-- Editor Quill -->
                                        <div id="editor" class="bg-white" style="height:250px;"></div>

                                        <!-- textarea untuk kirim ke Laravel -->
                                        <textarea name="news_content" id="news_content" hidden></textarea>
                                    </div>

                                    {{-- Status --}}
                                    <div>
                                        <x-input-label value="Status" />
                                        <select name="status"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            <option value="draft">Draft</option>
                                            <option value="publish">Publish</option>
                                        </select>
                                    </div>

                                    <div class="flex justify-end">
                                        <x-primary-button>
                                            Simpan Berita
                                        </x-primary-button>
                                    </div>
                                </form>

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
                            </div>
                        </div>
                    </div>
                </div>
                <div x-data="previewModalEdit()" x-init="init()" @keydown.escape.window="show=false">
                    <div class="overflow-x-auto">
                        <table id="submittedTable" class="w-full text-xs border border-gray-200">
                            <thead class="bg-gray-100 text-gray-600 uppercase text-[10px]">
                                <tr>
                                    <th class="px-3 py-2 text-left">No</th>
                                    <th class="px-3 py-2 text-left">Thumbnail</th>
                                    <th class="px-3 py-2 text-left">Judul</th>
                                    <th class="px-3 py-2 text-left">Konten</th>
                                    <th>Status</th>
                                    <th class="px-3 py-2 text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach ($news as $data)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>

                                        <td>
                                            <img src="{{ asset('storage/' . $data->thumbnail) }}" class="h-20">
                                        </td>

                                        <td>{{ $data->news_title ?? '-' }}</td>

                                        <td>{!! Str::limit(strip_tags($data->news_content ?? '-'), 150) !!}</td>

                                        <td>{{ $data->status }}</td>

                                        <td>
                                            <button
                                                @click="openModal({
                                                    id: @js($data->id),
                                                    title: @js($data->news_title),
                                                    content: @js($data->news_content),
                                                    status: @js($data->status),
                                                    thumbnail: @js(asset('storage/' . $data->thumbnail))
                                                })"
                                                class="bg-yellow-500 text-white px-3 py-1 rounded">
                                                Edit
                                            </button>
                                            <form action="{{ route('admin.news.destroy', $data->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus berita ini?')"
                                                class="inline">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- MODAL -->

                    <div x-show="show" class="fixed inset-0 bg-black bg-opacity-50 z-50 overflow-y-auto"
                        x-transition>
                        <div class="flex min-h-screen items-start justify-center p-6">
                            <div class="bg-white p-6 rounded shadow-lg w-full max-w-2xl max-h-screen overflow-y-auto">
                                <h2 class="text-lg font-bold mb-4">Edit Data</h2>
                                {{-- Hero Image --}}
                                <form id="editNewsForm" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" id="news_id">

                                    {{-- Thumbnail --}}
                                    <div>
                                        <x-input-label value="Thumbnail" />
                                        <img id="preview_thumbnail" class="h-24 mb-2">
                                        <input type="file" name="thumbnail"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>

                                    {{-- Judul --}}
                                    <div>
                                        <x-input-label value="Judul Berita" />
                                        <x-text-input id="edit_title" name="news_title" class="block mt-1 w-full" />
                                    </div>

                                    {{-- Isi --}}
                                    <div>
                                        <x-input-label value="Isi Berita" />

                                        <div id="editEditor" style="height:250px"></div>

                                        <textarea id="edit_news_content" name="news_content" hidden></textarea>
                                    </div>
                                    {{-- Status --}}
                                    <div>
                                        <x-input-label value="Status" />
                                        <select id="edit_status" name="status"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            <option value="draft">Draft</option>
                                            <option value="publish">Publish</option>
                                        </select>
                                    </div>

                                    <div class="mt-3 flex justify-end">
                                        <x-primary-button>
                                            Update Berita
                                        </x-primary-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script>
                        function previewModalEdit() {
                            return {
                                show: false,
                                data: {},
                                quill: null,

                                init() {

                                    this.$nextTick(() => {

                                        // cegah quill dibuat dua kali
                                        if (this.quill) return;

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

                                    });

                                },
                                openModal(news) {

                                    this.data = news;
                                    this.show = true;

                                    this.$nextTick(() => {

                                        document.getElementById("editNewsForm").action =
                                            "/admin/news/" + news.id;

                                        document.getElementById("edit_title").value = news.title;
                                        document.getElementById("edit_status").value = news.status;
                                        document.getElementById("preview_thumbnail").src = news.thumbnail;

                                        if (this.quill) {
                                            this.quill.root.innerHTML = news.content;

                                            // isi textarea juga
                                            document.getElementById("edit_news_content").value =
                                                news.content;
                                        }

                                    });

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
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {

                            const form = document.getElementById("editNewsForm");

                            if (form) {
                                form.addEventListener("submit", function() {

                                    const editor = document.querySelector('#editEditor .ql-editor');

                                    if (editor) {
                                        document.getElementById("edit_news_content").value =
                                            editor.innerHTML;
                                    }

                                });
                            }

                        });
                    </script>
                </div>
            </div>
        </section>

        <footer class="footer">
            <div class="flex flex-col md:flex-row items-center justify-center space-y-3 md:space-y-0">
                <div class="flex justify-center space-x-3">
                    <div>
                        © 2026, LKP Unsada <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </footer>

        <div id="sample-modal" class="modal">
            <div class="modal-background --jb-modal-close"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Sample modal</p>
                </header>
                <section class="modal-card-body">
                    <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
                    <p>This is sample modal</p>
                </section>
                <footer class="modal-card-foot">
                    <button class="button --jb-modal-close">Cancel</button>
                    <button class="button red --jb-modal-close">Confirm</button>
                </footer>
            </div>
        </div>

        <div id="sample-modal-2" class="modal">
            <div class="modal-background --jb-modal-close"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Sample modal</p>
                </header>
                <section class="modal-card-body">
                    <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
                    <p>This is sample modal</p>
                </section>
                <footer class="modal-card-foot">
                    <button class="button --jb-modal-close">Cancel</button>
                    <button class="button blue --jb-modal-close">Confirm</button>
                </footer>
            </div>
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
        document.addEventListener("DOMContentLoaded", function() {

            const form = document.getElementById("editNewsForm");

            if (form) {
                form.addEventListener("submit", function() {

                    const editor = document.querySelector('#editEditor .ql-editor');

                    if (editor) {
                        document.getElementById("edit_news_content").value =
                            editor.innerHTML;
                    }

                });
            }

        });
    </script>

    <script>
$(document).ready(function () {
    $('#submittedTable').DataTable({
        pageLength: 5,
        responsive: true
    });
});
</script>

    <script type="text/javascript" src="{{ asset('assets/js/main.min.js?v=1772427751095') }}"></script>
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</body>

</html>
