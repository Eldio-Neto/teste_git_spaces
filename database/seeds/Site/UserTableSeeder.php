<?php

use Illuminate\Database\Seeder;
use App\Models\EstadoCivil;
use App\Models\Uf;
use App\User;
use App\Models\Endereco;
use App\Models\Gestao\TipoSolicitacao;
use App\Models\Gestao\TipoFuncionario;
use App\Models\Gestao\TipoDependente;
use App\Models\Perfil;
use App\Models\User_has_Perfil;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	EstadoCivil::create(['description'	=> ' ']);
    	EstadoCivil::create(['description'	=> 'Solteiro(a)']);
    	EstadoCivil::create(['description'	=> 'Casado(a)']);
    	EstadoCivil::create(['description'	=> 'Viúvo(a)']);
    	EstadoCivil::create(['description'	=> 'Divorciado(a)']);
    	EstadoCivil::create(['description'	=> 'União Estável']);
    	EstadoCivil::create(['description'	=> 'Outros']);
    	
    	Uf::create(['Abreviatura'			=> ' '	,'Nome'	=> ' ']);
    	Uf::create(['Abreviatura'			=> 'DF'	,'Nome'	=> 'Distrito Federal']);
    	Uf::create(['Abreviatura'			=> 'GO'	,'Nome'	=> 'Goiânia']);
    	
    	TipoSolicitacao::create(['description'	=> 'Justificativa Falta']);
    	TipoSolicitacao::create(['description'	=> 'Adiantamento R$']);
    	TipoSolicitacao::create(['description'	=> 'Uniforme']);
    	
    	TipoFuncionario::create(['description'	=> 'Contratado']);
    	TipoFuncionario::create(['description'	=> 'Freelancer']);
    	
    	TipoDependente::create(['description'	=> 'Conjugê']);
    	TipoDependente::create(['description'	=> 'Filho(a)']);
    	TipoDependente::create(['description'	=> 'Afilhado(a)']);
    	
    	Endereco::create(['CEP' => '73.035-093', 'UFs_idUFs' => '2']);
    	
    	User::create(['email' => 'admin@bratech.com', 'password' => bcrypt('123456'), 'first_name' => 'Administrador',
    				'Enderecos_idEnderecos'	=> '1'
    	]);
    	
    	Perfil::create([
    			'name'			=> 'admin',
    			'description'	=> 'Administrador com acesso a todas as funções do sistema'
    	]);
    	User_has_Perfil::create(['Users_idUsers'				=> 1, 'Perfils_idPerfils'	=> 1]);
    }
}
