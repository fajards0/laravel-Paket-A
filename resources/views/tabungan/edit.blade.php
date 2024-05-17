@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Edit Tabungan
                        <a href="{{ route('tabungan.index') }}" class="btn btn-sm btn-primary" style="float: right">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tabungan.update', $tabungan->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col">
                                    <div class="mb-2">
                                        <label for="id_siswa">Siswa</label>
                                        <select name="id_siswa" class="form-control @error('id_siswa') is-invalid @enderror">
                                            <option value="">Pilih Siswa</option>
                                            @foreach ($siswa as $data)
                                                <option value="{{ $data->id }}"
                                                    {{ $data->id == $tabungan->id_siswa ? 'selected' : '' }}>
                                                    {{ $data->nama_siswa }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_siswa')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="jumlah">Jumlah</label>
                                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                            name="jumlah" value="{{ old('jumlah', $tabungan->jumlah) }}">
                                        @error('jumlah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                    <div class="mb-2">
                                        <label for="tgl">Tanggal</label>
                                        <input type="date"
                                            class="form-control @error('tgl') is-invalid @enderror"
                                            name="tgl" value="{{ old('tgl', $tabungan->tgl) }}">
                                        @error('tgl')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
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
