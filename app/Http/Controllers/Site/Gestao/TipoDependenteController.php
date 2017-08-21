<?php

namespace App\Http\Controllers\Site\Gestao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gestao\TipoDependente;
use App\Http\Requests\Site\Gestao\TipoDependenteFormRequest;

class TipoDependenteController extends Controller
{
    private $TipoDependente;
	
	public function __construct (TipoDependente $tipoDependente){
		$this->middleware('auth');
		$this->TipoDependente = $tipoDependente;
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$tipoDependentes		= $this->TipoDependente->all();
    	return view('site.gestao.index-tipoDependente', compact('tipoDependentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('site.gestao.cadastrar-editar-tipoDependente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoDependenteFormRequest $request)
    {
    	try{
    		$dadosTipo		= $request->except('_token');
    		$this->TipoDependente->create($dadosTipo);
    		
    		flash('Novo Tipo de Dependente Cadastrado com sucesso!', 'success');
    		return route('tipoDependente.index');
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
    	$tipoDependente				= $this->TipoDependente->find($id);
    	return view('site.gestao.cadastrar-editar-tipoDependente', compact('tipoDependente'));
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
    		$this->TipoDependente->find($id)->update($dadosTipo);
    		
    		flash('Tipo de Dependente Atualizado com sucesso!', 'success');
    		return route('tipoDependente.index');
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
