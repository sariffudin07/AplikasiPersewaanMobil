<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Http\Requests\StoreMobilRequest;
use App\Http\Requests\UpdateMobilRequest;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mobil = Mobil::paginate(10);
        if(request()->filled("cari")){
            $cari = request()->cari;
            $mobil = Mobil::where("merek", "like", "%$cari%")
            ->orWhere("model", "like", "%$cari%")
            ->get();
            // dd($mobil);
        }
        return view("mobil.index", compact("mobil"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $create = true;
        return view('mobil.create', compact("create"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMobilRequest $request)
    {
        Mobil::create($request->all());
        return redirect()->route("mobil.index")->with("success", "Berhasil Menyimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Mobil $mobil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mobil $mobil)
    {
        $create = false;
        return view('mobil.create', compact("mobil", "create"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMobilRequest $request, Mobil $mobil)
    {
        $mobil->update($request->all());
        return redirect()->route("mobil.index")->with("success", "Berhasil Menyimpan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mobil $mobil)
    {
        $mobil->delete();
        return redirect()->route("mobil.index")->with("delete", "Berhasil Menghapus");
    }
}
