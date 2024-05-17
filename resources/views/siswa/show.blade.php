@extends('layout.layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Data Siswa
                        <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-primary" style="float: right">Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <label for="">NIS:</label>
                            <b>{{ $siswa->nis }}</b>
                        </div>
                        <div class="mb-2">
                            <label for="">Nama Siswa:</label>
                            <b>{{ $siswa->nama_siswa }}</b>
                        </div>
                        <div class="mb-2">
                            <img src="{{ asset('images/siswa/' . $siswa->foto) }}" alt="" style="width: 200px;">
                        </div>
                        <div class="mb-2">
                            <label for="">Kelas:</label>
                            <b>{{ $siswa->kelas }}</b>
                        </div>
                        <div class="mb-2">
                            <label for="">Jenis Kelamin:</label>
                            <b>{{ $siswa->jk }}</b>
                        </div>
                        <div class="mb-2">
                            <label for="">Agama:</label>
                            <b>{{ $siswa->agama }}</b>
                        </div>
                        <div class="mb-2">
                            <label for="">Alamat:</label>
                            <b>{{ $siswa->alamat }}</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
