@extends('layouts.app')

@section('content')
<div class="p-6 bg-white border rounded-xl">

    <div class="flex items-center justify-between mb-4">
        <h3 class="font-bold text-gray-800">Input Gaji</h3>

        <a href="{{ route('penggajian.index') }}"
           class="px-4 py-2 text-sm text-white bg-gray-600 rounded-lg">
            Kembali
        </a>
    </div>

    <form action="{{ route('penggajian.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="text-sm text-gray-700">Pilih Karyawan</label>
            <select name="id_karyawan"
                class="w-full px-3 py-2 border rounded-lg">
                @foreach($karyawans as $k)
                    <option value="{{ $k->id_karyawan }}">
                        {{ $k->nama_karyawan }} - {{ $k->jabatan->nama_jabatan }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="text-sm text-gray-700">Bulan & Tahun</label>
            <input type="date" name="bulan_tahun"
                placeholder="Contoh: Mei 2026"
                class="w-full px-3 py-2 border rounded-lg">
        </div>

        <button class="px-6 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
            Hitung & Simpan
        </button>
    </form>

</div>
@endsection
