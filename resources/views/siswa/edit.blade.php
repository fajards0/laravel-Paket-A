@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Edit Siswa
                        <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-primary" style="float: right">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('siswa.update', $siswa->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col">
                                    <div class="mb-2">
                                        <label for="nis">NIS</label>
                                        <input type="text" class="form-control @error('nis') is-invalid @enderror"
                                            name="nis" value="{{ old('nis', $siswa->nis) }}">
                                        @error('nis')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="nama_siswa">Nama Siswa</label>
                                        <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror"
                                            name="nama_siswa" value="{{ old('nama_siswa', $siswa->nama_siswa) }}">
                                        @error('nama_siswa')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-2">
                                        <label for="kelas">Kelas</label>
                                        <input type="number" class="form-control @error('kelas') is-invalid @enderror"
                                            name="kelas" value="{{ old('kelas', $siswa->kelas) }}">
                                        @error('kelas')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">

                                <label for="foto">Foto</label>
                                @if ($siswa->foto)
                                    <p><img src="{{ asset('images/siswa/' . $siswa->foto) }}" alt="foto" width="100px">
                                    </p>
                                @endif
                                <input type="file" name="foto"
                                    class="form-control @error('foto') is-invalid @enderror">
                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-2">
                                        <label for="jk">Jenis Kelamin</label>
                                        <select type="text" class="form-control @error('jk') is-invalid @enderror"
                                            name="jk" value="{{ old('jk', $siswa->jk) }}">
                                            <option value="Pilih Jenis Kelamin">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        @error('jk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-2">
                                        <label for="agama">Agama</label>
                                        <input type="text" class="form-control @error('agama') is-invalid @enderror"
                                            name="agama" value="{{ old('agama', $siswa->agama) }}">
                                        @error('agama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                    name="alamat" value="{{ old('alamat', $siswa->alamat) }}">
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <button class="btn btn-sm btn-success" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
