<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\EstadoCivil;
use App\Models\UF;
use App\Http\Requests\Site\UserFormRequest;
use App\Models\Endereco;
use App\Http\Requests\Site\EnderecoFormRequest;
use Illuminate\Auth\Passwords\PasswordBroker;

class UserController extends Controller
{
	private $User;
	private $TotalPagina=20;
	
	public function __construct (User $user){
		$this->middleware('auth');
		$this->User = $user;
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$titulo		= 'Funcionários';
    	$users		= $this->User->paginate($this->TotalPagina);
    	return view('site.user.index', compact('titulo', 'users')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(EstadoCivil $estCV, UF $uf)
    {
    	$estadoCivils		= $estCV->all();
    	$UFs				= $uf->all();
    	return view('site.user.cadastrar-editar', compact('estadoCivils', 'UFs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request, Endereco $endereco)
    {
		try {
			//Pega Todos os dados do formulario
			$dataUser		= $request->except('_token', 'CEP', 'Logradouro', 'Bairro', 'Cidade', 'UFs_idUFs');
			
			$dataEndereco	= $request->only('CEP', 'logradouro', 'bairro', 'cidade', 'UFs_idUFs');
			
			if( !isset($dataUser['password']) || empty($dataUser['password'])){
				$dataUser['password'] = bcrypt('123456');
			}
			//Faz o cadastro
			$insertEndereco	= $endereco->create($dataEndereco);
			$dataUser['Enderecos_idEnderecos']	= $insertEndereco->id;
			$dataUser['password']	= bcrypt('123456');
			$this->User->create($dataUser);
			
			flash('Funcionário(a) Cadastrado(a) com sucesso!', 'success');
			return route('user.index');
		} catch (\Illuminate\Database\QueryException $e) {
			flash($e->getMessage(), 'danger');
			return $e->getMessage();
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$user = $this->User->find($id);
        return view('site.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, EstadoCivil $estCV, UF $uf)
    {
    	$estadoCivils		= $estCV->all();
    	$UFs				= $uf->all();
    	$user				= $this->User->find($id);
    	$dependentes		= $user->dependentes()->get();
    	return view('site.user.cadastrar-editar', compact('user','estadoCivils', 'UFs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UF $uf, Endereco $endereco, UserFormRequest $reqUser, EnderecoFormRequest $reqEnd)
    {
    	try {
    		//Pega Todos os dados do formulario
    		$dataUser		= $reqUser->except('_token', 'CEP', 'Logradouro', 'Bairro', 'Cidade', 'UFs_idUFs');
    		
    		$dataEndereco	= $reqEnd->only('CEP', 'Logradouro', 'Bairro', 'Cidade', 'UFs_idUFs');
    		
    		//Faz o update
    		$user			= $this->User->find($id);
    		$user->update($dataUser);
    		$endereco->find($user->Enderecos_idEnderecos)->update($dataEndereco);
    		
    		flash('Funcionário(a) Alterado(a) com sucesso!', 'success');
    		return route('user.index');
    		
    	} catch (\Illuminate\Database\QueryException $e) {
    		flash($e->getMessage(), 'danger');
    		return $e->getMessage();// redirect()->back(); 
    	}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function gerenciar($id, EstadoCivil $estCV, UF $uf){
    	$estadoCivils		= $estCV->all();
    	$UFs				= $uf->all();
    	$user				= $this->User->find($id);
    	$contratos			= $user->contratos()->get();
    	return view('site.user.gerenciar', compact('user', 'estadoCivils', 'UFs', 'contratos'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  string  $nome, $route
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
    	$nome		= $request->only('nome')['nome'];
    	
    	$users		= $this->User->select('users.id','users.first_name','users.last_name')
    	//->whereRaw('					Igrejas_idIgrejas	= '.auth()->user()->Igrejas_idIgrejas.' AND
    	->whereRaw('	(
							users.first_name	like  "%'.$nome.'%"	OR
							users.last_name		like  "%'.$nome.'%"	
						)
					')
					->get();
    	if ( !empty($users) ) {
    		return $users;
    	}
    }
    
    /**
     * Display the password reset view for the given token.
     *
     * @param  string $token
     *
     * @return Response
     */
    public function alterarSenha(PasswordBroker $PB, $token=Null )
    {
    	//dd(auth()->user());
    	$title = 'Alterar Senha';
    	if (auth()->check() && is_null( $token)) {
    		
    		// user is logged in and has no token, in other words, he/she access this route by
    		// clicking a link pointing to "password/reset", so we generate a new token and save it
    		// to the password_resets table
    		$token = $PB->createToken( auth()->user() );
    	}
    	$email = auth()->user()->email;
    	Auth::logout();
    	return view( 'auth.passwords.reset' )->with('token', $token)->with('email', $email);
    }
}
