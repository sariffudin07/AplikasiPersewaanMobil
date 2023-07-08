<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Http\Requests\StorePenggunaRequest;
use App\Http\Requests\UpdatePenggunaRequest;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = Pengguna::paginate(10);
        return view("pengguna.index", compact("pengguna"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $create = true;
        return view('pengguna.create', compact("create"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePenggunaRequest $request)
    {
        Pengguna::create($request->all());
        return redirect()->route("pengguna.index")->with("success", "Berhasil Menyimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengguna $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengguna $pengguna)
    {
        $create = false;
        return view('pengguna.create', compact("pengguna", "create"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenggunaRequest $request, Pengguna $pengguna)
    {
        $pengguna->update($request->all());
        return redirect()->route("pengguna.index")->with("success", "Berhasil Menyimpan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();
        return redirect()->route("pengguna.index")->with("delete", "Berhasil Menghapus");
    }
}
