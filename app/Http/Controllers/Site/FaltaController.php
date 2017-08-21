<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Falta;
use App\Http\Requests\Site\FaltasFormRequest;

class FaltaController extends Controller
{
    private $Falta;
	
	public function __construct (Falta $falta){
		$this->middleware('auth');
		$this->Falta = $falta;
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
    	return view('site.Contrato.AdmContrato.Faltas.cadastrar-editar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaltasFormRequest $request)
    {
    	try{
    		$dadosFalta		= $request->except('_token');
    		$this->Falta->create($dadosFalta);
    		
    		flash('Falta Registrada com sucesso!', 'success');
    		return route('contrato.gerenciar', $dadosFalta['Contratos_idContratos']);
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
    		$falta	= $this->Falta->find($id);
    		return view('site.Contrato.AdmContrato.Faltas.show', compact('falta'));
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
    		$falta	= $this->Falta->find($id);
    		return view('site.Contrato.AdmContrato.Faltas.cadastrar-editar', compact('falta'));
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
    public function update(FaltasFormRequest $request, $id)
    {
    	try{
    		$dadosFalta		= $request->except('_token');
    		$this->Falta->find($id)->update($dadosFalta);
    		
    		flash('Falta Alterada com sucesso!', 'success');
    		return route('contrato.gerenciar', $dadosFalta['Contratos_idContratos']);
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
