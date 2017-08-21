<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Eletronico;
use App\Http\Controllers\Site\MacAddress;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function login(MacAddress $mac, Eletronico $elet, User $u, Request  $request)
    {
    	$eletronico			= $elet->where('MAC', $mac->getCurrentMacAddress() )->first();
    	
    	if ( empty($eletronico) ) {
    		
    		$email		= $request->only('email')['email'];
    		$senha		= $request->only('password')['password'];
    		
    		$user			= $u->where( 'email',		$email )->first();
    		
    		if( $user && password_verify($senha, $user->password) ){
    			Auth::login($user);
    			return redirect()->intended('home');
    		}else {
    			return "Usuario/Senha Inválidos!<br> OU<br> Seu Aparelho não está cadastrado!";
    		}
    		
    	}else{
    		$user	= $u->find( $eletronico->Users_idUsers );
    	}
    	
    	
    	if($user)  {
    		Auth::login($user);
    		return redirect()->intended('home');
    		
    	}
    }
}
