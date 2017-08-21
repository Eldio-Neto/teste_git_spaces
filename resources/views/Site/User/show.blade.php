<div class="row">
	<div class=col-lg-2>
		<img src="{{ url('imagens/Profile')}}/{{$user->idFoto or '1'}}.jpg"
			class="img-responsive img-circle " alt="Foto Perfil">
	</div>
	<div class="col-lg-6">
		<div class="table-responsive">
			<table class="table">
				<tbody>
					<tr>
						<td>Nome</td>
						<td>{{$user->first_name}} {{$user->last_name}}</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>{{$user->email}}</td>
					</tr>
					<tr>
						<td>Data de Nascimento</td>
						<td>{{$user->data_nascimento}}</td>
					</tr>
					<tr>
						<td>Estado Civil</td>
						<td>{{$user->EstadoCivils_idEstadoCivils}}</td>
					</tr>
					<tr>
						<td>Gênero</td>
						<td>{{$user->genero}}</td>
					</tr>
					<tr>
						<td>Nome do Pai</td>
						<td>{{$user->nome_pai}}</td>
					</tr>
					<tr>
						<td>Nome da Mãe</td>
						<td>{{$user->nome_mae}}</td>
					</tr>
					<tr>
						<td><hr></td>
						<td><hr></td>
					</tr>
					<tr>
						<td>CPF</td>
						<td>{{$user->CPF}}</td>
					</tr>
					<tr>
						<td>RG: {{$user->RG}}</td>
						<td>Órgão Emissor: {{$user->Emissor}}</td>
					</tr>
					<tr>
						<td>PIS/PASEP</td>
						<td>{{$user->PIS}}</td>
					</tr>
					<tr>
						<td>Título de Eleitor</td>
						<td>{{$user->titulo}}</td>
					</tr>
					<tr>
						<td>Zona Eleitoral: {{$user->titulo_zona}}</td>
						<td>Seção Eleitoral: {{$user->titulo_secao}}</td>
					</tr>
					<tr>
						<td>CTPS: {{$user->CTPS}}</td>
						<td>Série: {{$user->CTPS_serie}}</td>
					</tr>
					<tr>
						<td>UF: {{$user->CTPS_uf}}</td>
						<td>Emissão: {{$user->CTPS_emissao}}</td>
					</tr>
					<tr>
						<td>CNH: </td>
						<td>{{$user->CNH}}</td>
					</tr>
					<tr>
						<td>Categoria: {{$user->CNH_categoria}}</td>
						<td>Validade: {{$user->CNH_validade}}</td>
					</tr>
					<tr>
						<td><hr></td>
						<td><hr></td>
					</tr>
					<tr>
						<td>Celular</td>
						<td>{{$user->mobile}}</td>
					</tr>
					<tr>
						<td>Telefone</td>
						<td>{{$user->phone}}</td>
					</tr>
					<tr>
						<td>CEP</td>
						<td>{{$user->CEP}}</td>
					</tr>
					<tr>
						<td>Endereço</td>
						<td>{{$user->Logradouro}}</td>
					</tr>
					<tr>
						<td>Bairro</td>
						<td>{{$user->Bairro}}</td>
					</tr>
					<tr>
						<td>Cidade</td>
						<td>{{$user->Cidade}}</td>
					</tr>
					<tr>
						<td>Estado</td>
						<td>{{$user->UF}}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<!-- Div Col-6 -->
</div>