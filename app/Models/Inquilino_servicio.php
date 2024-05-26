<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

//class InquilinoServicio extends Model
class InquilinoServicio extends Pivot
{
    //use HasFactory;
    protected $table = 'inquilino_servicio';
}
