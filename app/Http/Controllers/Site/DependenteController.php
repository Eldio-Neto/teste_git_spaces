<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dependente;
use App\Models\Gestao\TipoDependente;
use App\Http\Requests\Site\DependenteFormRequest;

class DependenteController extends Controller
{
	private $Dependente;
	
	public function __construct (Dependente $dependente){
		$this->middleware('auth');
		$this->Dependente = $dependente;
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
    public function create(TipoDependente $tpDependentes)
    {
    	$tipoDependentes	= $tpDependentes->all();
    	return view('site.Dependente.cadastrar-editar', compact('tipoDependentes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DependenteFormRequest $request)
    {
    	try{
    		$dadosDependentes	= $request->except('_token');
    		$this->Dependente->create($dadosDependentes);
    		
    		flash('Novo Dependente Cadastrado com sucesso!', 'success');
    		return route('user.gerenciar', $dadosDependentes['Users_idUsers']);
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
    public function edit($id, TipoDependente $tpDependentes)
    {
    	$tipoDependentes	= $tpDependentes->all();
    	$dependente			= $this->Dependente->find($id);
    	return view('site.Dependente.cadastrar-editar', compact('tipoDependentes', 'dependente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DependenteFormRequest $request, $id)
    {
    	try{
    		$dadosDependentes	= $request->except('_token');
    		$this->Dependente->find($id)->update($dadosDependentes);
    		
    		flash('Dependente Alterado com sucesso!', 'success');
    		return route('user.gerenciar', $dadosDependentes['Users_idUsers']);
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
