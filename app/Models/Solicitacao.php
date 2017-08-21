<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gestao\TipoSolicitacao;
use App\User;

class Solicitacao extends Model
{
    protected $fillable = [
    		'Users_idUsers',
    		'TipoSolicitacaos_idTipoSolicitacaos',
    		'status',
    		'resposta',
    		'data_falta',
    		'valor',
    		'data_retirada',
    		'detalhes'
    ];
    
    public function tipo(){
    	return $this->hasOne(TipoSolicitacao::class, 'id', 'TipoSolicitacaos_idTipoSolicitacaos');
    }
    
    protected $status = [
    		'Pendente',
    		'Negado',
    		'Aprovado'
    ];
    
    public function getStatus(){
    	return $this->status;
    }
    
    public function solicitante(){
    	return $this->hasOne(User::class, 'id', 'Users_idUsers');
    }
}
