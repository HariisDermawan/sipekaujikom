<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gray-50">
    <div class="flex h-screen">
        <aside id="sidebar"
            class="fixed z-30 w-64 h-full transition transform -translate-x-full bg-white border-r md:static md:translate-x-0">

            <div class="px-6 py-5 border-b">
                <h1 class="text-lg font-semibold text-gray-800">SIPEKA</h1>
            </div>
            <nav class="p-4 space-y-2 text-sm">
                <div>

                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg
            {{ request()->routeIs('admin.dashboard')
                ? 'bg-gray-100 text-blue-600 font-semibold'
                : 'text-gray-700 hover:bg-gray-100' }}">

                        <i class="fa-solid fa-house"></i>
                        Dashboard

                    </a>

                </div>
                <div>

                    <button onclick="toggleMenu('masterMenu')"
                        class="flex items-center justify-between w-full px-4 py-2 rounded-lg
            {{ request()->routeIs('karyawan.*') || request()->routeIs('jabatan.*')
                ? 'bg-gray-100 text-blue-600 font-semibold'
                : 'text-gray-700 hover:bg-gray-100' }}">

                        <span class="flex items-center gap-2">

                            <i class="fa-solid fa-database"></i>
                            Master Data

                        </span>

                        <i class="text-xs fa-solid fa-chevron-down"></i>

                    </button>

                    <div id="masterMenu"
                        class="mt-2 ml-6 space-y-1
            {{ request()->routeIs('karyawan.*') || request()->routeIs('jabatan.*') ? '' : 'hidden' }}">

                        <a href="{{ route('karyawan.index') }}"
                            class="block px-3 py-2 rounded
                {{ request()->routeIs('karyawan.*')
                    ? 'bg-gray-100 text-blue-600 font-semibold'
                    : 'text-gray-700 hover:bg-gray-100' }}">

                            Data Karyawan

                        </a>

                        <a href="{{ route('jabatan.index') }}"
                            class="block px-3 py-2 rounded
                {{ request()->routeIs('jabatan.*')
                    ? 'bg-gray-100 text-blue-600 font-semibold'
                    : 'text-gray-700 hover:bg-gray-100' }}">

                            Data Jabatan

                        </a>

                    </div>

                </div>

                <div>

                    <button onclick="toggleMenu('transaksiMenu')"
                        class="flex items-center justify-between w-full px-4 py-2 rounded-lg
            {{ request()->routeIs('penggajian.*') || request()->routeIs('pinjaman.*')
                ? 'bg-gray-100 text-blue-600 font-semibold'
                : 'text-gray-700 hover:bg-gray-100' }}">

                        <span class="flex items-center gap-2">

                            <i class="fa-solid fa-money-bill"></i>
                            Transaksi

                        </span>

                        <i class="text-xs fa-solid fa-chevron-down"></i>

                    </button>

                    <div id="transaksiMenu"
                        class="mt-2 ml-6 space-y-1
            {{ request()->routeIs('penggajian.*') || request()->routeIs('pinjaman.*') ? '' : 'hidden' }}">

                        <a href="{{ route('penggajian.index') }}"
                            class="block px-3 py-2 rounded
                {{ request()->routeIs('penggajian.*')
                    ? 'bg-gray-100 text-blue-600 font-semibold'
                    : 'text-gray-700 hover:bg-gray-100' }}">

                            Input Gaji

                        </a>

                        <a href="{{ route('pinjaman.index') }}"
                            class="block px-3 py-2 rounded
                {{ request()->routeIs('pinjaman.*')
                    ? 'bg-gray-100 text-blue-600 font-semibold'
                    : 'text-gray-700 hover:bg-gray-100' }}">

                            Pengajuan Pinjaman

                        </a>

                    </div>

                </div>
                <div>

                    <button onclick="toggleMenu('laporanMenu')"
                        class="flex items-center justify-between w-full px-4 py-2 rounded-lg
            {{ request()->routeIs('slip.*') || request()->routeIs('laporan.*')
                ? 'bg-gray-100 text-blue-600 font-semibold'
                : 'text-gray-700 hover:bg-gray-100' }}">

                        <span class="flex items-center gap-2">

                            <i class="fa-solid fa-chart-bar"></i>
                            Laporan

                        </span>

                        <i class="text-xs fa-solid fa-chevron-down"></i>

                    </button>

                    <div id="laporanMenu"
                        class="mt-2 ml-6 space-y-1
            {{ request()->routeIs('slip.*') || request()->routeIs('laporan.*') ? '' : 'hidden' }}">

                        <a href="{{ route('slip.index') }}"
                            class="block px-3 py-2 rounded
                {{ request()->routeIs('slip.*') ? 'bg-gray-100 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">

                            Slip Gaji

                        </a>

                        <a href="{{ route('laporan.index') }}"
                            class="block px-3 py-2 rounded
                {{ request()->routeIs('laporan.*')
                    ? 'bg-gray-100 text-blue-600 font-semibold'
                    : 'text-gray-700 hover:bg-gray-100' }}">

                            Rekap Bulanan

                        </a>

                    </div>

                </div>

            </nav>
        </aside>

        <div class="flex flex-col flex-1">

            <header class="flex items-center justify-between px-6 py-4 bg-white border-b">

                <button onclick="toggleSidebar()" class="text-gray-600 md:hidden">
                    <i class="fa-solid fa-bars"></i>
                </button>

                <h2 class="text-lg font-medium text-gray-700">Dashboard</h2>
                <div class="relative">

                    <button onclick="toggleProfile()"
                        class="flex items-center gap-2 text-sm text-gray-700 focus:outline-none">

                        <i class="text-lg fa-solid fa-user-circle"></i>
                        <span>Admin</span>
                        <i class="text-xs fa-solid fa-chevron-down"></i>
                    </button>

                    <div id="profileMenu" class="absolute right-0 hidden w-40 mt-2 bg-white border rounded-lg shadow">

                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm hover:bg-gray-100">
                            <i class="fa-solid fa-user"></i>
                            Profile
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Logout
                            </button>
                        </form>

                    </div>

                </div>

            </header>
            <main class="p-6 space-y-6 overflow-y-auto">

                @if (request()->routeIs('admin.dashboard'))
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">

                        <div class="p-5 bg-white border rounded-xl">
                            <p class="text-sm text-gray-500">Total Karyawan</p>
                            <h3 class="text-2xl font-semibold text-gray-800">
                                {{ $totalkaryawan }}
                            </h3>
                        </div>

                        <div class="p-5 bg-white border rounded-xl">
                            <p class="text-sm text-gray-500">Total Pinjaman</p>
                            <h3 class="text-2xl font-semibold text-gray-800">
                                {{ $totalPinjaman }}
                            </h3>
                        </div>

                        <div class="p-5 bg-white border rounded-xl">
                            <p class="text-sm text-gray-500">Penggajian</p>
                            <h3 class="text-2xl font-semibold text-gray-800">
                                Rp {{ number_format($totalGaji, 0, ',', '.') }}
                            </h3>
                        </div>

                    </div>
                @endif

                @yield('content')

            </main>

        </div>

    </div>

    <script src="{{ asset('js/auth.js') }}"></script>
</body>

</html>
