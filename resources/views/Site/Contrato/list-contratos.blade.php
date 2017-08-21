<div class="x_panel">
	<div class="x_title">
		<h2>Contratos</h2>
		<ul class="nav navbar-right panel_toolbox">
			@if( $contratos->isEmpty() )
			<li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
			@else
			<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
			@endif
			<li><a class="close-link"><i class="fa fa-close"></i></a></li>
		</ul>
		<div class="clearfix"></div>
		
	</div>
	@if( $contratos->isEmpty() )
	<div class="x_content" style="display: none;">
	@else
	<div class="x_content">
	@endif
		<div class="row">
			<div class="col-sm-12">
			
				<div class="table-responsive">
					<table id="tabelaFaltas" class="table table-bordered table-hover table-striped">
						<thead align="center">
							<tr>
								<th>Funcionário</th>
								<th>Inicio</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
						@forelse($contratos as $contrato)
							<tr>
								<td>{{$contrato->funcionario->first_name}}</td>
								<td>{{$contrato->inicio}}</td>
								<td>
									<button type="button" class="btn btn-xs btn-primary btn-circle" 
									data-toggle="modal" data-target="#exampleModal" data-rota="{{route('contrato.show', $contrato->id)}}">
									<i class="fa fa-search" aria-hidden="true"></i></button>
									
									<!-- @ can('membro_update')  -->
									<button type="button" class="btn btn-xs btn-warning btn-circle" 
									data-toggle="modal" data-target="#exampleModal" data-rota="{{route('contrato.edit', $contrato->id)}}">
										<i class="fa fa-edit" aria-hidden="true"></i></button>
									<!-- @ endcan -->
									
									<!-- @ can('membro_update')  -->
									<a class="btn btn-xs btn-default btn-circle" 
									href="{{route('contrato.gerenciar', $contrato->id)}}">
										<i class="fa fa-cog" aria-hidden="true"></i></a>
									<!-- @ endcan -->
								</td>
							</tr>
						@empty
							<p><b>Não Existem Contratos!</b></p>
						@endif
						</tbody>
					</table>
				</div>
			
			</div>
		</div>

	</div>
</div>