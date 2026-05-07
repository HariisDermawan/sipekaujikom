@extends('layouts.app')

@section('content')
    <div class="p-4 bg-white border rounded-xl">

        <h3 class="mb-4 font-bold text-gray-800">
            Tambah Karyawan
        </h3>
        @if ($errors->any())
            <div class="p-3 mb-4 text-red-100 bg-red-500 rounded">
                <ul class="pl-5 text-sm list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('karyawan.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 text-sm">NIK</label>
                <input type="number" name="nik" class="w-full px-3 py-2 border rounded-lg">
            </div>

            <div>
                <label class="block mb-1 text-sm">Nama</label>
                <input type="text" name="nama_karyawan" class="w-full px-3 py-2 border rounded-lg">
            </div>

            <div>
                <label class="block mb-1 text-sm">Jabatan</label>
                <select name="id_jabatan" class="w-full px-3 py-2 border rounded-lg">

                    @foreach ($jabatans as $j)
                        <option value="{{ $j->id_jabatan }}">
                            {{ $j->nama_jabatan }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div>
                <label class="block mb-1 text-sm">Tanggal Masuk</label>
                <input type="date" name="tgl_masuk" class="w-full px-3 py-2 border rounded-lg">
            </div>

            <button class="px-4 py-2 text-white bg-blue-600 rounded-lg">
                Simpan
            </button>
            <a href="{{ route('karyawan.index') }}" class="px-4 py-2 text-white bg-gray-600 rounded-lg">
                Batal
            </a>

        </form>

    </div>
@endsection
