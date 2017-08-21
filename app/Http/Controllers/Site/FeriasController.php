<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feria;
use App\Http\Requests\Site\FeriasFormRequest;

class FeriasController extends Controller
{
    private $Ferias;
	
	public function __construct (Feria $feria){
		$this->middleware('auth');
		$this->Ferias = $feria;
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('site.Contrato.AdmContrato.Ferias.cadastrar-editar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeriasFormRequest $request)
    {
    	try{
    		$dadosFerias		= $request->except('_token');
    		$this->Ferias->create($dadosFerias);
    		
    		flash('Férias Registradas com sucesso!', 'success');
    		return route('contrato.gerenciar', $dadosFerias['Contratos_idContratos']);
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
    	try{
    		$ferias		= $this->Ferias->find($id);
    		return view('site.Contrato.AdmContrato.Ferias.show', compact('ferias'));
    	} catch (\Illuminate\Database\QueryException $e) {
    		flash($e->getMessage(), 'danger');
    		return $e->getMessage();
    	}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	try{
    		$feria	= $this->Ferias->find($id);
    		return view('site.Contrato.AdmContrato.Ferias.cadastrar-editar', compact('feria'));
    	} catch (\Illuminate\Database\QueryException $e) {
    		flash($e->getMessage(), 'danger');
    		return $e->getMessage();
    	}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeriasFormRequest $request, $id)
    {
    	try{
    		$dadosFerias		= $request->except('_token');
    		$this->Ferias->find($id)->update($dadosFerias);
    		
    		flash('Férias Alteradas com sucesso!', 'success');
    		return route('contrato.gerenciar', $dadosFerias['Contratos_idContratos']);
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
