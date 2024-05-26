<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renta extends Model
{
    use HasFactory;

    protected $fillable = ['inquilino_id', 'departamento_id', 'monto', 'fecha_pago'];

    public function inquilino()
    {
        return $this->belongsTo(Inquilino::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
}
