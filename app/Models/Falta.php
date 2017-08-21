<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Falta extends Model
{
    protected $fillable = [
    	'data',
    	'motivo',
    	'Contratos_idContratos'
    ];
}
