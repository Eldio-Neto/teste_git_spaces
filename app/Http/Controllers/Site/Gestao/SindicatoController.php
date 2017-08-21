<?php

namespace App\Http\Controllers\Site\Gestao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gestao\Sindicato;

class SindicatoController extends Controller
{
    private $Sindicato;
	
	public function __construct (Sindicato $sindicato){
		$this->middleware('auth');
		$this->Sindicato = $sindicato;
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$sindicatos		= $this->Sindicato->all();
    	return view('site.gestao.index-sindicato', compact('sindicatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('site.gestao.cadastrar-editar-sindicato');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	try{
    		$dadosSindicato		= $request->except('_token');
    		$this->Sindicato->create($dadosSindicato);
    		
    		flash('Novo Sindicato Cadastrado com sucesso!', 'success');
    		return route('sindicato.index');
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
    	$sindicato				= $this->Sindicato->find($id);
    	return view('site.gestao.cadastrar-editar-sindicato', compact('sindicato'));
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
    		$dadosSindicato		= $request->except('_token');
    		$this->Sindicato->find($id)->update($dadosSindicato);
    		
    		flash('Sindicato Atualizado com sucesso!', 'success');
    		return route('sindicato.index');
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
