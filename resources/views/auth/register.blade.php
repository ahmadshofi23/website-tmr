<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - TMR Travel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* Background Gradient Animasi */
        body {
            background: linear-gradient(-45deg, #ff8c00, #ffc107, #ffb347, #ffcd70);
            background-size: 400% 400%;
            animation: gradientMove 12s ease infinite;
        }
        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">

    <div class="w-full max-w-sm p-6 sm:p-8 bg-white/80 backdrop-blur-lg rounded-2xl shadow-xl border border-white/20"
         data-aos="fade-up" data-aos-duration="900">

        <div class="text-center mb-6">
            <div class="w-16 h-16 mx-auto mb-3 rounded-full bg-gradient-to-tr from-orange-500 to-yellow-400 flex items-center justify-center shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m12-10a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Daftar Akun</h2>
            <p class="text-gray-600 text-sm mt-1">Buat akun baru untuk memulai perjalanan Anda</p>
        </div>

        @if($errors->any())
            <div class="mb-4 text-red-600 text-sm bg-red-50 border border-red-200 p-2 rounded-md">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700 mb-1 text-sm font-medium">Nama Lengkap</label>
                <input type="text" name="name" 
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-transparent"
                       required>
            </div>

            <div>
                <label class="block text-gray-700 mb-1 text-sm font-medium">Email</label>
                <input type="email" name="email" 
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-transparent"
                       required>
            </div>

            <div>
                <label class="block text-gray-700 mb-1 text-sm font-medium">Password</label>
                <input type="password" name="password" 
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-transparent"
                       required>
            </div>

            <div>
                <label class="block text-gray-700 mb-1 text-sm font-medium">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" 
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-transparent"
                       required>
            </div>

            <button type="submit" 
                class="w-full py-2 px-4 bg-gradient-to-r from-orange-500 to-yellow-500 text-white font-medium rounded-lg hover:scale-[1.03] transform transition shadow-lg">
                Daftar
            </button>
        </form>

        <div class="mt-6 text-center text-sm text-gray-700">
            Sudah punya akun? 
            <a href="{{ route('login') }}" class="text-orange-600 font-medium hover:underline">Login di sini</a>
        </div>
    </div>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ once: true });
    </script>
</body>
</html>
