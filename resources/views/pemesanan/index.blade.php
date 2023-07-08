@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">List Pemesanan</div>
                <div class="card-body">
                    <a href="{{ route('pemesanan.create') }}" class="btn btn-primary">Tambah</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">User</th>
                                <th scope="col">Mobil</th>
                                <th scope="col">Tanggal MUlai</th>
                                <th scope="col">Tanggal Selesai</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pemesanan as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration}}</th>
                                <td>{{$item->pengguna->nama}}</td>
                                <td>{{$item->mobil->getFull()}}</td>
                                <td>{{$item->mulai}}</td>
                                <td>{{$item->selesai}}</td>
                                <td>
                                   <div class="d-flex gap-2">
                                    <a href="{{ route("pemesanan.edit", $item) }}" class="btn btn-sm btn-success">Edit</a>
                                    <form action="{{ route("pemesanan.destroy", $item) }}" method="post">
                                        @csrf
                                        @method("delete")
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus ?');" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                   </div>
                                </td>
                            </tr>
                            
                            @empty
                                <p class="py-3 h3 font-weight-bold text-center">Belum Ada Pemesanan</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection