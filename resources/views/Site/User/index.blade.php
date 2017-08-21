@extends('layouts.app') 

@section('content')

	
<div class="panel panel-default">
			
	<div class="panel-body">
				
		<div class="row">
			<div class="col-lg-9 col-md-7 col-sm-6 col-xs-12">
				
				<!-- Button Cadastro Membro -->
				<button data-toggle="modal" data-target="#exampleModal" 
					data-rota="{{route('user.create')}}" 
					class="btn btn-sm btn-success">
					<i class="fa fa-plus"></i> | Cadastrar Funcionário
				</button>
				<!-- END Button Cadastro Membro -->
														
			</div>
			<div class="col-lg-3 col-md-5 col-sm-6 col-xs-12">
				<label class=" pull-right">Procurar:
					<input id="searchTabela" type="search" class="form-control input-sm">
				</label>
			</div>
		</div>

		<div class="table-responsive">
			<table id="tabelaUsers" class="table table-bordered table-hover table-striped">
				<thead align="center">
					<tr>
						<th>Nome</th>
						<th>Telefone</th>
						<th>Celular</th>
						<th>Opções</th>
					</tr>
				</thead>
				<tbody>
				@forelse($users as $user)
					<tr>
						<td>{{$user->first_name}} {{$user->last_name}}</td>
						<td>{{$user->phone}}</td>
						<td>{{$user->mobile}}</td>
						<td>
							<button type="button" class="btn btn-xs btn-primary btn-circle" 
							data-toggle="modal" data-target="#exampleModal" data-rota="{{route('user.show', $user->id)}}">
							<i class="fa fa-search" aria-hidden="true"></i></button>
							
							<!-- @ can('membro_update')  -->
							<button type="button" class="btn btn-xs btn-warning btn-circle" 
							data-toggle="modal" data-target="#exampleModal" data-rota="{{route('user.edit', $user->id)}}">
								<i class="fa fa-edit" aria-hidden="true"></i></button>
							<!-- @ endcan -->
							
							<!-- @ can('membro_update')  -->
							<a type="button" class="btn btn-xs btn-default btn-circle" 
							href="{{route('user.gerenciar', $user->id)}}">
								<i class="fa fa-cog" aria-hidden="true"></i></a>
							<!-- @ endcan -->
							
							<!-- @ can('membro_delete') -->
								<form  method="post" action="{{route('user.destroy', $user->id)}}"  style="display:inline;">
									{!! method_field('DELETE') !!} {!! csrf_field() !!}
									<button type="submit" onClick="return confirm('Deseja realmente excluir o Funcionário {{$user->first_name}} ?')" 
										class="btn btn-xs btn-danger btn-circle"><i class="fa fa-times"></i></button>
								</form>
							<!-- @ endcan -->
						</td>
					</tr>
				@empty
					<p><b>Ainda Não há Nenhum Funcionário Cadastrado!</b></p>
				@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
{{ $users->links() }}

@endsection 

@push('scripts')
	@include('layouts.modal')
@endpush
