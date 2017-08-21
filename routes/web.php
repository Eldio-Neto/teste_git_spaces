<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')	->name('home');

Route::resource('/user',						'Site\UserController');
Route::group(['prefix' => 'user'], function($id) {
	Route::any('/gerenciar/{id}',				'Site\UserController@gerenciar')			->name('user.gerenciar');
	Route::any('/alterarSenha/{token?}',		'Site\UserController@alterarSenha')			->name('user.alterarSenha');
	Route::any('/search/',						'Site\UserController@search')				->name('user.search');
	Route::any('/editPermissoes/{id}',			'Site\UserController@editPermissoes')		->name('user.editPermissoes');
	Route::any('/updatePermissoes',				'Site\UserController@updatePermissoes')		->name('user.updatePermissoes');
	
	Route::resource('/eletronico',				'Site\EletronicoController');
	Route::resource('/dependente',				'Site\DependenteController');
});

Route::resource('/contrato',					'Site\ContratoController');
Route::any('/contrato/gerenciar/{id}',			'Site\ContratoController@gerenciar')		->name('contrato.gerenciar');

Route::resource('/advertencia',					'Site\AdvertenciaController');

Route::resource('/suspensao',					'Site\SuspensaoController');

Route::resource('/ferias',						'Site\FeriasController');

Route::resource('/falta',						'Site\FaltaController');

Route::resource('/salario',						'Site\SalarioController');

Route::resource('/empresa',						'Site\EmpresaController');

Route::resource('/solicitacao',					'Site\SolicitacaoController');

Route::group(['prefix' => 'gestao'], function($id) {
	
	Route::resource('/cargo',					'Site\Gestao\CargoController');
	
	Route::resource('/sindicato',				'Site\Gestao\SindicatoController');
	
	Route::resource('/tipoDependente',			'Site\Gestao\TipoDependenteController');
	
	Route::resource('/tipoFuncionario',			'Site\Gestao\TipoFuncionarioController');
	
	Route::resource('/tipoSolicitacao',			'Site\Gestao\TipoSolicitacaoController');
});
