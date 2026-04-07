<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LKP Unsada | Testimonial</title>

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>

<body>

    <script>
        toastr.options = {
            positionClass: "toast-top-right",
            timeOut: "3000"
        }
    </script>

    @if (Session::has('success'))
        <script>
            toastr.success('Data berhasil ditambahkan')
        </script>
    @endif

    @if (Session::has('successedit'))
        <script>
            toastr.success('Data berhasil diedit')
        </script>
    @endif

    @if (Session::has('successdelete'))
        <script>
            toastr.success('Data berhasil dihapus')
        </script>
    @endif


    <div id="app">

        <nav id="navbar-main" class="navbar is-fixed-top">
            <div class="navbar-brand">
                <a class="navbar-item mobile-aside-button">
                    <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
                </a>
            </div>
        </nav>

        @include('layouts.sidebar')




        <section class="section main-section">

            <div class="bg-white shadow rounded-lg p-4">

                <div x-data="modalAdd()" @keydown.escape.window="show=false">

                    <div class="flex justify-between mb-4">

                        <h2 class="text-sm font-semibold text-gray-700">
                            Testimonial
                        </h2>

                        <button @click="show=true" class="bg-blue-500 text-white px-3 py-1 rounded">
                            Tambah Data
                        </button>

                    </div>


                    <!-- MODAL ADD -->

                    <div x-show="show" class="fixed inset-0 bg-black bg-opacity-50 z-50">

                        <div class="flex min-h-screen items-start justify-center p-6">

                            <div class="bg-white p-6 rounded shadow-lg w-full max-w-xl">

                                <h2 class="text-lg font-bold mb-4">
                                    Tambah Testimonial
                                </h2>

                                <form action="{{ route('admin.testimonial.store') }}" method="POST"
                                    enctype="multipart/form-data" class="space-y-4">

                                    @csrf
{{--
                                    <div>
                                        <label class="text-sm">Foto</label>
                                        <input type="file" name="photo" class="w-full border rounded p-2">
                                    </div> --}}

                                    <div>
                                        <label class="text-sm">Nama</label>
                                        <input type="text" name="name" class="w-full border rounded p-2" required>
                                    </div>

                                    <div>
                                        <label class="text-sm">Program / Posisi</label>
                                        <select name="position" class="w-full border rounded p-2">
                                            <option value="">-- Pilih Program / Posisi --</option>
                                            <option value="Pelatihan Sertifikasi dan Perolehan Gelar non Akademik">
                                                Pelatihan Sertifikasi dan Perolehan Gelar non Akademik</option>
                                            <option value="Program Bahasa Jepang">Program Bahasa Jepang</option>
                                            <option value="Program Bahasa Inggris">Program Bahasa Inggris</option>
                                            <option value="Program Bahasa Mandarin">Program Bahasa Mandarin</option>
                                            <option value="Program Bahasa Indonesia (BIPA)">Program Bahasa Indonesia
                                                (BIPA)</option>
                                            <option value="Privat Bahasa Jepang">Privat Bahasa Jepang</option>
                                            <option value="Privat Bahasa Mandarin">Privat Bahasa Mandarin</option>
                                            <option value="Jasa Terjemah">Jasa Terjemah</option>
                                            <option value="Jasa Interpreter">Jasa Interpreter</option>
                                            <option value="Jasa Pengetikan">Jasa Pengetikan</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="text-sm">Testimoni</label>
                                        <textarea name="message" rows="4" class="w-full border rounded p-2"></textarea>
                                    </div>


                                    <div class="flex justify-end gap-2">

                                        <!-- Button Close -->
                                        <button type="button" @click="show=false"
                                            class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">
                                            Close
                                        </button>
                                        <button class="bg-blue-600 text-white px-4 py-2 rounded">
                                            Simpan
                                        </button>
                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- TABLE -->

                <div x-data="modalEdit()">

                    <div class="overflow-x-auto">

                        <table id="submittedTable" class="w-full text-xs border">

                            <thead class="bg-gray-100 text-gray-600">

                                <tr>

                                    <th>No</th>
                                    {{-- <th>Foto</th> --}}
                                    <th>Nama</th>
                                    <th>Program</th>
                                    <th>Testimoni</th>
                                    <th>Aksi</th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach ($testimonials as $data)
                                    <tr>

                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>

                                        {{-- <td>

                                            <img src="{{ $data->photo ? asset('storage/' . $data->photo) : 'https://i.pravatar.cc/60' }}"
                                                class="w-12 h-12 rounded-full object-cover">

                                        </td> --}}

                                        <td>{{ $data->name }}</td>

                                        <td>{{ $data->position }}</td>

                                        <td>{{ Str::limit($data->message, 80) }}</td>

                                        <td>

                                            <button
                                                @click="openModal({
                                                    id: {{ $data->id }},
                                                    name: '{{ $data->name }}',
                                                    position: '{{ $data->position }}',
                                                    message: `{{ $data->message }}`,
                                                    {{-- photo: '{{ asset('storage/' . $data->photo) }}' --}}
                                                    })"
                                                class="bg-yellow-500 text-white px-3 py-1 rounded">

                                                Edit

                                            </button>


                                            <form action="{{ route('admin.testimonial.destroy', $data->id) }}"
                                                method="POST" class="inline"
                                                onsubmit="return confirm('Hapus testimonial?')">

                                                @csrf
                                                @method('DELETE')

                                                <button class="bg-red-500 text-white px-3 py-1 rounded">
                                                    Delete
                                                </button>

                                            </form>

                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>


                    <!-- MODAL EDIT -->

                    <div x-show="show" class="fixed inset-0 bg-black bg-opacity-50 z-50">

                        <div class="flex min-h-screen items-start justify-center p-6">

                            <div class="bg-white p-6 rounded shadow-lg w-full max-w-xl">

                                <h2 class="text-lg font-bold mb-4">
                                    Edit Testimonial
                                </h2>

                                <form :action="'/admin/testimonial/' + data.id" method="POST"
                                    enctype="multipart/form-data" class="space-y-4">

                                    @csrf
                                    @method('PUT')

                                    {{-- <div>

                                        <img :src="data.photo" class="w-16 h-16 rounded-full mb-2">

                                        <input type="file" name="photo" class="w-full border p-2">

                                    </div> --}}

                                    <div>

                                        <input type="text" name="name" x-model="data.name"
                                            class="w-full border p-2">

                                    </div>

                                    <div>

                                        <div>
                                            <label class="text-sm">Program / Posisi</label>

                                            <select name="position" x-model="data.position"
                                                class="w-full border rounded p-2">
                                                <option value="">-- Pilih Program / Posisi --</option>
                                                <option value="Pelatihan Sertifikasi dan Perolehan Gelar non Akademik">
                                                    Pelatihan Sertifikasi dan Perolehan Gelar non Akademik</option>
                                                <option value="Program Bahasa Jepang">Program Bahasa Jepang</option>
                                                <option value="Program Bahasa Inggris">Program Bahasa Inggris</option>
                                                <option value="Program Bahasa Mandarin">Program Bahasa Mandarin
                                                </option>
                                                <option value="Program Bahasa Indonesia (BIPA)">Program Bahasa
                                                    Indonesia (BIPA)</option>
                                                <option value="Privat Bahasa Jepang">Privat Bahasa Jepang</option>
                                                <option value="Privat Bahasa Mandarin">Privat Bahasa Mandarin</option>
                                                <option value="Jasa Terjemah">Jasa Terjemah</option>
                                                <option value="Jasa Interpreter">Jasa Interpreter</option>
                                                <option value="Jasa Pengetikan">Jasa Pengetikan</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div>

                                        <textarea name="message" rows="4" x-model="data.message" class="w-full border p-2"></textarea>

                                    </div>

                                    <div class="flex justify-end gap-2">

                                        <!-- Button Close -->
                                        <button type="button" @click="show=false"
                                            class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">
                                            Close
                                        </button>

                                        <!-- Button Update -->
                                        <button type="submit"
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                                            Update
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


    <script>
        function modalAdd() {
            return {
                show: false
            }
        }

        function modalEdit() {
            return {

                show: false,
                data: {},

                openModal(item) {
                    this.data = item
                    this.show = true
                }

            }
        }
    </script>


    <script>
        $(document).ready(function() {

            $('#submittedTable').DataTable({
                pageLength: 5
            });

        });
    </script>


    <script src="{{ asset('assets/js/main.min.js') }}"></script>

</body>

</html>
