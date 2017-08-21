<?php

namespace App\Http\Controllers\Site\Gestao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Gestao\TipoSolicitacaoFormRequest;
use App\Models\Gestao\TipoSolicitacao;

class TipoSolicitacaoController extends Controller
{
    private $TipoSolicitacao;
	
    public function __construct (TipoSolicitacao $tipoSolicitacao){
		$this->middleware('auth');
		$this->TipoSolicitacao = $tipoSolicitacao;
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$tipoSolicitacaos		= $this->TipoSolicitacao->all();
    	return view('site.Gestao.index-tipoSolicitacao', compact('tipoSolicitacaos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('site.Gestao.cadastrar-editar-tipoSolicitacao');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoSolicitacaoFormRequest $request)
    {
    	try{
    		$dadosTipo		= $request->except('_token');
    		$this->TipoSolicitacao->create($dadosTipo);
    		
    		flash('Tipo de Solicitação Registrado com sucesso!', 'success');
    		return route('tipoSolicitacao.index');
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
    	$tipoSolicitacao	= $this->TipoSolicitacao->find($id);
    	return view('site.Gestao.cadastrar-editar-tipoSolicitacao', compact('tipoSolicitacao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoSolicitacaoFormRequest$request, $id)
    {
    	try{
    		$dadosTipo		= $request->except('_token');
    		$this->TipoSolicitacao->find($id)->update($dadosTipo);
    		
    		flash('Tipo de Solicitação Alterado com sucesso!', 'success');
    		return route('tipoSolicitacao.index');
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
