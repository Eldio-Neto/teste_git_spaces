<?php

namespace App\Http\Controllers\Site\Gestao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Gestao\TipoFuncionarioFormRequest;
use App\Models\Gestao\TipoFuncionario;

class TipoFuncionarioController extends Controller
{
    private $TipoFuncionario;
	
	public function __construct (TipoFuncionario $tipoFuncionario){
		$this->middleware('auth');
		$this->TipoFuncionario = $tipoFuncionario;
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$tipoFuncionarios		= $this->TipoFuncionario->all();
    	return view('site.gestao.index-tipoFuncionario', compact('tipoFuncionarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('site.gestao.cadastrar-editar-tipoFuncionario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoFuncionarioFormRequest $request)
    {
    	try{
    		$dadosTipo		= $request->except('_token');
    		$this->TipoFuncionario->create($dadosTipo);
    		
    		flash('Novo Tipo de Funcionario Cadastrado com sucesso!', 'success');
    		return route('tipoFuncionario.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$tipoFuncionario				= $this->TipoFuncionario->find($id);
    	return view('site.gestao.cadastrar-editar-tipoFuncionario', compact('tipoFuncionario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	try{
    		$dadosTipo		= $request->except('_token');
    		$this->TipoFuncionario->find($id)->update($dadosTipo);
    		
    		flash('Tipo de Funcionario Atualizado com sucesso!', 'success');
    		return route('tipoFuncionario.index');
    	} catch (\Illuminate\Database\QueryException $e) {
    		flash($e->getMessage(), 'danger');
    		return $e->getMessage();
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
}
