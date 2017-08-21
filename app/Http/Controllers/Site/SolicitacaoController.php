<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Solicitacao;
use App\Models\Gestao\TipoSolicitacao;
use App\Http\Requests\Site\SolicitacaoFormRequest;

class SolicitacaoController extends Controller
{
    private $Solicitacao;
	
    public function __construct (Solicitacao $solicitacao){
		$this->middleware('auth');
		$this->Solicitacao = $solicitacao;
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$solicitacaos		= $this->Solicitacao->select('*')->orderBy('status')->get();
        return view('site.Solicitacao.index', compact('solicitacaos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TipoSolicitacao $tpSolicitacao)
    {
        $tipoSolicitacaos		= $tpSolicitacao->all();
        $status					= $this->Solicitacao->getStatus();
        return view('site.Solicitacao.cadastrar-editar', compact('tipoSolicitacaos', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SolicitacaoFormRequest $request)
    {
    	try{
    		$dadosSolicitacao		= $request->except('_token');
    		
    		$this->Solicitacao->create($dadosSolicitacao);
    		
        	flash('Solicitação Registrada com sucesso!', 'success');
        	return route('solicitacao.index');
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
    public function edit($id, TipoSolicitacao $tpSolicitacao)
    {
    	$tipoSolicitacaos		= $tpSolicitacao->all();
    	$status					= $this->Solicitacao->getStatus();
    	$solicitacao			= $this->Solicitacao->find($id);
    	return view('site.Solicitacao.cadastrar-editar', compact('tipoSolicitacaos', 'status', 'solicitacao'));
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
    		$dadosSolicitacao		= $request->except('_token');
    		if( empty($dadosSolicitacao['Users_idUsers']) ){
    			$dadosSolicitacao['Users_idUsers'] = auth()->user()->id;
    		}
    		$this->Solicitacao->find($id)->update($dadosSolicitacao);
    		
    		flash('Solicitação Alterada com sucesso!', 'success');
    		return route('solicitacao.index');
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
