<div class="x_panel">
	<div class="x_title">
		<h2>Salários</h2>
		<ul class="nav navbar-right panel_toolbox">
			@if( $contrato->salarios->isEmpty() )
			<li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
			@else
			<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
			@endif
			<li><a class="close-link"><i class="fa fa-close"></i></a></li>
		</ul>
		<div class="clearfix"></div>
				
		<!-- Button Cadastro -->
		<button type="button" data-toggle="modal" data-target="#exampleModal" 
			data-rota="{{route('salario.create')}}" class="btn btn-xs btn-success">
			<i class="fa fa-plus"></i> | Registrar Novo salário para Contrato
		</button>
		<!-- END Button Cadastro -->
		
	</div>
	@if( $contrato->salarios->isEmpty() )
	<div class="x_content" style="display: none;">
	@else
	<div class="x_content">
	@endif
		<div class="row">
			<div class="col-sm-12">
			
				<div class="table-responsive">
					<table id="tabelaSalario" class="table table-bordered table-hover table-striped">
						<thead align="center">
							<tr>
								<th>Data</th>
								<th>Motivo</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
						@forelse($contrato->salarios as $salario)
							<tr>
								<td>{{$salario->data}}</td>
								<td>{{$salario->motivo}}</td>
								<td>
									<button type="button" class="btn btn-primary btn-circle" 
									data-toggle="modal" data-target="#exampleModal" data-rota="{{route('salario.show', $salario->id)}}">
									<i class="fa fa-search" aria-hidden="true"></i></button>
									
									<!-- @ can('membro_update')  -->
									<button type="button" class="btn btn-warning btn-circle" 
									data-toggle="modal" data-target="#exampleModal" data-rota="{{route('salario.edit', $salario->id)}}">
										<i class="fa fa-edit" aria-hidden="true"></i></button>
									<!-- @ endcan -->
								</td>
							</tr>
						@empty
							<p><b>Funcionário(a) Não Possui nenhum Salário!</b></p>
						@endif
						</tbody>
					</table>
				</div>
			
			</div>
		</div>

	</div>
</div>