<?php

namespace App\Http\Controllers\Site\Gestao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gestao\Cargo;
use App\Http\Requests\Site\Gestao\CargoFormRequest;

class CargoController extends Controller
{
    private $Cargo;
	
	public function __construct (Cargo $cargo){
		$this->middleware('auth');
		$this->Cargo = $cargo;
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$cargos		= $this->Cargo->all();
    	return view('site.gestao.index-cargo', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.gestao.cadastrar-editar-cargo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CargoFormRequest $request)
    {
        try{
        	$dadosCargo		= $request->except('_token');
        	$this->Cargo->create($dadosCargo);
        	
        	flash('Novo Cargo Cadastrado com sucesso!', 'success');
        	return route('cargo.index');
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
    	$cargo				= $this->Cargo->find($id);
    	return view('site.gestao.cadastrar-editar-cargo', compact('cargo'));
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
    		$dadosCargo		= $request->except('_token');
    		$this->Cargo->find($id)->update($dadosCargo);
    		
    		flash('Cargo Atualizado com sucesso!', 'success');
    		return route('cargo.index');
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
