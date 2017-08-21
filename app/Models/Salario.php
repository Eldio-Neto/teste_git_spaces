<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salario extends Model
{
    protected $fillable = [
    	'data',
    	'salario',
    	'motivo',
    	'Cargos_idCargos',
    	'CBO',
    	'Contratos_idContratos'
    ];
}
