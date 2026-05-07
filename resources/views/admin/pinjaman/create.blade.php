@extends('layouts.app')

@section('content')
<div class="p-6 bg-white border rounded-xl">

    <div class="flex items-center justify-between mb-4">
        <h3 class="font-bold text-gray-800">Pengajuan Pinjaman</h3>

        <a href="{{ route('pinjaman.index') }}"
           class="px-4 py-2 text-sm text-white bg-gray-600 rounded-lg">
            Kembali
        </a>
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
    <form action="{{ route('pinjaman.store') }}" method="POST" class="space-y-4">

        @csrf

        <!-- KARYAWAN -->
        <div>
            <label class="text-sm text-gray-700">Pilih Karyawan</label>
            <select name="id_karyawan"
                class="w-full px-3 py-2 border rounded-lg">
                @foreach($karyawans as $k)
                    <option value="{{ $k->id_karyawan }}">
                        {{ $k->nama_karyawan }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- JUMLAH -->
        <div>
            <label class="text-sm text-gray-700">Jumlah Pinjaman</label>
            <input type="number" name="jumlah_pinjaman"
                class="w-full px-3 py-2 border rounded-lg"
                placeholder="3000000">
        </div>

        <!-- TENOR -->
        <div>
            <label class="text-sm text-gray-700">Tenor (bulan)</label>
            <input type="number" name="tenor"
                class="w-full px-3 py-2 border rounded-lg"
                placeholder="6">
        </div>

        <button class="px-6 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
            Simpan
        </button>

    </form>

</div>
@endsection
