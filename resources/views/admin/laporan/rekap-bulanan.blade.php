@extends('layouts.app')

@section('content')


<div class="p-6 bg-white border rounded-xl print-area">
    <div class="flex flex-col gap-4 mb-6 md:flex-row md:items-center md:justify-between">

        <div>

            <h3 class="text-xl font-bold text-gray-800">
                Rekapitulasi Penggajian
            </h3>

            <p class="text-sm text-gray-500">
                Laporan Penggajian Karyawan
            </p>

        </div>
        <div class="flex gap-2 no-print">

            <button onclick="window.print()"
                class="px-4 py-2 text-sm text-white bg-green-600 rounded-lg hover:bg-green-700">

                <i class="mr-1 fa-solid fa-print"></i>
                Cetak Laporan

            </button>

        </div>

    </div>
    <form action="{{ route('laporan.index') }}"
        method="GET"
        class="flex flex-col gap-3 mb-6 md:flex-row md:items-end no-print">

        <div>

            <label class="block mb-1 text-sm text-gray-600">
                Bulan
            </label>

            <select name="bulan"
                class="px-3 py-2 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                <option value="">
                    -- Pilih Bulan --
                </option>

                @foreach([
                    '01' => 'Januari',
                    '02' => 'Februari',
                    '03' => 'Maret',
                    '04' => 'April',
                    '05' => 'Mei',
                    '06' => 'Juni',
                    '07' => 'Juli',
                    '08' => 'Agustus',
                    '09' => 'September',
                    '10' => 'Oktober',
                    '11' => 'November',
                    '12' => 'Desember'
                ] as $key => $bulan)

                    <option value="{{ $key }}"
                        {{ request('bulan') == $key ? 'selected' : '' }}>

                        {{ $bulan }}

                    </option>

                @endforeach

            </select>

        </div>

        <div>

            <label class="block mb-1 text-sm text-gray-600">
                Tahun
            </label>

            <input type="number"
                name="tahun"
                value="{{ request('tahun') }}"
                placeholder="2026"
                class="px-3 py-2 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

        </div>

        <button type="submit"
            class="px-4 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700">

            <i class="mr-1 fa-solid fa-filter"></i>
            Filter

        </button>

    </form>
    <div class="overflow-x-auto">

        <table class="w-full text-sm text-left border-collapse">

            <thead class="text-gray-700 bg-gray-100">

                <tr>

                    <th class="px-4 py-3">
                        No
                    </th>

                    <th class="px-4 py-3">
                        NIK
                    </th>

                    <th class="px-4 py-3">
                        Nama
                    </th>

                    <th class="px-4 py-3">
                        Jabatan
                    </th>

                    <th class="px-4 py-3">
                        Gaji Bersih
                    </th>

                </tr>

            </thead>

            <tbody class="text-gray-700">

                @php
                    $total = 0;
                @endphp

                @forelse($penggajians as $key => $p)

                    @php
                        $total += $p->gaji_bersih;
                    @endphp

                    <tr class="border-t hover:bg-gray-50">

                        <td class="px-4 py-3">
                            {{ $key + 1 }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $p->karyawan->nik }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $p->karyawan->nama_karyawan }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $p->karyawan->jabatan->nama_jabatan }}
                        </td>

                        <td class="px-4 py-3 font-semibold text-green-600">

                            Rp {{ number_format($p->gaji_bersih, 0, ',', '.') }}

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
            @if($penggajians->count() > 0)

            <tfoot class="bg-gray-100">

                <tr>

                    <td colspan="4"
                        class="px-4 py-3 font-bold text-right text-gray-800">

                        Total Pengeluaran Gaji

                    </td>

                    <td class="px-4 py-3 font-bold text-green-700">

                        Rp {{ number_format($total, 0, ',', '.') }}

                    </td>

                </tr>

            </tfoot>

            @endif

        </table>

    </div>

</div>

@endsection
