@extends('layouts.app')
@section('content')
    <div class="p-4 bg-white border rounded-xl">

        <h3 class="mb-4 font-semibold text-gray-700 text-md">
            Data Karyawan Terbaru
        </h3>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border-collapse">

                <thead class="text-gray-600 bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">NIK</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Jabatan</th>
                        <th class="px-4 py-2">Tanggal Masuk</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse($karyawanTerbaru as $k)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $k->nik }}</td>
                            <td class="px-4 py-2">{{ $k->nama_karyawan }}</td>
                            <td class="px-4 py-2">{{ $k->jabatan->nama_jabatan }}</td>
                            <td class="px-4 py-2">{{ $k->tgl_masuk }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-2 text-center text-gray-500">
                                Tidak ada data
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
