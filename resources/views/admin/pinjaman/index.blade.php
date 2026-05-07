@extends('layouts.app')

@section('content')
<div class="p-4 bg-white border rounded-xl">

    <div class="flex items-center justify-between mb-4">
        <h3 class="font-bold text-gray-800">
            Data Pinjaman
        </h3>

        <a href="{{ route('pinjaman.create') }}"
           class="px-4 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700">

            + Tambah Pinjaman

        </a>
    </div>

    <div class="overflow-x-auto">

        <table class="w-full text-sm text-left border-collapse">

            <thead class="text-gray-700 bg-gray-100">
                <tr>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Jumlah</th>
                    <th class="px-4 py-2">Tenor</th>
                    <th class="px-4 py-2">Cicilan</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="text-gray-700">

                @forelse($pinjamans as $p)

                <tr class="border-t hover:bg-gray-50">

                    {{-- Nama --}}
                    <td class="px-4 py-3">
                        {{ $p->karyawan->nama_karyawan ?? '-' }}
                    </td>

                    {{-- Jumlah --}}
                    <td class="px-4 py-3">

                        <span class="font-medium text-gray-800">
                            Rp {{ number_format($p->jumlah_pinjaman, 0, ',', '.') }}
                        </span>

                    </td>

                    {{-- Tenor --}}
                    <td class="px-4 py-3">
                        {{ $p->tenor }} bulan
                    </td>

                    {{-- Cicilan --}}
                    <td class="px-4 py-3">

                        <span class="inline-flex items-center px-2 py-1 text-xs font-semibold text-blue-700 bg-blue-100 rounded-full">

                            Rp {{ number_format($p->cicilan_per_bulan, 0, ',', '.') }}

                        </span>

                    </td>

                    {{-- Status --}}
                    <td class="px-4 py-3">

                        @if($p->status == 'Aktif')

                            <span class="inline-flex px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">
                                Aktif
                            </span>

                        @else

                            <span class="inline-flex px-2 py-1 text-xs font-semibold text-gray-700 bg-gray-200 rounded-full">
                                Lunas
                            </span>

                        @endif

                    </td>

                    {{-- Aksi --}}
                    <td class="px-4 py-3 text-center">

                        @if($p->status == 'Aktif')

                        <form action="{{ route('pinjaman.lunas', $p->id_pinjaman) }}"
                              method="POST">

                            @csrf
                            @method('PUT')

                            <button type="submit"
                                onclick="return confirm('Yakin pinjaman sudah lunas?')"
                                class="px-3 py-1 text-xs text-white bg-green-600 rounded-lg hover:bg-green-700">

                                Tandai Lunas

                            </button>

                        </form>

                        @else

                        <span class="text-xs text-gray-400">
                            Selesai
                        </span>

                        @endif

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="6"
                        class="px-4 py-4 text-center text-gray-500">

                        Tidak ada data pinjaman

                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>
@endsection
