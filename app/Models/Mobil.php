<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    protected $fillable = ["merek", "model", "plat", "tarif"];

    public function getFull(){
        return "Merek => $this->merek - Model => $this->model - Plat => $this->plat - Tarif => $this->tarif";
    }
}
