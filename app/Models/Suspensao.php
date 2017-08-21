<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suspensao extends Model
{
	protected $fillable = [
		'data',
		'quantidade_dias',
		'motivo',
		'Contratos_idContratos'
	];
}
