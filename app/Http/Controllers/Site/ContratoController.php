<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contrato;
use App\Models\Empresa;
use App\Models\Gestao\TipoFuncionario;
use App\Http\Requests\Site\ContratoFormRequest;

class ContratoController extends Controller
{
	private $Contrato;
	private $TotalPagina=20;
	
	public function __construct (Contrato $contrato){
		$this->middleware('auth');
		$this->Contrato = $contrato;
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Contrato $contrato)
    {
    	$titulo		= 'Lista Contratos';
    	$contratos	= $this->Contrato->paginate($this->TotalPagina);
    	return view('site.contrato.index', compact('titulo', 'contratos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Empresa $empresa, TipoFuncionario $tpFunc)
    {
    	$empresas			= $empresa->all();
    	$tipoFuncionarios	= $tpFunc->all();
    	return view('site.contrato.cadastrar-editar', compact('empresas', 'tipoFuncionarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContratoFormRequest $request)
    {
    	try{
    		$dadosContrato		= $request->except('_token');
    		$this->Contrato->create($dadosContrato);
    		
    		flash('Contrato Registrado com sucesso!', 'success');
    		return route('contrato.index');
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
    public function edit($id, Empresa $empresa, TipoFuncionario $tpFunc)
    {
    	try{
    		$empresas			= $empresa->all();
    		$tipoFuncionarios	= $tpFunc->all();
    		$contrato	= $this->Contrato->find($id);
    		return view('site.contrato.cadastrar-editar', compact('empresas', 'tipoFuncionarios', 'contrato'));
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
    public function update(ContratoFormRequest $request, $id)
    {
    	try{
    		$dadosContrato		= $request->except('_token');
    		$this->Contrato->find($id)->update($dadosContrato);
    		
    		flash('Contrato Alterado com sucesso!', 'success');
    		return route('contrato.index');
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
    
    public function gerenciar(Contrato $Objcontrato, $id){
    	$titulo		= 'Gerenciar Contrato';
    	$contrato	= $Objcontrato->find($id);
    	return view('site.contrato.admContrato.gerenciarContrato', compact('titulo', 'contrato'));
    }
}
