<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Penggajian;
use App\Models\Pinjaman;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalkaryawan = Karyawan::count();
        $totalPinjaman = Pinjaman::where('status', 'Aktif')->count();
        $totalGaji     = Penggajian::sum('gaji_bersih');
        $karyawanTerbaru = Karyawan::with('jabatan')->latest('id_karyawan')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('totalkaryawan', 'totalPinjaman', 'totalGaji', 'karyawanTerbaru'));
    }
}
