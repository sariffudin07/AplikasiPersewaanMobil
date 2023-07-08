@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">List Mobil</div>
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col">
                            <a href="{{ route('mobil.create') }}" class="btn btn-primary">Tambah</a>
                        </div>
                        <div class="col">
                            <form class="form-inline" action="{{ route("mobil.index") }}" method="get">
                                @csrf
                                <div class="d-flex justify-content-end">
                                    <div class="form-group mb-2">
                                        <input type="text" name="cari" class="form-control">
                                      </div>
                                      <button type="submit" class="btn btn-primary mb-2">Cari</button>
                                </div>
                              </form>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Merek</th>
                                <th scope="col">Model</th>
                                <th scope="col">Nomor Plat</th>
                                <th scope="col">Tarif</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mobil as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration}}</th>
                                <td>{{$item->merek}}</td>
                                <td>{{$item->model}}</td>
                                <td>{{$item->plat}}</td>
                                <td>{{$item->tarif}}</td>
                                <td>
                                   <div class="d-flex gap-2">
                                    <a href="{{ route("mobil.edit", $item) }}" class="btn btn-sm btn-success">Edit</a>
                                    <form action="{{ route("mobil.destroy", $item) }}" method="post">
                                        @csrf
                                        @method("delete")
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus ?');" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                   </div>
                                </td>
                            </tr>
                            
                            @empty
                                <p class="py-3 h3 font-weight-bold text-center">Belum Ada Mobil</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection