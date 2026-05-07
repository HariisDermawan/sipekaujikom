@extends('layouts.app')

@section('content')
<div class="p-6 bg-white border rounded-xl">

    <div class="flex items-center justify-between mb-6">
        <h3 class="text-lg font-bold text-gray-800">Tambah Jabatan</h3>

        <a href="{{ route('jabatan.index') }}"
           class="px-4 py-2 text-sm text-white bg-gray-600 rounded-lg hover:bg-gray-700">
            Kembali
        </a>
    </div>

    <form action="{{ route('jabatan.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block mb-1 text-sm text-gray-700">Nama Jabatan</label>
            <input type="text" name="nama_jabatan"
                class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                placeholder="Contoh: Manager">
        </div>

        <div>
            <label class="block mb-1 text-sm text-gray-700">Gaji Pokok</label>
            <input type="number" name="gapok"
                class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                placeholder="8000000">
        </div>

        <div>
            <label class="block mb-1 text-sm text-gray-700">Tunjangan Makan</label>
            <input type="number" name="tunjangan_makan"
                class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                placeholder="1000000">
        </div>

        <div class="flex justify-end">
            <button class="px-6 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                Simpan
            </button>
        </div>

    </form>

</div>
@endsection
