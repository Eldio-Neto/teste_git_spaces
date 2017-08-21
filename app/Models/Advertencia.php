<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertencia extends Model
{
    protected $fillable = [
    	'id',
    	'data',
    	'motivo',
    	'Contratos_idContratos'
    ];
}
