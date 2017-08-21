<div class="x_panel">
	<div class="x_title">
		<h2>Férias</h2>	
		<ul class="nav navbar-right panel_toolbox">
			@if( $contrato->Ferias->isEmpty() )
			<li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
			@else
			<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
			@endif
			<li><a class="close-link"><i class="fa fa-close"></i></a></li>
		</ul>
		<div class="clearfix"></div>
				
		<!-- Button Cadastro -->
		<button type="button" data-toggle="modal" data-target="#exampleModal" 
			data-rota="{{route('ferias.create')}}" class="btn btn-xs btn-success">
			<i class="fa fa-plus"></i> | Registrar Férias
		</button>
		<!-- END Button Cadastro -->
			
	</div>
	@if( $contrato->Ferias->isEmpty() )
	<div class="x_content" style="display: none;">
	@else
	<div class="x_content">
	@endif
		<div class="row">
			<div class="col-sm-12">
			
				<div class="table-responsive">
					<table id="tabelaFerias" class="table table-bordered table-hover table-striped">
						<thead align="center">
							<tr>
								<th>Data Inicio</th>
								<th>Data Fim</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
						@forelse($contrato->Ferias as $Feria)
							<tr>
								<td>{{$Feria->inicio_gozo}}</td>
								<td>{{$Feria->termino_gozo}}</td>
								<td>
									<button type="button" class="btn btn-sm btn-primary btn-circle" 
									data-toggle="modal" data-target="#exampleModal" data-rota="{{route('ferias.show', $Feria->id)}}">
									<i class="fa fa-search" aria-hidden="true"></i></button>
									
									<!-- @ can('membro_update')  -->
									<button type="button" class="btn btn-sm btn-warning btn-circle" 
									data-toggle="modal" data-target="#exampleModal" data-rota="{{route('ferias.edit', $Feria->id)}}">
										<i class="fa fa-edit" aria-hidden="true"></i></button>
									<!-- @ endcan -->
								</td>
							</tr>
						@empty
							<p><b>Funcionário(a) Ainda não Gozou de Férias!</b></p>
						@endif
						</tbody>
					</table>
				</div>
			
			</div>
		</div>

	</div>
</div>