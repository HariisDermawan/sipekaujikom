<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen px-4 bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white shadow-md rounded-xl">
        <div class="mb-6 text-center">
            <img src="logo.png" alt="Logo Sistem" class="object-contain w-20 h-20 mx-auto mb-3">
            <h1 class="text-xl font-semibold text-gray-800">
                WELCOME ADMIN!
            </h1>

            <p class="text-sm text-gray-500">
                Silakan login untuk masuk ke dashboard
            </p>
        </div>
        @if ($errors->any())
        <div class="p-3 mb-4 text-red-100 bg-red-500 rounded">
            <ul class="pl-5 text-sm list-disc">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form class="space-y-4" action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <label class="block mb-1 text-sm text-gray-700">Email</label>
                <input type="email" name="email" placeholder="Masukkan email" required
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="relative">
                <label class="block mb-1 text-sm text-gray-700">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan password" required
                    class="w-full px-3 py-2 pr-10 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="button" onclick="togglePassword()"
                    class="absolute text-gray-500 right-2 top-8 hover:text-gray-700">
                    <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943
                                 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477
                                 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <svg id="eyeSlash" xmlns="http://www.w3.org/2000/svg" class="hidden w-5 h-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478
                                 0-8.268-2.943-9.542-7a9.956 9.956 0
                                 012.042-3.362M6.42 6.42A9.956 9.956
                                 0 0112 5c4.478 0 8.268 2.943 9.542
                                 7a9.956 9.956 0 01-4.043
                                 5.362M15 12a3 3 0 00-3-3m0
                                 0a3 3 0 00-2.83 4M3 3l18 18" />
                    </svg>

                </button>
            </div>
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center">
                    <input type="checkbox" class="mr-2" name="remember">
                    Ingat saya
                </label>
                <a href="{{ route('password.request') }}" class="text-blue-500 hover:underline">
                    Lupa password?
                </a>
            </div>
            <button type="submit" class="w-full py-2 text-white transition bg-blue-600 rounded-md hover:bg-blue-700">
                Login
            </button>
            <p class="mt-4 text-sm text-center text-gray-500">
    Belum punya akun?
    <a href="{{ route('register') }}" class="text-blue-500 hover:underline">
        Daftar sekarang
    </a>
</p>
        </form>
    </div>

    <script src="{{ asset('js/auth.js') }}"></script>
</body>

</html>
