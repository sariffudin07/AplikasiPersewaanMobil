@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">List Pengguna</div>
                <div class="card-body">
                    <a href="{{ route('pengguna.create') }}" class="btn btn-primary">Tambah</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Nomor Telepon</th>
                                <th scope="col">Nomor SIM</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengguna as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration}}</th>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->alamat}}</td>
                                <td>{{$item->nomor}}</td>
                                <td>{{$item->sim}}</td>
                                <td>
                                   <div class="d-flex gap-2">
                                    <a href="{{ route("pengguna.edit", $item) }}" class="btn btn-sm btn-success">Edit</a>
                                    <form action="{{ route("pengguna.destroy", $item) }}" method="post">
                                        @csrf
                                        @method("delete")
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus ?');" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                   </div>
                                </td>
                            </tr>
                            
                            @empty
                                <p class="py-3 h3 font-weight-bold text-center">Belum Ada Pengguna</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection