@extends('layout.layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Data Tabungan
                        <a href="{{ route('tabungan.index') }}" class="btn btn-sm btn-primary" style="float: right">Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <label for="">Nama Siswa:</label>
                            <p>{{ $tabungan->siswa->nama_siswa }}</p>
                        </div>
                        <div class="mb-2">
                            <label for="">Jumlah:</label>
                            <b>{{ $tabungan->jumlah }}</b>
                        </div>
                        <div class="mb-2">
                            <label for="">Tanggal :</label>
                            <b>{{ $tabungan->tgl }}</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
