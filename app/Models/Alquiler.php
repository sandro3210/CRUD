<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    use HasFactory;

    protected $fillable = ['monto', 'fecha_inicio', 'fecha_fin'];

    public function inquilinos()
    {
        return $this->belongsToMany(Inquilino::class);
    }

    public function rentas()
    {
        return $this->hasMany(Renta::class);
    }
}
