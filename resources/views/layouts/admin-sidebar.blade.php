<div class="w-1/5">
    <div class="bg-gray-100 border border-gray-200 overflow-hidden border-l-4 border-l-gray-300">
        <!-- Menu List -->
        <div class="mb-2">
            <h3
                class="px-4 py-3 text-xs font-semibold text-gray-700 bg-gray-100 border-y border-gray-300 tracking-wide ">
                Menu Navigasi
            </h3>
            <ul class="text-sm text-gray-600 border-t">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="block px-4 py-3 border-b transition
               {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-500 font-medium -ml-1' : 'hover:bg-gray-200' }}">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.landingpage.index') }}"
                        class="block px-4 py-3 transition
               {{ request()->routeIs('admin.landingpage.*') ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-500 font-medium -ml-1' : 'hover:bg-gray-200' }}">
                        Landing Page
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.services.index') }}"
                        class="block px-4 py-3 transition
               {{ request()->routeIs('admin.services.*') ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-500 font-medium -ml-1' : 'hover:bg-gray-200' }}">
                        Layanan
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.partners.index') }}"
                        class="block px-4 py-3 transition
               {{ request()->routeIs('admin.partners.*') ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-500 font-medium -ml-1' : 'hover:bg-gray-200' }}">
                        Mitra
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.galery.index') }}"
                        class="block px-4 py-3 transition
               {{ request()->routeIs('admin.galery.*') ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-500 font-medium -ml-1' : 'hover:bg-gray-200' }}">
                        Galeri Kegiatan
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.testimonial.index') }}"
                        class="block px-4 py-3 border-b transition
               {{ request()->routeIs('admin.testimonial.*') ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-500 font-medium -ml-1' : 'hover:bg-gray-200' }}">
                        Testimoni
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.program.index') }}"
                        class="block px-4 py-3 transition
               {{ request()->routeIs('admin.program.*') ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-500 font-medium -ml-1' : 'hover:bg-gray-200' }}">
                        Program
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.tutor.index') }}"
                        class="block px-4 py-3 border-b transition
               {{ request()->routeIs('admin.tutor.*') ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-500 font-medium -ml-1' : 'hover:bg-gray-200' }}">
                        Pengajar
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.news.index') }}"
                        class="block px-4 py-3 border-b transition
               {{ request()->routeIs('admin.news.*') ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-500 font-medium -ml-1' : 'hover:bg-gray-200' }}">
                        Berita
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.facilities.index') }}"
                        class="block px-4 py-3 transition
               {{ request()->routeIs('admin.facilities.*') ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-500 font-medium -ml-1' : 'hover:bg-gray-200' }}">
                        Fasilitas
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
