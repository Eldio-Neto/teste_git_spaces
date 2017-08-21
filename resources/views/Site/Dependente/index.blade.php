<div class="x_panel">
	<div class="x_title">
		<h2>Dependentes</h2>
		<ul class="nav navbar-right panel_toolbox">
			@if( $user->dependentes->isEmpty() )
			<li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
			@else
			<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
			@endif
			<li><a class="close-link"><i class="fa fa-close"></i></a></li>
		</ul>
		<div class="clearfix"></div>
		
		<!-- Button Cadastro -->
		<button type="button" data-toggle="modal" data-target="#exampleModal" 
			data-rota="{{route('dependente.create')}}" class="btn btn-xs btn-success">
			<i class="fa fa-plus"></i> | Cadastrar Novo Dependente
		</button>
		<!-- END Button Cadastro -->
		
	</div>
	@if( $user->dependentes->isEmpty() )
	<div class="x_content" style="display: none;">
	@else
	<div class="x_content">
	@endif
		<div class="row">
			<div class="col-sm-12">
			
				<div class="table-responsive">
					<table id="tabelaDependetes" class="table table-bordered table-hover table-striped">
						<thead align="center">
							<tr>
								<th>Nome</th>
								<th>Tipo</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
						@forelse($user->dependentes as $dependente)
							<tr>
								<td>{{$dependente->first_name}}</td>
								<td>{{$dependente->TipoDependentes_idTipoDependentes}}</td>
								<td>
									<!-- @ can('membro_update')  -->
									<button type="button" class="btn btn-sm btn-warning btn-circle" 
									data-toggle="modal" data-target="#exampleModal" data-rota="{{route('dependente.edit', $dependente->id)}}">
										<i class="fa fa-edit" aria-hidden="true"></i></button>
									<!-- @ endcan -->
								</td>
							</tr>
						@empty
							<p><b>Funcionário(a) Não Possui Dependentes!</b></p>
						@endif
						</tbody>
					</table>
				</div>
			
			</div>
		</div>

	</div>
</div>