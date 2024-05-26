<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $fillable = ['direccion', 'renta', 'propietario_id'];

    public function propietario()
    {
        return $this->belongsTo(Propietario::class);
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
