<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eletronico extends Model
{
	protected $fillable = [
			'Marca',
			'Modelo',
			'MAC',
			'Users_idUsers'
	];
}
