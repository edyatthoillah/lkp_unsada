<!DOCTYPE html>
<html lang="en" class="">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dashboard - LKP Unsada</title>

<link rel="stylesheet" href="{{ asset('assets/css/main.css?v=1772427751095') }}">

<link rel="stylesheet"
href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

</head>

<body>

<div id="app">

<!-- NAVBAR -->

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

<div class="navbar-item dropdown has-divider has-user-avatar">

<a class="navbar-link">

<div class="is-user-name">
<span>{{ Auth::user()->name }}</span>
</div>

<span class="icon">
<i class="mdi mdi-chevron-down"></i>
</span>

</a>

<div class="navbar-dropdown">

<a href="#" class="navbar-item">
<span class="icon"><i class="mdi mdi-account"></i></span>
<span>Profile</span>
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


<!-- SIDEBAR -->

@include('layouts.sidebar')


<!-- MAIN -->

<section class="section main-section">

<!-- WELCOME -->

<div class="bg-white rounded-lg shadow p-6 mb-6">

<h1 class="text-2xl font-bold text-gray-800">
Selamat Datang, {{ Auth::user()->name }} 👋
</h1>

<p class="text-gray-500 mt-2">
Dashboard Admin LKP Unsada digunakan untuk mengelola konten website seperti berita, testimonial, dan program pelatihan.
</p>

</div>


<!-- STATISTIK CARD -->

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">

<div class="bg-white p-5 rounded-lg shadow">

<div class="flex items-center justify-between">

<div>

<p class="text-gray-500 text-sm">Total Program</p>
<h2 class="text-2xl font-bold text-gray-800">12</h2>

</div>

<i class="mdi mdi-school text-3xl text-blue-500"></i>

</div>

</div>


<div class="bg-white p-5 rounded-lg shadow">

<div class="flex items-center justify-between">

<div>

<p class="text-gray-500 text-sm">Total Berita</p>
<h2 class="text-2xl font-bold text-gray-800">8</h2>

</div>

<i class="mdi mdi-newspaper text-3xl text-green-500"></i>

</div>

</div>


<div class="bg-white p-5 rounded-lg shadow">

<div class="flex items-center justify-between">

<div>

<p class="text-gray-500 text-sm">Testimonial</p>
<h2 class="text-2xl font-bold text-gray-800">5</h2>

</div>

<i class="mdi mdi-account-group text-3xl text-purple-500"></i>

</div>

</div>


<div class="bg-white p-5 rounded-lg shadow">

<div class="flex items-center justify-between">

<div>

<p class="text-gray-500 text-sm">Pengunjung Website</p>
<h2 class="text-2xl font-bold text-gray-800">1,240</h2>

</div>

<i class="mdi mdi-chart-line text-3xl text-red-500"></i>

</div>

</div>

</div>


<!-- INFORMASI SISTEM -->

<div class="bg-white rounded-lg shadow p-6 mb-6">

<h2 class="text-lg font-semibold mb-4">
Informasi Sistem
</h2>

<ul class="text-sm text-gray-600 space-y-2">

<li>🌐 Website : LKP Unsada</li>
<li>⚙️ Framework : Laravel</li>
<li>🎨 UI : Tailwind CSS</li>
<li>🗓️ Tahun : 2026</li>
<li>👨‍💻 Developer : Tim IT Unsada</li>

</ul>

</div>


<!-- QUICK MENU -->

<div class="bg-white rounded-lg shadow p-6">

<h2 class="text-lg font-semibold mb-4">
Menu Cepat
</h2>

<div class="grid grid-cols-2 md:grid-cols-4 gap-4">

<a href="/admin/news"
class="bg-blue-500 text-white text-center p-4 rounded-lg hover:bg-blue-600">

<i class="mdi mdi-newspaper text-2xl"></i>

<p class="text-sm mt-1">
Kelola Berita
</p>

</a>


<a href="/admin/testimonial"
class="bg-green-500 text-white text-center p-4 rounded-lg hover:bg-green-600">

<i class="mdi mdi-account-group text-2xl"></i>

<p class="text-sm mt-1">
Kelola Testimoni
</p>

</a>


<a href="/admin/program"
class="bg-purple-500 text-white text-center p-4 rounded-lg hover:bg-purple-600">

<i class="mdi mdi-school text-2xl"></i>

<p class="text-sm mt-1">
Kelola Program
</p>

</a>


<a href="/"
class="bg-gray-700 text-white text-center p-4 rounded-lg hover:bg-gray-800">

<i class="mdi mdi-web text-2xl"></i>

<p class="text-sm mt-1">
Lihat Website
</p>

</a>

</div>

</div>


</section>


<!-- FOOTER -->

<footer class="footer">

<div class="flex flex-col md:flex-row items-center justify-center space-y-3 md:space-y-0">

<div class="flex justify-center space-x-3">

<div>
© 2026, LKP Unsada
</div>

</div>

</div>

</footer>


</div>


<script src="{{ asset('assets/js/main.min.js?v=1772427751095') }}"></script>

</body>
</html>
