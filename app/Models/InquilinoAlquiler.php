<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//class InquilinoAlquiler extends Model
class InquilinoAlquiler extends Pivot
{
    //use HasFactory;

    protected $table = 'inquilino_alquiler';
}
