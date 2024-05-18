<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use App\Models\Tabungan;

class FrontController extends Controller
{
    // menampilkan semua data buku
    public function tabungan()
    {
        $siswa = Siswa::latest()->get();
        $tabungan = Tabungan::all();
        return view('welcome', compact('siswa', 'tabungan'));
    }

    public function detailTabungan($id)
    {
        $detail_tabungan = Tabungan::findOrFail($id);
        return view('detail_tabungan', compact('detail_tabungan'));
    }
}
