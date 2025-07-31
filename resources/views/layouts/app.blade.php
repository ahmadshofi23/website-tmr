<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | TMR Travel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        /* =============== NAVBAR MODERN =============== */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 1030;
            backdrop-filter: blur(15px);
            background: rgba(255, 255, 255, 0.15);
            color: #000;
            transition: 0.3s ease-in-out;
        }
        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.85);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .navbar .nav-link {
            color: #000;
            transition: 0.3s;
            border-radius: 20px;
            padding: 6px 15px;
        }
        .navbar-brand{
          color: #000;
        }
        .navbar-brand:hover{
          color: #ffc107
        }
        .navbar .nav-link:hover {
            background: rgba(255, 255, 255, 0.25);
            color: #ffc107;
        }
        .navbar.scrolled .nav-link {
            color: #000;
        }
        .navbar.scrolled .nav-link:hover {
            color: #ff8c00;
        }

        /* =============== FOOTER MODERN =============== */
        footer {
            background: linear-gradient(135deg, #0d0d0d, #1a1a1a);
            color: #aaa;
        }
        footer a {
            color: #ffc107;
            text-decoration: none;
            transition: 0.3s;
        }
        footer a:hover {
            color: #fff;
        }
    </style>
</head>
<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-dark py-2">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="{{ route('home') }}">
      <img src="{{ asset('assets/img/tmr-no-background.png') }}" alt="Logo TMR" width="50" height="50" class="rounded-circle">
      TMR Travel
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('about') ? 'active bg-light text-dark' : '' }}" href="{{ route('about') }}">
                Tentang
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('services') ? 'active bg-light text-dark' : '' }}" href="{{ route('services') }}">
                Layanan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('schedule') ? 'active bg-light text-dark' : '' }}" href="{{ route('schedule') }}">
                Jadwal
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('contact') ? 'active bg-light text-dark' : '' }}" href="{{ route('contact') }}">
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

{{-- FOOTER MODERN --}}
<footer class="text-center py-4 mt-5">
    <div class="container">
        <p class="mb-1">&copy; {{ date('Y') }} <strong>TMR Travel</strong> - Taxi Medan Rantau Prapat</p>
        <small>Dibuat dengan ❤️ di Medan</small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Efek scroll navbar
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        navbar.classList.toggle('scrolled', window.scrollY > 50);
    });
</script>
</body>
</html>
