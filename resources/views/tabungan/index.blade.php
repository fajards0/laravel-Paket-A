@extends('layout.layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (session('success'))
                    <div class="alert alert-success fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card border-secondary">
                    <div class="card-header">Data Tabungan
                        <a href="{{ route('tabungan.create') }}" class="btn btn-sm btn-primary" style="float: right">Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id</th>
                                        <th>Nama Siswa</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                @php $no = 1; @endphp
                                <tbody>
                                    @foreach ($tabungan as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->id_siswa }}</td>
                                            <td>{{ $item->siswa->nama_siswa }}</td>
                                            <td align="center"><img src="{{ asset('/images/siswa/' . $item->siswa->foto) }}"
                                                style="width: 100px;" alt="">
                                        </td>
                                            <td>
                                                <form action="{{ route('tabungan.destroy', $item->id) }}" id="delete-data"
                                                    method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a href="{{ route('tabungan.edit', $item->id) }}"
                                                        class="btn btn-sm btn-success">
                                                        Edit
                                                    </a>
                                                    <a href="{{ route('tabungan.show', $item->id) }}"
                                                        class="btn btn-sm btn-warning">
                                                        Show
                                                    </a>

                                                    <button class="btn btn-sm btn-danger" type="submit"
                                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                        Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
