<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $fillable = ["pengguna_id", "mobil_id", "mulai", "selesai", "status"];

    public function pengguna()
    {
        return $this->hasOne(Pengguna::class, 'id', 'pengguna_id');
    }
    public function mobil()
    {
        return $this->hasOne(Mobil::class, 'id', 'mobil_id');
    }

    public function getTarif()
    {
        $mulai = Carbon::parse($this->mulai);
        $selesai = Carbon::parse($this->selesai);

        $lama = $selesai->diffInDays($mulai, true);
        
        return ($lama + 1) * $this->mobil->tarif;
    }
}
