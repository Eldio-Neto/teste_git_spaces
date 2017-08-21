<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Suspensao;
use App\Http\Requests\Site\SuspensaoFormRequest;

class SuspensaoController extends Controller
{
    private $Suspensao;
	
	public function __construct (Suspensao $suspensao){
		$this->middleware('auth');
		$this->Suspensao = $suspensao;
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
    	return view('site.Contrato.AdmContrato.Punicoes.cadastrar-editar-suspensao');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuspensaoFormRequest $request)
    {
    	try{
    		$dadosSuspensao		= $request->except('_token');
    		$this->Suspensao->create($dadosSuspensao);
    		
    		flash('Suspensão Registrada com sucesso!', 'success');
    		return route('contrato.gerenciar', $dadosSuspensao['Contratos_idContratos']);
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
    		$suspensao	= $this->Suspensao->find($id);
    		return view('site.Contrato.AdmContrato.Punicoes.show-suspensao', compact('suspensao'));
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
    		$suspensao	= $this->Suspensao->find($id);
    		return view('site.Contrato.AdmContrato.Punicoes.cadastrar-editar-suspensao', compact('suspensao'));
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
    public function update(SuspensaoFormRequest $request, $id)
    {
    	try{
    		$dadosSuspensao		= $request->except('_token');
    		$this->Suspensao->find($id)->update($dadosSuspensao);
    		
    		flash('Suspensão Alterada com sucesso!', 'success');
    		return route('contrato.gerenciar', $dadosSuspensao['Contratos_idContratos']);
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
