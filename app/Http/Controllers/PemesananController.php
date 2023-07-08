<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Http\Requests\StorePemesananRequest;
use App\Http\Requests\UpdatePemesananRequest;
use App\Models\Mobil;
use App\Models\Pengguna;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanan = Pemesanan::with("pengguna", "mobil")->get();
        return view("pemesanan.index", compact("pemesanan"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $create = true;
        $pengguna = Pengguna::all();
        $mobil = Mobil::all();
        return view('pemesanan.create', compact("create", "pengguna", "mobil"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePemesananRequest $request)
    {
        Pemesanan::create($request->all());
        return redirect()->route("pemesanan.index")->with("success", "Berhasil Menyimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        $create = false;
        $pengguna = Pengguna::all();
        $mobil = Mobil::all();
        return view('pemesanan.create', compact("pemesanan", "create", "pengguna", "mobil"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemesananRequest $request, Pemesanan $pemesanan)
    {
        $pemesanan->update($request->all());
        return redirect()->route("pemesanan.index")->with("success", "Berhasil Menyimpan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }
}
