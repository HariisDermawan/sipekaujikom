@extends('layouts.app')

@section('content')
<div class="p-4 bg-white border rounded-xl">

    <div class="flex items-center justify-between mb-4">
        <h3 class="font-bold text-gray-800">
            Data Penggajian
        </h3>

        <a href="{{ route('penggajian.create') }}"
           class="px-4 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700">

            + Input Gaji

        </a>
    </div>

    <div class="overflow-x-auto">

        <table class="w-full text-sm text-left border-collapse">

            <thead class="text-gray-700 bg-gray-100">
                <tr>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Jabatan</th>
                    <th class="px-4 py-3">Bulan</th>
                    <th class="px-4 py-3">Potongan</th>
                    <th class="px-4 py-3">Gaji Bersih</th>
                </tr>
            </thead>

            <tbody class="text-gray-700">

                @forelse($penggajians as $p)

                <tr class="border-t hover:bg-gray-50">

                    {{-- Nama --}}
                    <td class="px-4 py-3">
                        {{ $p->karyawan->nama_karyawan ?? '-' }}
                    </td>

                    {{-- Jabatan --}}
                    <td class="px-4 py-3">
                        {{ $p->karyawan->jabatan->nama_jabatan ?? '-' }}
                    </td>

                    {{-- Bulan --}}
                    <td class="px-4 py-3">
                        {{ $p->bulan_tahun }}
                    </td>

                    {{-- Potongan --}}
                    <td class="px-4 py-3">

                        <span class="inline-flex items-center gap-1 px-2 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full">

                            <i class="fa-solid fa-minus"></i>

                            Rp {{ number_format($p->potongan_fix, 0, ',', '.') }}

                        </span>

                    </td>

                    {{-- Gaji Bersih --}}
                    <td class="px-4 py-3">

                        <span class="inline-flex items-center gap-1 px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">

                            <i class="fa-solid fa-wallet"></i>

                            Rp {{ number_format($p->gaji_bersih_fix, 0, ',', '.') }}

                        </span>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="5"
                        class="px-4 py-4 text-center text-gray-500">

                        Tidak ada data penggajian

                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>
@endsection
