<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
    		'CEP', 
    		'Logradouro', 
    		'Bairro', 
    		'Cidade', 
    		'UFs_idUFs',
    ];
    
}
