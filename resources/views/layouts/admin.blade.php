<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            background: linear-gradient(135deg, #0d6efd, #3f87f5, #6f42c1);
            background-size: 400% 400%;
            animation: gradientMove 15s ease infinite;
            overflow-x: hidden;
            color: #fff;
        }

        @keyframes gradientMove {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

        /* Glass Sidebar */
        .sidebar {
            width: 250px;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(14px);
            color: white;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            z-index: 1000;
            border-right: 1px solid rgba(255,255,255,0.15);
            overflow: hidden;
            position: relative;
        }

        .sidebar.collapsed { width: 70px; }

        .sidebar-header {
            font-size: 1.4rem;
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid rgba(255,255,255,0.15);
            transition: 0.3s;
            position: relative;
            color: #ffc107;
        }

        .sidebar a, .sidebar button {
            color: white;
            display: flex;
            align-items: center;
            padding: 14px 20px;
            text-decoration: none;
            transition: 0.3s;
            border: none;
            background: none;
            width: 100%;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .sidebar a:hover, .sidebar button:hover {
            background-color: rgba(255,255,255,0.08);
            padding-left: 25px;
            color: #ffc107;
        }

        /* Aktif menu */
        .sidebar a.active {
            background-color: rgba(255,255,255,0.15);
            border-left: 4px solid #ffc107;
            padding-left: 18px;
            color: #ffc107;
        }

        .sidebar i {
            margin-right: 10px;
            font-size: 1.2rem;
            min-width: 25px;
            text-align: center;
        }

        /* Ripple effect */
        .ripple {
            position: absolute;
            border-radius: 50%;
            transform: scale(0);
            animation: ripple-animation 0.6s linear;
            background: rgba(255, 193, 7, 0.3); /* Ripple kuning lembut */
        }

        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }

        /* Hide text if collapsed */
        .sidebar.collapsed a span,
        .sidebar.collapsed button span {
            display: none;
        }

        /* Content Area */
        .content {
            flex-grow: 1;
            padding: 30px;
            animation: fadeIn 0.6s ease;
        }

        /* Animasi Fade */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(5px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Toggle Button */
        .toggle-btn {
            position: absolute;
            top: 15px;
            right: -15px;
            background: rgba(255,255,255,0.15);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 2px 6px rgba(0,0,0,0.3);
        }

        .sidebar.collapsed .toggle-btn {
            transform: rotate(180deg);
        }

        /* Mobile Responsive */
        @media (max-width: 991px) {
            .sidebar {
                position: fixed;
                left: -250px;
                top: 0;
                height: 100%;
            }
            .sidebar.show {
                left: 0;
            }
            .sidebar.collapsed { width: 250px; }
            .sidebar.collapsed a span,
            .sidebar.collapsed button span { display: inline; }
            .content { padding: 20px; }
            .toggle-btn { right: -40px; }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar" data-aos="fade-right">
        <div class="sidebar-header">
            <a href="{{ route('admin.home') }}" class="text-decoration-none text-warning">
                <strong>TMR Admin</strong>
            </a>
            <div class="toggle-btn" id="toggle-btn">
                <i class="bi bi-list"></i>
            </div>
        </div>

        <a href="{{ route('admin.routes.index') }}" class="ripple-link {{ request()->routeIs('admin.routes.*') ? 'active' : '' }}">
            <i class="bi bi-geo-alt-fill"></i> <span>Rute Perjalanan</span>
        </a>
        <a href="{{ route('admin.trips.index') }}" class="ripple-link {{ request()->routeIs('admin.trips.*') ? 'active' : '' }}">
            <i class="bi bi-bag-fill"></i> <span>Trip / Paket Wisata</span>
        </a>
        <a href="{{ url('/') }}" class="ripple-link">
            <i class="bi bi-house-door-fill"></i> <span>Kembali ke Website</span>
        </a>
        <form method="POST" action="{{ route('logout') }}" class="mt-auto mb-3">
            @csrf
            <button type="submit" class="ripple-link"><i class="bi bi-box-arrow-right"></i> <span>Logout</span></button>
        </form>
    </div>
    
    <!-- Content Area -->
    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });

        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggle-btn');

        toggleBtn.addEventListener('click', () => {
            if(window.innerWidth <= 991){
                sidebar.classList.toggle('show');
            } else {
                sidebar.classList.toggle('collapsed');
            }
        });

        document.addEventListener('click', function(e) {
            if(window.innerWidth <= 991){
                if(!sidebar.contains(e.target) && !toggleBtn.contains(e.target)){
                    sidebar.classList.remove('show');
                }
            }
        });

        // Ripple effect
        document.querySelectorAll('.ripple-link').forEach(link => {
            link.addEventListener('click', function (e) {
                const ripple = document.createElement('span');
                ripple.classList.add('ripple');
                const rect = this.getBoundingClientRect();
                ripple.style.left = `${e.clientX - rect.left}px`;
                ripple.style.top = `${e.clientY - rect.top}px`;
                this.appendChild(ripple);
                setTimeout(() => ripple.remove(), 600);
            });
        });
    </script>

</body>
</html>
