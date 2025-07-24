<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | TMR Travel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
      <img src="{{ asset('assets/img/tmr-no-background.png') }}" alt="Logo TMR" width="60" height="60" class="rounded-circle">
      <span class="fw-bold">TMR Travel</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('about') ? 'active bg-light text-dark rounded px-3' : '' }}" href="{{ route('about') }}">
      Tentang
    </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('services') ? 'active bg-light text-dark rounded px-3' : '' }}" href="{{ route('services') }}">
        Layanan
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('schedule') ? 'active bg-light text-dark rounded px-3' : '' }}" href="{{ route('schedule') }}">
        Jadwal
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('contact') ? 'active bg-light text-dark rounded px-3' : '' }}" href="{{ route('contact') }}">
        Kontak
        </a>
    </li>

        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center gap-1" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="dropdown-item text-danger">Logout</button>
              </form>
            </li>
          </ul>
        </li>
        @else
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
        @endauth
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
