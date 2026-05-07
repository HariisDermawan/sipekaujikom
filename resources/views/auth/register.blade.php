<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen px-4 bg-gray-100">

    <div class="w-full max-w-md p-8 bg-white shadow-md rounded-xl">
        <div class="mb-6 text-center">
            <img src="logo.png" alt="Logo" class="object-contain w-20 h-20 mx-auto mb-3">

            <h1 class="text-xl font-semibold text-gray-800">
                Register
            </h1>

            <p class="text-sm text-gray-500">
                Buat akun baru
            </p>
        </div>

        <form class="space-y-4" action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <label class="block mb-1 text-sm text-gray-700">Nama</label>
                <input type="text" name="name" placeholder="Masukkan nama" required
                    class="w-full px-3 py-2 border rounded-md outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-1 text-sm text-gray-700">Email</label>
                <input type="email" name="email" placeholder="Masukkan email" required
                    class="w-full px-3 py-2 border rounded-md outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="relative">
                <label class="block mb-1 text-sm text-gray-700">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan password" required
                    class="w-full px-3 py-2 pr-10 border rounded-md outline-none focus:ring-2 focus:ring-blue-500">

                <button type="button" onclick="togglePassword()" class="absolute text-gray-500 right-2 top-8">
                    <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0
                                 8.268 2.943 9.542 7-1.274 4.057-5.065
                                 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <svg id="eyeSlash" xmlns="http://www.w3.org/2000/svg" class="hidden w-5 h-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18M10.584 10.587A2 2 0 0012
                                 14a2 2 0 001.414-.586M9.88
                                 5.52A9.956 9.956 0 0112 5c4.478
                                 0 8.268 2.943 9.542 7a9.97 9.97
                                 0 01-4.042 5.362M6.42 6.42A9.97
                                 9.97 0 002.458 12c1.274 4.057
                                 5.064 7 9.542 7 1.2 0 2.352-.214
                                 3.416-.612" />
                    </svg>

                </button>
            </div>
            <div>
                <label class="block mb-1 text-sm text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" placeholder="Ulangi password" required
                    class="w-full px-3 py-2 border rounded-md outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="w-full py-2 text-white transition bg-blue-600 rounded-md hover:bg-blue-700">
                Register
            </button>
            <p class="text-sm text-center text-gray-500">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">
                    Login
                </a>
            </p>

        </form>

    </div>

    <script src="{{ asset('js/auth.js') }}"></script>

</body>

</html>
