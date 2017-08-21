<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feria extends Model
{
    protected $fillable = [
    	'inicio_aquisicao',
    	'termino_aquisicao',
    	'inicio_gozo',
    	'termino_gozo',
    	'observacoes',
    	'Contratos_idContratos'
    ];
}
