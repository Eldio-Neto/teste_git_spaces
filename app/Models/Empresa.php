<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
	protected $fillable = [
			'fantasia',
			'CNPJ',
			'razao_social',
			'abreviacao',
			'phone',
			'mobile',
			'CEP',
			'Logradouro',
			'Bairro',
			'Cidade',
			'UFs_idUFs'
    ];
}
