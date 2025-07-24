<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-sm p-6 bg-white rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Login Admin</h2>

        @if($errors->any())
            <div class="mb-4 text-red-600 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Email</label>
                <input type="email" name="email" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Password</label>
                <input type="password" name="password" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring" required>
            </div>
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-sm text-gray-600">Ingat saya</label>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">Login</button>
        </form>
    </div>
</body>
</html>
