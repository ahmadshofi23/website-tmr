<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | TMR Travel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
    <img src="{{ asset('assets/img/tmr-no-background.png') }}" alt="Logo TMR" width="100" height="100" class="me-2">
        <!-- <strong>TMR Travel</strong> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Tentang</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('services') }}">Layanan</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('schedule') }}">Jadwal</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Kontak</a></li>
      </ul>
    </div>
  </div>
</nav>

<main class="py-4">
    @yield('content')
</main>

<!-- <footer class="bg-dark text-white text-center py-3">
    <div class="container">
        &copy; {{ date('Y') }} TMR - Taxi Medan Rantau Prapat. All rights reserved.
    </div>
</footer> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
