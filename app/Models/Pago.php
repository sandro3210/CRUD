<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = ['renta_id', 'usuario_id', 'monto', 'fecha_pago'];

    public function renta()
    {
        return $this->belongsTo(Renta::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
