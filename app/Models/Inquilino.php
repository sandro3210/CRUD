<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquilino extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'correo_electronico'];

    public function alquileres()
    {
        return $this->belongsToMany(Alquiler::class);
    }

    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'inquilino_servicio');
    }

    public function rentas()
    {
        return $this->hasMany(Renta::class);
    }

    public function fotos()
    {
        return $this->morphMany(Foto::class, 'imageable');
    }
}
