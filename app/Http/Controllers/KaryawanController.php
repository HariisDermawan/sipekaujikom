<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        $query = Karyawan::with('jabatan');
        if ($request->search) {
            $query->where('nama_karyawan', 'like', '%' . $request->search . '%')
                ->orWhere('nik', 'like', '%' . $request->search . '%');
        }
        $karyawans = $query->get();
        return view('admin.karyawan.index', compact('karyawans'));
    }


    public function create()
    {
        $jabatans = Jabatan::all();
        return view('admin.karyawan.create', compact('jabatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik'  => 'required|unique:karyawans,nik',
            'nama_karyawan' => 'required|string|max:255',
            'id_jabatan'   => 'required',
            'tgl_masuk'    => 'required|date',
        ]);

        Karyawan::create([
            'nik'  => $request->nik,
            'nama_karyawan' => $request->nama_karyawan,
            'id_jabatan'    => $request->id_jabatan,
            'tgl_masuk'     => $request->tgl_masuk,
        ]);
        return redirect()->route('karyawan.index')->with('success', 'Karyawan created successfully!');
    }

    public function show($id)
    {
        $karyawan = Karyawan::with('jabatan')->findOrFail($id);
        return view('admin.karyawan.show', compact('karyawan'));
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $jabatans  = Jabatan::all();

        return view('admin.karyawan.edit', compact('karyawan', 'jabatans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik'  => 'required|unique:karyawans,nik',
            'nama_karyawan' => 'required|string|max:255',
            'id_jabatan'   => 'required',
            'tgl_masuk'    => 'required|date',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update([
            'nik'  => $request->nik,
            'nama_karyawan' => $request->nama_karyawan,
            'id_jabatan'    => $request->id_jabatan,
            'tgl_masuk'     => $request->tgl_masuk,
        ]);

        return redirect()->route('karyawan.index')->with('success', 'karyawan updated successfully!');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->pinjaman()->delete();
        $karyawan->penggajian()->delete();
        $karyawan->delete();

        return redirect()->route('karyawan.index')
            ->with('success', 'Karyawan berhasil dihapus');
    }
}
