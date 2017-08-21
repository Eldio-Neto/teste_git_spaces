<div class="row">
	<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
		@if ( isset($user) )
		<form id="formCE" class="form" method="post" action="{{route('user.update', $user->id)}}"><!--  -->
			{!! method_field('PUT') !!} 
		@else
		<form id="formCE" method="POST" action="{{route('user.store')}}">
		@endif 
		{!! csrf_field() !!}
		<div id="form-message"></div>
			<div class="form-horizontal form-label-left">
				<fieldset>
					<legend>Info Básica</legend>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">E-mail</label>
						<div class="col-md-9 col-sm-9 col-xs-12"> 
						<input type="email" class="form-control"
							placeholder="E-mail do usuário" name="email" 
							value="{{$user->email  or old('email')}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Nome</label>
						<div class="col-md-9 col-sm-9 col-xs-12"> 
						<input type="text" class="form-control" required
							placeholder="Nome do funcionário" name="first_name" 
							value="{{$user->first_name  or old('first_name')}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Sobrenome</label>
						<div class="col-md-9 col-sm-9 col-xs-12"> 
						<input type="text" class="form-control"
							placeholder="Sobrenome" name="last_name" 
							value="{{$user->last_name  or old('last_name')}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12"><i class="fa fa-birthday-cake"></i>Dt Nascimento</label>
						<div class="col-md-9 col-sm-9 col-xs-12">  
						<input type="date" class="form-control"
							placeholder="Data de nascimento" name="data_nascimento" 
							value="{{$user->data_nascimento  or old('data_nascimento')}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Genêro</label>
						<div class=" col-md-9 col-sm-9 col-xs-12">
							<input type="radio" name="genero" value="M" class="w3-radio"
							@if (isset($user->genero) && $user->genero=='M') {{'checked'}}@endif > 
							<label>Masculino</label>
							<input type="radio" name="genero" value="F" class="w3-radio"
							@if (isset($user->genero) && $user->genero=='F') {{'checked'}}@endif > 
							<label>Feminino</label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Estado Civil</label>
						<div class="col-md-9 col-sm-9 col-xs-12"> 
							<select class="form-control" name="EstadoCivils_idEstadoCivils"> 
							@foreach ( $estadoCivils as	$estadoCivil ) 
								<option value="{{$estadoCivil->id}}"
								{{ 
									(isset($user) && $user->EstadoCivils_idEstadoCivils == $estadoCivil->id)||
									(old('EstadoCivils_idEstadoCivils') == $estadoCivil->id) 
									? "selected" : "" 
								}}>
								{{$estadoCivil->description}}</option>
							@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Nome da Mãe</label>
						<div class="col-md-9 col-sm-9 col-xs-12">  
						<input type="text" class="form-control"
							placeholder="Mãe do Funcionário" name="nome_mae" 
							value="{{$user->nome_mae or old('nome_mae')}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Nome do Pai</label>
						<div class="col-md-9 col-sm-9 col-xs-12">  
						<input type="text" class="form-control"
							placeholder="Pai do Funcionário" name="nome_pai" 
							value="{{$user->nome_pai  or old('nome_pai')}}">
						</div>
					</div>
				</fieldset>
				
				<fieldset>
					<legend>Contato</legend>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Telefone</label>
						<div class="col-md-9 col-sm-9 col-xs-12"> 
						<input type="text" class="form-control"
							placeholder="Telefone" name="phone" 
							data-inputmask="'mask': '(99) 9999-9999'"
							value="{{$user->phone  or old('phone')}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Celular</label>
						<div class="col-md-9 col-sm-9 col-xs-12"> 
						<input type="text" class="form-control"
							placeholder="Ceular" name="mobile" 
							data-inputmask="'mask': '(99) 9 9999-9999'" 
							value="{{$user->mobile  or old('mobile')}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">CEP</label>
						<div class="col-md-9 col-sm-9 col-xs-12"> 
						<input type="text" class="form-control"
							placeholder="CEP" name="CEP" 
							data-inputmask="'mask': '99.999-999'"
							onblur="pesquisacep(this.value);"
							value="{{$user->endereco[0]->CEP  or old('CEP')}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Logradouro</label>
						<div class="col-md-9 col-sm-9 col-xs-12"> 
						<input type="text" class="form-control"
							placeholder="Endereço" name="Logradouro" id="Logradouro" 
							value="{{$user->endereco[0]->Logradouro  or old('Logradouro')}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Bairro</label>
						<div class="col-md-9 col-sm-9 col-xs-12"> 
						<input type="text" class="form-control"
							placeholder="Bairro" name="Bairro"  id="Barirro"
							value="{{$user->endereco[0]->Bairro  or old('Bairro')}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Cidade</label>
						<div class="col-md-9 col-sm-9 col-xs-12"> 
						<input type="text" class="form-control"
							placeholder="Cidade" name="Cidade" id="Cidade"
							value="{{$user->endereco[0]->Cidade  or old('Cidade')}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">UF</label>
						<div class="col-md-9 col-sm-9 col-xs-12"> 
							<select class="form-control" name="UFs_idUFs"> 
							@foreach ( $UFs as	$UF ) 
								<option value="{{$UF->id}}"
								{{ 
									(isset($user) && $user->endereco[0]->UFs_idUFs == $UF->id)||
									(old('UFs_idUFs') == $UF->id) 
									? "selected" : "" 
								}}> {{$UF->Nome}}</option>
							@endforeach
							</select>
						</div>
					</div>
				</fieldset>
				
				<fieldset>
					<legend>Documentos</legend>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">CPF</label>
						<div class="col-md-9 col-sm-9 col-xs-12"> 
						<input type="text" class="form-control"
							placeholder="CPF" name="CPF"
							data-inputmask="'mask': '999.999.999-99'" 
							value="{{$user->CPF  or old('CPF')}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">RG</label>
						<div class="col-md-9 col-sm-9 col-xs-12"> 
							<input type="text" class="col-xs-6 input-sm"
							placeholder="RG" name="RG" 
							value="{{$user->RG  or old('RG')}}">
							
							<input type="text" class="col-xs-6 input-sm"
							placeholder="Emissor" name="Emissor" 
							value="{{$user->Emissor or old('Emissor')}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">PIS / PASEP</label>
						<div class="col-md-9 col-sm-9 col-xs-12"> 
						<input type="text" class="form-control"
							placeholder="PIS" name="PIS" 
							data-inputmask="'mask': '999.99999.99-9'"
							value="{{$user->PIS  or old('PIS')}}">
						</div>
					</div>
					<hr>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Título de Eleitor</label>
						<div class="col-md-9 col-sm-9 col-xs-12"> 
						<input type="text" class="form-control"
							placeholder="Número" name="titulo"
							data-inputmask="'mask': '9999.9999.9999'"
							value="{{$user->titulo  or old('titulo')}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Zona / Seção</label>
						<div class="col-md-9 col-sm-9 col-xs-12"> 
							<input type="text" class="col-xs-6 input-sm"
							placeholder="Zona" name="titulo_zona" 
							value="{{$user->titulo_zona  or old('titulo_zona')}}">
							
							<input type="text" class="col-xs-6 input-sm"
							placeholder="Seção" name="titulo_secao" 
							value="{{$user->titulo_secao or old('titulo_secao')}}">
						</div>
					</div>
					<hr>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">CTPS</label>
						<div class="col-md-9 col-sm-9 col-xs-12"> 
						<input type="text" class="form-control"
							placeholder="Carteira de trabalho" name="CTPS" 
							value="{{$user->CTPS  or old('CTPS')}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Emissão / UF</label>
						<div class="col-md-9 col-sm-9 col-xs-12"> 
							<input type="date" class="col-xs-6 input-sm"
							placeholder="Data Emissão" name="CTPS_emissao" 
							value="{{$user->CTPS_emissao or old('CTPS_emissao')}}">
							
							<input type="text" class="col-xs-6 input-sm"
							placeholder="UF" name="CTPS_uf" 
							value="{{$user->CTPS_uf or old('CTPS_uf')}}">
						</div>
					</div>
					<hr>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">CNH</label>
						<div class="col-md-9 col-sm-9 col-xs-12"> 
						<input type="text" class="form-control"
							placeholder="Número de Habilitação" name="CNH" 
							value="{{$user->CNH or old('CNH')}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Validade / Categoria</label>
						<div class="col-md-9 col-sm-9 col-xs-12"> 
							<input type="date" class="col-xs-6 input-sm"
							placeholder="Data Validade" name="CNH_validade" 
							value="{{$user->CNH_validade or old('CNH_validade')}}">
							
							<input type="text" class="col-xs-6 input-sm"
							placeholder="Categoria" name="CNH_categoria" 
							value="{{$user->CNH_categoria or old('CNH_categoria')}}">
						</div>
					</div>
				</fieldset>
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
					<button id="button" type="submit" class="btn btn-success">Enviar</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" src="{{ URL::asset('js/submitModal.js') }}"></script>
