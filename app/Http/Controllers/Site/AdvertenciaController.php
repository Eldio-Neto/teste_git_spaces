<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertencia;
use App\Http\Requests\Site\AdvertenciaFormRequest;

class AdvertenciaController extends Controller
{
	private $Advertencia;
	
	public function __construct (Advertencia $advertencia){
		$this->middleware('auth');
		$this->Advertencia = $advertencia;
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
    	return view('site.Contrato.AdmContrato.Punicoes.cadastrar-editar-advertencia');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertenciaFormRequest $request)
    {
    	try{
	        $dadosAdvertencia		= $request->except('_token');
	        $this->Advertencia->create($dadosAdvertencia);
	    
	        flash('Advertência Registrada com sucesso!', 'success');
	        return route('contrato.gerenciar', $dadosAdvertencia['Contratos_idContratos']);
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
    		$advertencia	= $this->Advertencia->find($id);
    		return view('site.Contrato.AdmContrato.Punicoes.show-advertencia', compact('advertencia'));
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
	    	$advertencia	= $this->Advertencia->find($id);
	    	return view('site.Contrato.AdmContrato.Punicoes.cadastrar-editar-advertencia', compact('advertencia'));
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
    public function update(AdvertenciaFormRequest $request, $id)
    {
    	try{
	    	$dadosAdvertencia		= $request->except('_token');
	    	$this->Advertencia->find($id)->update($dadosAdvertencia);
	    	
	    	flash('Advertência Alterada com sucesso!', 'success');
	    	return route('contrato.gerenciar', $dadosAdvertencia['Contratos_idContratos']);
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
