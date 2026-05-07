<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Pinjaman;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
     public function index()
    {
        $pinjamans = Pinjaman::with('karyawan')->latest()->get();
        return view('admin.pinjaman.index', compact('pinjamans'));
    }

    public function create()
    {
        $karyawans = Karyawan::all();
        return view('admin.pinjaman.create', compact('karyawans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_karyawan' => 'required|exists:karyawans,id_karyawan',
            'jumlah_pinjaman' => 'required|numeric|min:1',
            'tenor' => 'required|numeric|min:1',
        ]);

        $cicilan = $request->jumlah_pinjaman / $request->tenor;

        Pinjaman::create([
            'id_karyawan' => $request->id_karyawan,
            'jumlah_pinjaman' => $request->jumlah_pinjaman,
            'tenor' => $request->tenor,
            'cicilan_per_bulan' => $cicilan,
            'status' => 'Aktif',
        ]);

        return redirect()->route('pinjaman.index')->with('success', 'Pinjaman berhasil dibuat');
    }

    public function lunas($id)
{
    $pinjaman = Pinjaman::findOrFail($id);

    $pinjaman->update([
        'status' => 'Lunas'
    ]);

    return redirect()
        ->route('pinjaman.index')
        ->with('success', 'Pinjaman berhasil dilunaskan');
}


}
