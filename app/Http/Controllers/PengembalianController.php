<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Http\Requests\StorePengembalianRequest;
use App\Http\Requests\UpdatePengembalianRequest;
use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Builder;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengembalian = Pengembalian::all();
        $pemesanan = Pemesanan::with("pengguna", "mobil")->get();
        if(request()->filled("cari")){
            $cari = request()->cari;
            // $pemesanan = Pemesanan::with("mobil")->whereHas("plat", "%$cari%")
            // ->get();
            $pemesanan = Pemesanan::whereRelation('mobil', 'plat', "like", "%$cari%")->get();
            // dd($posts);
        }
        return view("pengembalian.index", compact("pemesanan", "pengembalian"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengembalianRequest $request)
    {
        

        Pengembalian::create($request->all());
        $pemesanan = Pemesanan::find($request->pemesanan_id);
        $pemesanan->status = 1;
        $pemesanan->update();
        // dd($pemesanan);
        return redirect()->route("pengembalian.index")->with("success", "Berhasil Menyimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengembalianRequest $request, Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengembalian $pengembalian)
    {
        //
    }
}
