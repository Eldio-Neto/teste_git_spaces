<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Advertências</h2>
				<ul class="nav navbar-right panel_toolbox">
					@if( $contrato->advertencias->isEmpty() )
					<li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
					@else
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
					@endif
					<li><a class="close-link"><i class="fa fa-close"></i></a></li>
				</ul>
				<div class="clearfix"></div>
				
				<!-- Button Cadastro -->
				<button type="button" data-toggle="modal" data-target="#exampleModal" 
					data-rota="{{route('advertencia.create')}}" 
					class="btn btn-xs btn-success">
					<i class="fa fa-plus"></i> | Registrar Advertência
				</button>
				<!-- END Button Cadastro -->
				
			</div>
			@if( $contrato->advertencias->isEmpty() )
			<div class="x_content" style="display: none;">
			@else
			<div class="x_content">
			@endif
				<div class="row">
					<div class="col-sm-12">
					
						<div class="table-responsive">
							<table id="tabelaAdvertencias" class="table table-bordered table-hover table-striped">
								<thead align="center">
									<tr>
										<th>Data</th>
										<th>Motivo</th>
										<th>#</th>
									</tr>
								</thead>
								<tbody>
								@forelse($contrato->advertencias as $advertencia)
									<tr>
										<td>{{$advertencia->data}}</td>
										<td>{{$advertencia->motivo}}</td>
										<td>
											<button type="button" class="btn btn-sm btn-primary btn-circle" 
											data-toggle="modal" data-target="#exampleModal" 
											data-rota="{{route('advertencia.show', $advertencia->id)}}">
											<i class="fa fa-search" aria-hidden="true"></i></button>
											
											<!-- @ can('membro_update')  -->
											<button type="button" class="btn btn-sm btn-warning btn-circle" 
											data-toggle="modal" data-target="#exampleModal" data-rota="{{route('advertencia.edit', $advertencia->id)}}">
												<i class="fa fa-edit" aria-hidden="true"></i></button>
											<!-- @ endcan -->
										</td>
									</tr>
								@empty
									<p><b>Funcionário(a) Não Possui Advertências!</b></p>
								@endif
								</tbody>
							</table>
						</div>
					
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Suspensões</h2>
				<ul class="nav navbar-right panel_toolbox">
					@if( $contrato->suspensoes->isEmpty() )
					<li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
					@else
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
					@endif
					<li><a class="close-link"><i class="fa fa-close"></i></a></li>
				</ul>
				<div class="clearfix"></div>
				
				<!-- Button Cadastro -->
				<button type="button" data-toggle="modal" data-target="#exampleModal" 
					data-rota="{{route('suspensao.create')}}" 
					class="btn btn-xs btn-success">
					<i class="fa fa-plus"></i> | Registrar Suspensão
				</button>
				<!-- END Button Cadastro -->
				
			</div>
			@if( $contrato->suspensoes->isEmpty() )
			<div class="x_content" style="display: none;">
			@else
			<div class="x_content">
			@endif
				<div class="row">
					<div class="col-sm-12">
					
						<div class="table-responsive">
							<table id="tabelaSuspensoes" class="table table-bordered table-hover table-striped">
								<thead align="center">
									<tr>
										<th>Data</th>
										<th>Dias</th>
										<th>Motivo</th>
										<th>#</th>
									</tr>
								</thead>
								<tbody>
								@forelse($contrato->suspensoes as $suspensao)
									<tr>
										<td>{{$suspensao->data}}</td>
										<td>{{$suspensao->quantidade_dias}}</td>
										<td>{{$suspensao->motivo}}</td>
										<td>
											<button type="button" class="btn btn-sm btn-primary btn-circle" 
											data-toggle="modal" data-target="#exampleModal" data-rota="{{route('suspensao.show', $suspensao->id)}}">
											<i class="fa fa-search" aria-hidden="true"></i></button>
											
											<!-- @ can('membro_update')  -->
											<button type="button" class="btn btn-sm btn-warning btn-circle" 
											data-toggle="modal" data-target="#exampleModal" data-rota="{{route('suspensao.edit', $suspensao->id)}}">
												<i class="fa fa-edit" aria-hidden="true"></i></button>
											<!-- @ endcan -->
										</td>
									</tr>
								@empty
									<p><b>Funcionário(a) Não Possui Suspensões!</b></p>
								@endif
								</tbody>
							</table>
						</div>
					
					</div>
				</div>

			</div>
		</div>
	</div>
</div>