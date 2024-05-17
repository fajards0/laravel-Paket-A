<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $siswa = Siswa::latest()->get();
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required',
            'nama_siswa' => 'required',
            'kelas' => 'required',
            'foto' => 'required|max:4000|mimes:png,jpg',
            'jk' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
        ]);

        $siswa = new Siswa();
        $siswa->nis = $request->nis;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->kelas = $request->kelas;
        $siswa->jk = $request->jk;
        $siswa->agama = $request->agama;
        $siswa->alamat = $request->alamat;

        if ($request->hasFile('foto')) {
            $img = $request->file('foto');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/siswa/', $name);
            $siswa->foto = $name;
        }

        // lampirkan banyak genre di buku
        $siswa->save();
        return redirect()->route('siswa.index')
            ->with('success', 'data berhasil ditambahkan');
    }

    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nis' => 'required',
            'nama_siswa' => 'required',
            'kelas' => 'required',
            // 'foto' => 'required|max:4000|mimes:png,jpg',
            'jk' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->nis = $request->nis;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->kelas = $request->kelas;
        $siswa->jk = $request->jk;
        $siswa->agama = $request->agama;
        $siswa->alamat = $request->alamat;

        if ($request->hasFile('foto')) {
            $siswa->deleteImage();
            $img = $request->file('foto');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/siswa/', $name);
            $siswa->foto = $name;
        }
        $siswa->save();
        return redirect()->route('siswa.index')
            ->with('success', 'data berhasil diubah');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'data berhasil dihapus');
    }
}
