<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Salario;
use App\Http\Requests\Site\SalarioFormRequest;
use App\Models\Cargo;

class SalarioController extends Controller
{
    private $Salario;
	
	public function __construct (Salario $salario){
		$this->middleware('auth');
		$this->Salario = $salario;
	}
	
    /**
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
    public function create(Cargo $cargo)
    {
    	$cargos		= $cargo->all();
    	return view('site.Contrato.AdmContrato.Salarios.cadastrar-editar', compact('cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalarioFormRequest $request)
    {
    	try{
    		$dadosSalario		= $request->except('_token');
    		$this->Salario->create($dadosSalario);
    		
    		flash('Salário Registrado com sucesso!', 'success');
    		return route('contrato.gerenciar', $dadosSalario['Contratos_idContratos']);
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
    		$salario	= $this->Salario->find($id);
    		return view('site.Contrato.AdmContrato.Salarios.show', compact('salario'));
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
    public function edit($id, Cargo $cargo)
    {
    	try{
    		$cargos		= $cargo->all();
    		$salario	= $this->Salario->find($id);
    		return view('site.Contrato.AdmContrato.Salarios.cadastrar-editar', compact('salario', 'cargos'));
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
    public function update(Request $request, $id)
    {
    	try{
    		$dadosSalario		= $request->except('_token');
    		$this->Salario->find($id)->update($dadosSalario);
    		
    		flash('Salário Alterado com sucesso!', 'success');
    		return route('contrato.gerenciar', $dadosSalario['Contratos_idContratos']);
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
