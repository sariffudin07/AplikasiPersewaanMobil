@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Pemesanan</div>
                <div class="card-body">
                    <form action="{{ $create ? route("pemesanan.store") : route("pemesanan.update", $pemesanan) }}" method="post">
                        @csrf
                        @if (!$create)
                            @method("put")
                        @endif
                        <div class="form-group">
                            <label>Pilih Pengguna</label>
                            <select class="select2 form-control" name="pengguna_id">
                                <option value="null">Pilih Pengguna</option>
                                @forelse ($pengguna as $item)
                                    <option {{ isset($pemesanan) ? ($pemesanan->pengguna_id == $item->id ? "selected" : "") : ""}} value="{{ $item->id }}">{{ $item->nama }}</option>
                                @empty
                                    <option value="null">Tidak ada pengguna</option>
                                @endforelse
                              </select>
                             @error("pengguna_id")
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pilih Mobil</label>
                            <select class="select2 form-control" name="mobil_id">
                                <option value="null">Pilih Mobil</option>
                                @forelse ($mobil as $item)
                                    <option {{isset($pemesanan) ? ($pemesanan->mobil_id == $item->id ? "selected" : "") : ""}} value="{{ $item->id }}">{{ $item->getFull() }}</option>
                                @empty
                                    <option value="null">Tidak ada mobil</option>
                                @endforelse
                              </select>
                             @error("mobi_id")
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <input type="date" name="mulai" value="{{ old("mulai") ?? $pemesanan->mulai ??  "" }}" class="form-control @error("mulai") form-control is-invalid @enderror">
                             @error("mulai")
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal Selesai</label>
                            <input type="date" name="selesai" value="{{ old("selesai") ?? $pemesanan->selesai ??  "" }}" class="form-control @error("selesai") form-control is-invalid @enderror">
                             @error("selesai")
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
<script>
    
    
</script>
@endsection