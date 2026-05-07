@extends('layouts.app')

@section('content')
<div class="p-6 bg-white border rounded-xl">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-lg font-bold text-gray-800">
            Detail Karyawan
        </h3>

        <a href="{{ route('karyawan.index') }}"
           class="px-4 py-2 text-sm text-white bg-gray-600 rounded-lg hover:bg-gray-700">
            Kembali
        </a>
    </div>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

        <div class="p-4 border rounded-lg">
            <p class="text-sm text-gray-500">NIK</p>
            <p class="font-semibold text-gray-800">{{ $karyawan->nik }}</p>
        </div>

        <div class="p-4 border rounded-lg">
            <p class="text-sm text-gray-500">Nama Karyawan</p>
            <p class="font-semibold text-gray-800">{{ $karyawan->nama_karyawan }}</p>
        </div>

        <div class="p-4 border rounded-lg">
            <p class="text-sm text-gray-500">Jabatan</p>
            <p class="font-semibold text-gray-800">
                {{ $karyawan->jabatan->nama_jabatan ?? '-' }}
            </p>
        </div>

        <div class="p-4 border rounded-lg">
            <p class="text-sm text-gray-500">Tanggal Masuk</p>
            <p class="font-semibold text-gray-800">
                {{ $karyawan->tgl_masuk }}
            </p>
        </div>

    </div>

</div>
@endsection
