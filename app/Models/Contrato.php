<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Contrato extends Model
{
	protected $fillable = [
		'admissao',
		'inicio',
		'aviso_previo',
		'demissao',
		'cod_colibri',
		'cod_contabilidade',
		'observacoes',
		'Users_idUsers'
	];
	
	public function advertencias(){
		return $this->hasMany(Advertencia::class, 'Contratos_idContratos', 'id');
	}
	
	public function suspensoes(){
		return $this->hasMany(Suspensao::class, 'Contratos_idContratos', 'id');
	}
	
	public function ferias(){
		return $this->hasMany(Feria::class, 'Contratos_idContratos', 'id');
	}
	
	public function faltas(){
		return $this->hasMany(Falta::class, 'Contratos_idContratos', 'id');
	}
	
	public function salarios(){
		return $this->hasMany(Salario::class, 'Contratos_idContratos', 'id');
	}
	
	public function empresa(){
		return $this->hasOne(Empresa::class, 'Empresas_idEmpresas', 'id');
	}
	
	public function funcionario(){
		return $this->belongsTo(User::class, 'Users_idUsers', 'id');
	}
}
