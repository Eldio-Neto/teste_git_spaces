@extends('layouts.app')

@section('content')
<div class="x_panel">
	<div class="x_title">
		<h2>Solicitações</h2>
		<ul class="nav navbar-right panel_toolbox">
			@if( $solicitacaos->isEmpty() )
			<li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
			@else
			<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
			@endif
			<li><a class="close-link"><i class="fa fa-close"></i></a></li>
		</ul>
		<div class="clearfix"></div>
		
		<!-- Button Cadastro -->
		<button type="button" data-toggle="modal" data-target="#exampleModal" 
			data-rota="{{route('solicitacao.create')}}" class="btn btn-xs btn-success">
			<i class="fa fa-plus"></i> | Cadastrar Nova Solicitação
		</button>
		<!-- END Button Cadastro -->
		
	</div>
	@if( $solicitacaos->isEmpty() )
	<div class="x_content" style="display: none;">
	@else
	<div class="x_content">
	@endif
		<div class="row">
			<div class="col-sm-12">
			
				<div class="table-responsive">
					<table id="tabelaSolicitacaos" class="table table-bordered table-hover table-striped">
						<thead align="center">
							<tr>
								<th>Descrição</th>
								<th>Status</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
						@forelse($solicitacaos as $solicitacao)
							<tr>
								<td>{{$solicitacao->tipo->description}}</td>
								@if( $solicitacao->status == 'Pendente' )
									<td><span class="label label-info">{{$solicitacao->status}}</span></td>
								@elseif( $solicitacao->status == 'Negado' )
									<td><span class="label label-danger">{{$solicitacao->status}}</span></td>
								@elseif( $solicitacao->status == 'Aprovado' )
									<td><span class="label label-success">{{$solicitacao->status}}</span></td>
								@endif
								<td>
									<!-- @ can('membro_update')  -->
									<button type="button" class="btn btn-sm btn-warning btn-circle" 
									data-toggle="modal" data-target="#exampleModal" data-rota="{{route('solicitacao.edit', $solicitacao->id)}}">
										<i class="fa fa-edit" aria-hidden="true"></i></button>
									<!-- @ endcan -->
								</td>
							</tr>
						@empty
							<p><b>Sistema Não Possui Solicitações!</b></p>
						@endif
						</tbody>
					</table>
				</div>
			
			</div>
		</div>

	</div>
</div>
@endsection

@push('scripts')
	@include('layouts.modal')
@endpush