<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Endereco;
use App\Models\Dependente;
use App\Models\Eletronico;
use App\Models\Contrato;
use App\Models\Perfil;
use App\Models\Permissao;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',	
    	'first_name', 
    	'last_name',
    	'EstadoCivils_idEstadoCivils',
    	'data_nascimento',
    	'genero',
    	'phone',
    	'mobile',
    		
    	'CPF',
    	'RG',
    	'Emissor',
    	'PIS',
    	'titulo',
    	'titulo_zona',
    	'titulo_secao',
    	'CTPS',
    	'CTPS_serie',
    	'CTPS_uf',
    	'CTPS_emissao',
    	'CNH',
    	'CNH_categoria',
    	'CNH_validade',
    		
    	'nome_pai',
    	'nome_mae',
    		
    	'Enderecos_idEnderecos'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function endereco(){
    	return $this->hasMany(Endereco::class, 'id', 'Enderecos_idEnderecos');
    }
    
    public function dependentes(){
    	return $this->hasMany(Dependente::class, 'Users_idUsers', 'id');
    }
    
    public function eletronicos(){
    	return $this->hasMany(Eletronico::class, 'Users_idUsers', 'id');
    }
    
    public function contratos(){
    	return $this->hasMany(Contrato::class, 'Users_idUsers', 'id');
    }
    
    /*
     * Sessão de Permissões
     */
    //Retorna os Perfis que Possuem aquelaPermissao
    public function perfils()
    {
    	return $this->belongsToMany(Perfil::class, 'user_has_perfils', 'Users_idUsers', 'Perfils_idPerfils');
    }
    
    public  function hasPermissao(Permissao $permissao)
    {
    	//dd($permissao->perfils());
    	// Retorna os perfis que Possuem a permissao especifica
    	return $this->hasAnyPerfils($permissao->perfils());
    }
    
    public function hasAnyPerfils($perfils)
    {
    	
    	$perfisUser			= $this->perfils()->get();
    	if ( is_array($perfils) || is_object($perfils) ) {
    		
    		$perfisAutorizados	= $perfils->get();
    		//dd($perfisAutorizados->intersect($perfisUser)->count());
    		return !! $perfisAutorizados->intersect($perfisUser)->count();
    		
    	}
    	
    	return $this->perfils()->get()->contains('name', $perfils);
    }
    /*
     * FIM Sessão de Permissões
     */
}
