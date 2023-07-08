@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Pengguna</div>
                <div class="card-body">
                    <form action="{{ $create ? route("mobil.store") : route("mobil.update", $mobil) }}" method="post">
                        @csrf
                        @if (!$create)
                            @method("put")
                        @endif
                        <div class="form-group">
                            <label>Merek</label>
                            <input type="text" name="merek" value="{{ old("merek") ?? $mobil->merek ??  "" }}" class="form-control @error("merek") form-control is-invalid @enderror"">
                             @error("merek")
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Model</label>
                            <input type="text" name="model" value="{{ old("model") ?? $mobil->model ??  "" }}" class="form-control @error("model") form-control is-invalid @enderror"">
                             @error("model")
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nomor Plat</label>
                            <input type="text" name="plat" value="{{ old("plat") ?? $mobil->plat ??  "" }}" class="form-control @error("plat") form-control is-invalid @enderror"">
                             @error("plat")
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tarif</label>
                            <input type="number" name="tarif" value="{{ old("tarif") ?? $mobil->tarif ?? "" }}" class="form-control @error("tarif") form-control is-invalid @enderror">
                            @error("tarif")
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