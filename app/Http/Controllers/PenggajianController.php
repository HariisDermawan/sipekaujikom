<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Penggajian;
use App\Models\Pinjaman;
use Illuminate\Http\Request;

class PenggajianController extends Controller
{
    public function index()
    {
        $penggajians = Penggajian::with('karyawan.jabatan')
            ->latest()
            ->get();
        foreach ($penggajians as $p) {
            $gapok = $p->karyawan->jabatan->gapok ?? 0;
            $tunjangan = $p->karyawan->jabatan->tunjangan_makan ?? 0;

            $potongan = Pinjaman::where('id_karyawan', $p->id_karyawan)
                ->where('status', 'Aktif')
                ->sum('cicilan_per_bulan');
            $p->potongan_fix = $potongan;
            $p->gaji_bersih_fix = ($gapok + $tunjangan) - $potongan;
        }

        return view('admin.penggajian.index', compact('penggajians'));
    }

    public function create()
    {
        $karyawans = Karyawan::with('jabatan')->get();

        return view('admin.penggajian.create', compact('karyawans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_karyawan' => 'required',
            'bulan_tahun' => 'required',
        ]);

        $karyawan = Karyawan::with('jabatan')
            ->findOrFail($request->id_karyawan);

        $gapok = $karyawan->jabatan->gapok ?? 0;

        $tunjangan = $karyawan->jabatan->tunjangan_makan ?? 0;

        $potongan = Pinjaman::where('id_karyawan', $karyawan->id_karyawan)
            ->where('status', 'Aktif')
            ->sum('cicilan_per_bulan');

        $gaji_bersih = ($gapok + $tunjangan) - $potongan;

        Penggajian::create([
            'id_karyawan' => $karyawan->id_karyawan,
            'bulan_tahun' => $request->bulan_tahun,
            'potongan_pinjaman' => $potongan,
            'gaji_bersih' => $gaji_bersih,
        ]);

        return redirect()
            ->route('penggajian.index')
            ->with('success', 'Gaji berhasil dihitung');
    }


    public function slip()
    {
        $penggajians = Penggajian::with('karyawan.jabatan')
            ->latest()
            ->get();

        return view('admin.laporan.index', compact('penggajians'));
    }

    public function showSlip($id)
    {
        $penggajian = Penggajian::with('karyawan.jabatan')
            ->findOrFail($id);

        return view('admin.laporan.show', compact('penggajian'));
    }

    public function laporan(Request $request)
    {
        $penggajians = Penggajian::with('karyawan.jabatan')

            ->when($request->bulan, function ($query) use ($request) {
                $query->whereMonth('created_at', $request->bulan);
            })

            ->when($request->tahun, function ($query) use ($request) {
                $query->whereYear('created_at', $request->tahun);
            })

            ->latest()
            ->get();

        return view('admin.laporan.rekap-bulanan', compact('penggajians'));
    }
}
