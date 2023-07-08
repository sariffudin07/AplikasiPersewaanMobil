@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Pengguna</div>
                <div class="card-body">
                    <form action="{{ $create ? route("pengguna.store") : route("pengguna.update", $pengguna) }}" method="post">
                        @csrf
                        @if (!$create)
                            @method("put")
                        @endif
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" value="{{ old("nama") ?? $pengguna->nama ??  "" }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" value="{{ old("alamat") ?? $pengguna->alamat ??  "" }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input type="text" name="nomor" value="{{ old("nomor") ?? $pengguna->nomor ??  "" }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nomor SIM</label>
                            <input type="text" name="sim" value="{{ old("sim") ?? $pengguna->sim ?? "" }}" class="form-control @error("sim") form-control is-invalid @enderror">
                            @error("sim")
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm px-5 my-3">{{ $create ? "Tambah" : "Ubah" }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection