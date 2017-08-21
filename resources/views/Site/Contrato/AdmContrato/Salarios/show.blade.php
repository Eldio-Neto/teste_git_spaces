<div class="row">
	<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
		<fieldset>
			<legend>Salário</legend>
			<div class="table-responsive">
				<table class="table">
					<tbody>
						<tr>
							<td>Data de Alteração</td>
							<td>{{$salario->data}}</td>
						</tr>
						<tr>
							<td>Valor</td>
							<td>{{$salario->salario}}</td>
						</tr>
						<tr>
							<td>Motivo</td>
							<td>{{$salario->motivo}}</td>
						</tr>
						<tr>
							<td>Cargo</td>
							<td>{{$salario->Cargos_idCargos}}</td>
						</tr>
						<tr>
							<td>CBO</td>
							<td>{{$salario->CBO}}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</fieldset>
	</div>
</div>