@extends('layouts.app')

@section('content')
    <div class="p-4 bg-white border rounded-xl">
        <div class="flex flex-col gap-3 mb-4 md:flex-row md:items-center md:justify-between">

            <h3 class="font-bold text-gray-900 text-md">
                Data Karyawan
            </h3>

            <div class="flex flex-col gap-2 md:flex-row md:items-center">

                <form method="GET" action="{{ route('karyawan.index') }}">
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama / NIK..."
                            class="w-full px-3 py-2 text-sm border rounded-lg md:w-64 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <i class="absolute text-gray-400 fa-solid fa-search right-3 top-3"></i>
                    </div>
                </form>

                <a href="{{ route('karyawan.create') }}"
                    class="flex items-center justify-center gap-2 px-4 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                    <i class="fa-solid fa-plus"></i>
                    Tambah Data
                </a>

            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border-collapse">

                <thead class="text-gray-600 bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">NIK</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Jabatan</th>
                        <th class="px-4 py-2">Tanggal Masuk</th>
                        <th class="px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-gray-700">

                    @forelse($karyawans as $e)
                        <tr class="border-t">

                            <td class="px-4 py-2">{{ $e->nik }}</td>
                            <td class="px-4 py-2">{{ $e->nama_karyawan }}</td>
                            <td class="px-4 py-2">{{ $e->jabatan->nama_jabatan }}</td>
                            <td class="px-4 py-2">{{ $e->tgl_masuk }}</td>
                            <td class="px-4 py-2">

                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('karyawan.show', $e->id_karyawan) }}"
                                        class="px-2 py-1 text-xs text-white bg-green-500 rounded hover:bg-green-600">
                                        View
                                    </a>
                                    <a href="{{ route('karyawan.edit', $e->id_karyawan) }}"
                                        class="px-2 py-1 text-xs text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                        Edit
                                    </a>
                                    <form action="{{ route('karyawan.destroy', $e->id_karyawan) }}" method="POST"
                                        onsubmit="return confirm('Yakin hapus data ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="px-2 py-1 text-xs text-white bg-red-500 rounded hover:bg-red-600">
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-2 text-center text-gray-500">
                                Tidak ada data
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>
        </div>

    </div>
@endsection
