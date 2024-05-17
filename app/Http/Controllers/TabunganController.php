<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use App\Models\Siswa;
use Illuminate\Http\Request;

class TabunganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tabungan = Tabungan::latest()->get();
        return view('tabungan.index', compact('tabungan'));
    }

    public function create()
    {
        $siswa = siswa::all();
        return view('tabungan.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_siswa' => 'required',
            'jumlah' => 'required|numeric',
            'tgl' => 'required',
        ]);

        $tabungan = new Tabungan();
        $tabungan->id_siswa = $request->id_siswa;
        $tabungan->jumlah = $request->jumlah;
        $tabungan->tgl = $request->tgl;

        $tabungan->save();
        return redirect()->route('tabungan.index')
            ->with('success', 'data berhasil ditambahkan');
    }

    public function show($id)
    {
        $tabungan = Tabungan::findOrFail($id);
        return view('tabungan.show', compact('tabungan'));
    }

    public function edit($id)
    {
        $tabungan = Tabungan::findOrFail($id);
        $siswa = Siswa::all();
        return view('tabungan.edit', compact('tabungan', 'siswa'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_siswa' => 'required',
            'jumlah' => 'required|numeric',
            'tgl' => 'required',
        ]);

        $tabungan = Tabungan::findOrFail($id);
        $tabungan->id_siswa = $request->id_siswa;
        $tabungan->jumlah = $request->jumlah;
        $tabungan->tgl = $request->tgl;

        $tabungan->save();
        return redirect()->route('tabungan.index')
            ->with('success', 'data berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $tabungan = Tabungan::findOrFail($id);
        $tabungan->delete();

        return redirect()->route('tabungan.index')
            ->with('success', 'data berhasil dihapus');
    }
}
