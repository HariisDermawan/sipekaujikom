@extends('layouts.app')

@section('content')

<div class="p-4 bg-white border rounded-xl">

    <div class="flex items-center justify-between mb-4">

        <h3 class="font-bold text-gray-800">
            Laporan Slip Gaji
        </h3>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full text-sm text-left border-collapse">

            <thead class="text-gray-700 bg-gray-100">

                <tr>
                    <th class="px-4 py-3">NIK</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Jabatan</th>
                    <th class="px-4 py-3">Periode</th>
                    <th class="px-4 py-3">Gaji Bersih</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>

            </thead>

            <tbody class="text-gray-700">

                @forelse($penggajians as $p)

                <tr class="border-t hover:bg-gray-50">

                    <td class="px-4 py-3">
                        {{ $p->karyawan->nik }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $p->karyawan->nama_karyawan }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $p->karyawan->jabatan->nama_jabatan }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $p->bulan_tahun }}
                    </td>

                    <td class="px-4 py-3 font-semibold text-green-600">

                        Rp {{ number_format($p->gaji_bersih_fix ?? $p->gaji_bersih,0,',','.') }}

                    </td>

                    <td class="px-4 py-3 text-center">

                        <a href="{{ route('slip.show', $p->id_penggajian) }}"
                           class="px-3 py-1 text-xs text-white bg-blue-600 rounded-lg hover:bg-blue-700">

                            Detail Slip

                        </a>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6"
                        class="px-4 py-4 text-center text-gray-500">

                        Tidak ada data slip

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
