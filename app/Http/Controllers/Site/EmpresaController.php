<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Http\Requests\Site\EmpresaFormRequest;
use App\Models\Uf;

class EmpresaController extends Controller
{
    private $Empresa;
	
	public function __construct (Empresa $empresa){
		$this->middleware('auth');
		$this->Empresa = $empresa;
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$empresas		= $this->Empresa->all();
    	return view('site.Empresa.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Uf $uf)
    {
    	$Ufs		= $uf->all();
        return view('site.Empresa.cadastrar-editar', compact('Ufs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaFormRequest $request)
    {
        try{
        	$dadosEmpresa		= $request->except('_token');
        	$this->Empresa->create($dadosEmpresa);
        	
        	flash('Nova Empresa Cadastrada com sucesso!', 'success');
        	return route('empresa.index');
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
    	$empresa		= $this->Empresa->find($id);
    	return view('site.Empresa.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$empresa		= $this->Empresa->find($id);
    	return view('site.Empresa.show', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CargoFormRequest $request, $id)
    {
    	try{
    		$dadosEmpresa		= $request->except('_token');
    		$this->Empresa->find($id)->update($dadosEmpresa);
    		
    		flash('Empresa Atualizada com sucesso!', 'success');
    		return route('empresa.index');
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
