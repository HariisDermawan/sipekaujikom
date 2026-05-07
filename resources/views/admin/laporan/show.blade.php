@extends('layouts.app')

@section('content')

<div class="max-w-4xl p-6 mx-auto bg-white border rounded-xl print-area">
    <div class="pb-4 mb-6 border-b">

        <h1 class="text-2xl font-bold text-gray-800">
            PT SIPEKA INDONESIA
        </h1>

        <p class="text-sm text-gray-500">
            Sistem Informasi Penggajian Karyawan
        </p>

    </div>
    <div class="flex justify-end mb-6 no-print">

        <button onclick="window.print()"
            class="px-4 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700">

            <i class="mr-1 fa-solid fa-print"></i>
            Cetak Slip

        </button>

    </div>
    <div class="grid grid-cols-2 gap-6 mb-6 text-sm">

        <div>
            <p class="mb-1 text-gray-500">
                NIK
            </p>

            <h4 class="font-semibold text-gray-800">
                {{ $penggajian->karyawan->nik }}
            </h4>
        </div>

        <div>
            <p class="mb-1 text-gray-500">
                Nama
            </p>

            <h4 class="font-semibold text-gray-800">
                {{ $penggajian->karyawan->nama_karyawan }}
            </h4>
        </div>

        <div>
            <p class="mb-1 text-gray-500">
                Jabatan
            </p>

            <h4 class="font-semibold text-gray-800">
                {{ $penggajian->karyawan->jabatan->nama_jabatan }}
            </h4>
        </div>

        <div>
            <p class="mb-1 text-gray-500">
                Periode
            </p>

            <h4 class="font-semibold text-gray-800">
                {{ $penggajian->bulan_tahun }}
            </h4>
        </div>

    </div>
    <div class="overflow-hidden border rounded-lg">

        <table class="w-full text-sm border-collapse">

            <tbody>

                <tr class="border-b">

                    <td class="px-4 py-3 font-medium bg-gray-50">
                        Gaji Pokok
                    </td>

                    <td class="px-4 py-3 text-right text-gray-800">

                        Rp {{ number_format($penggajian->karyawan->jabatan->gapok, 0, ',', '.') }}

                    </td>

                </tr>

                <tr class="border-b">

                    <td class="px-4 py-3 font-medium bg-gray-50">
                        Tunjangan
                    </td>

                    <td class="px-4 py-3 text-right text-gray-800">

                        Rp {{ number_format($penggajian->karyawan->jabatan->tunjangan_makan, 0, ',', '.') }}

                    </td>

                </tr>

                <tr class="border-b">

                    <td class="px-4 py-3 font-medium bg-gray-50">
                        Potongan Pinjaman
                    </td>

                    <td class="px-4 py-3 text-right">

                        <span class="inline-flex items-center px-2 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full">

                            Rp {{ number_format($penggajian->potongan_pinjaman, 0, ',', '.') }}

                        </span>

                    </td>

                </tr>

                <tr>

                    <td class="px-4 py-4 text-base font-bold bg-gray-100">
                        Gaji Bersih
                    </td>

                    <td class="px-4 py-4 text-2xl font-bold text-right text-green-600">

                        Rp {{ number_format($penggajian->gaji_bersih, 0, ',', '.') }}

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection
