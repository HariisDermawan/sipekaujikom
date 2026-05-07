@extends('layouts.app')

@section('content')
<div class="p-6 bg-white border rounded-xl">

    <div class="flex items-center justify-between mb-6">
        <h3 class="text-lg font-bold text-gray-800">Edit Jabatan</h3>

        <a href="{{ route('jabatan.index') }}"
           class="px-4 py-2 text-sm text-white bg-gray-600 rounded-lg hover:bg-gray-700">
            Kembali
        </a>
    </div>

    <form action="{{ route('jabatan.update', $jabatan->id_jabatan) }}" method="POST" class="space-y-4">

        @csrf
        @method('PUT')

        <!-- NAMA -->
        <div>
            <label class="block mb-1 text-sm text-gray-700">Nama Jabatan</label>
            <input type="text" name="nama_jabatan"
                value="{{ old('nama_jabatan', $jabatan->nama_jabatan) }}"
                class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- GAPOK -->
        <div>
            <label class="block mb-1 text-sm text-gray-700">Gaji Pokok</label>
            <input type="number" name="gapok"
                value="{{ old('gapok', $jabatan->gapok) }}"
                class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- TUNJANGAN -->
        <div>
            <label class="block mb-1 text-sm text-gray-700">Tunjangan Makan</label>
            <input type="number" name="tunjangan_makan"
                value="{{ old('tunjangan_makan', $jabatan->tunjangan_makan) }}"
                class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- BUTTON -->
        <div class="flex justify-end">
            <button class="px-6 py-2 text-white bg-yellow-500 rounded-lg hover:bg-yellow-600">
                Update
            </button>
        </div>

    </form>

</div>
@endsection
