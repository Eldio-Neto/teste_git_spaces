<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dependente extends Model
{
    protected $fillable = [
    		'first_name',
    		'last_name',
    		'data_nascimento',
    		'observacao',
    		'TipoDependentes_idTipoDependentes',
    		'Users_idUsers'
    ];
}
