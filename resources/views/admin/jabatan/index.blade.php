@extends('layouts.app')

@section('content')
    <div class="p-4 bg-white border rounded-xl">
        <div class="flex items-center justify-between mb-4">

            <h3 class="font-bold text-gray-800">
                Data Jabatan
            </h3>

            <a href="{{ route('jabatan.create') }}"
                class="px-4 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                + Tambah
            </a>

        </div>
        <form method="GET" class="mb-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari jabatan..."
                class="w-full px-3 py-2 border rounded-lg md:w-64">
        </form>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">

                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">Nama Jabatan</th>
                        <th class="px-4 py-2">Gaji Pokok</th>
                        <th class="px-4 py-2">Tunjangan</th>
                        <th class="px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($jabatans as $j)
                        <tr class="border-t">

                            <td class="px-4 py-2">{{ $j->nama_jabatan }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($j->gapok) }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($j->tunjangan_makan) }}</td>

                            <td class="px-4 py-2">
                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('jabatan.edit', $j->id_jabatan) }}"
                                        class="px-2 py-1 text-xs text-white bg-yellow-500 rounded">
                                        Edit
                                    </a>

                                    <form action="{{ route('jabatan.destroy', $j->id_jabatan) }}" method="POST"
                                        onsubmit="return confirm('Hapus jabatan ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button class="px-2 py-1 text-xs text-white bg-red-500 rounded">
                                            Delete
                                        </button>

                                    </form>

                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
@endsection
