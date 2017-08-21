<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\EletronicoFormRequest;
use App\Models\Eletronico;

class EletronicoController extends Controller
{
    private $Eletronico;
	
	public function __construct (Eletronico $eletronico){
		$this->middleware('auth');
		$this->Eletronico = $eletronico;
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
    	return view('site.Eletronico.cadastrar-editar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EletronicoFormRequest $request)
    {
    	try{
    		$dadosEletronico	= $request->except('_token');
    		$this->Eletronico->create($dadosEletronico);
    		
    		flash('Novo Eletrônico Cadastrado com sucesso!', 'success');
    		return route('user.gerenciar', $dadosEletronico['Users_idUsers']);
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
    	$eletronico			= $this->Eletronico->find($id);
    	return view('site.Eletronico.cadastrar-editar', compact('eletronico'));
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
    		$dadosEletronico	= $request->except('_token');
    		$this->Eletronico->find($id)->update($dadosEletronico);
    		
    		flash('Eletrônico Alterado com sucesso!', 'success');
    		return route('user.gerenciar', $dadosEletronico['Users_idUsers']);
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
