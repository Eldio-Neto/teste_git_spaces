<div class="row">
	<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
		<div class="table-responsive">
			<table class="table">
				<tbody>
					<tr>
						<td>Data</td>
						<td>{{$suspensao->data}}</td>
					</tr>
					<tr>
						<td>Quantidade de Dias </td>
						<td>{{$suspensao->quantidade_dias}}</td>
					</tr>
					<tr>
						<td>Motivo</td>
						<td>{{$suspensao->motivo}}</td>
					</tr>
					<tr>
						<td>Data de Registro</td>
						<td>{{$suspensao->created_at}}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>