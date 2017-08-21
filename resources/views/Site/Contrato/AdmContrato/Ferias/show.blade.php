<div class="row">
	<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
		<fieldset>
			<legend>Aquisição</legend>
			<div class="table-responsive">
				<table class="table">
					<tbody>
						<tr>
							<td>Inicio</td>
							<td>{{$ferias->inicio_aquisicao}}</td>
						</tr>
						<tr>
							<td>Término</td>
							<td>{{$ferias->termino_aquisicao}}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</fieldset>
		<fieldset>
			<legend>Gozo</legend>
			<div class="table-responsive">
				<table class="table">
					<tbody>
						<tr>
							<td>Inicio</td>
							<td>{{$ferias->inicio_gozo}}</td>
						</tr>
						<tr>
							<td>Término</td>
							<td>{{$ferias->termino_gozo}}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</fieldset>
		@if( !empty($ferias->observacoes) )
		<fieldset>
			<legend>Observações</legend>
			<div class="table-responsive">
				<p>{{$ferias->observacoes}}</p>
			</div>
		</fieldset>
		@endif
	</div>
</div>