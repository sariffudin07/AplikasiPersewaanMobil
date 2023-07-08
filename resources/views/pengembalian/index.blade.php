@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">List Pemesanan</div>
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col">
                            <a href="{{ route('pemesanan.create') }}" class="btn btn-primary">Tambah</a>
                        </div>
                        <div class="col">
                            <div class="col">
                                <form class="form-inline" action="{{ route("pengembalian.index") }}" method="get">
                                    @csrf
                                    <div class="d-flex justify-content-end">
                                        <div class="form-group mb-2">
                                            <input type="text" name="cari" class="form-control" placeholder="Masukkan nomor plat">
                                          </div>
                                          <button type="submit" class="btn btn-primary mb-2">Cari</button>
                                    </div>
                                  </form>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">User</th>
                                <th scope="col">Mobil</th>
                                <th scope="col">Tanggal MUlai</th>
                                <th scope="col">Tanggal Selesai</th>
                                <th scope="col">Status</th>
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
                                <td>{{$item->status ? "Sudah dikembalikan" : "Belum dikembalikan"}}</td>
                                <td>
                                   <div class="d-flex gap-2">
                                       @if (!$item->status)
                                        <form action="{{ route("pengembalian.store") }}" method="post">
                                            <input type="hidden" name="pemesanan_id" value="{{ $item->id }}">
                                            <input type="hidden" name="kembali" value="{{ now() }}">
                                            <input type="hidden" name="tarif" value="{{ $item->getTarif() }}">
    
                                            @csrf
                                            <button type="submit" onclick="return confirm('Yakin ingin kembalikan ?');" class="btn btn-sm btn-danger">Kembalikan</button>
                                        </form>
                                        @endif
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
            <div class="card">
                <div class="card-header">List Pengembalian</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Pemesanan</th>
                                <th scope="col">Kembali</th>
                                <th scope="col">Tarif</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengembalian as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration}}</th>
                                <td>{{$item->pemesanan_id}}</td>
                                <td>{{$item->kembali}}</td>
                                <td>{{$item->tarif}}</td>
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