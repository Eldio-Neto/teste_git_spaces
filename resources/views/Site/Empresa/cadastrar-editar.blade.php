<div class="row">
	<div class="col-lg-8 col-lg-offset-1 col-md-10 col-md-offset-1">
		@if ( isset($empresa) )
		<form id="formCE" class="form" method="post" action="{{route('empresa.update', $empresa->id)}}">
			{!! method_field('PUT') !!} 
		@else
		<form id="formCE" method="POST" action="{{route('empresa.store')}}">
		@endif 
		{!! csrf_field() !!}
		<div id="form-message"></div>
		<div class="form-horizontal form-label-left">
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Nome Fantasia</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="text" class="form-control" name="fantasia" placeholder="Nome da Empresa" 
					value="{{$empresa->fantasia or old('fantasia')}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">CNPJ</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="text" class="form-control" name="CNPJ" placeholder="CNPJ da Empresa"
					data-inputmask="'mask': '99.999.999/0001-99'" 
					value="{{$empresa->CNPJ or old('CNPJ')}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Razão Social</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="text" class="form-control" name="razao_social" placeholder="Nome da Empresa" 
					value="{{$empresa->razao_social or old('razao_social')}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Abreviação</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="text" class="form-control" name="abreviacao" placeholder="Nome da Empresa" 
					value="{{$empresa->abreviacao or old('abreviacao')}}">
				</div>
			</div>
			
			<fieldset>
				<legend>Contato</legend>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Telefone</label>
					<div class="col-md-9 col-sm-9 col-xs-12"> 
					<input type="text" class="form-control"
						placeholder="Telefone" name="phone" 
						data-inputmask="'mask': '(99) 9999-9999'"
						value="{{$empresa->phone  or old('phone')}}">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Celular</label>
					<div class="col-md-9 col-sm-9 col-xs-12"> 
					<input type="text" class="form-control"
						placeholder="Ceular" name="mobile" 
						data-inputmask="'mask': '(99) 9 9999-9999'"
						value="{{$empresa->mobile  or old('mobile')}}">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">CEP</label>
					<div class="col-md-9 col-sm-9 col-xs-12"> 
					<input type="text" class="form-control"
						placeholder="CEP" name="CEP" 
						data-inputmask="'mask': '99.999-999'"
						value="{{$empresa->CEP  or old('CEP')}}">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Logradouro</label>
					<div class="col-md-9 col-sm-9 col-xs-12"> 
					<input type="text" class="form-control"
						placeholder="Endereço" name="Logradouro" 
						value="{{$empresa->Logradouro  or old('Logradouro')}}">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Bairro</label>
					<div class="col-md-9 col-sm-9 col-xs-12"> 
					<input type="text" class="form-control"
						placeholder="Bairro" name="Bairro" 
						value="{{$empresa->Bairro  or old('Bairro')}}">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Cidade</label>
					<div class="col-md-9 col-sm-9 col-xs-12"> 
					<input type="text" class="form-control"
						placeholder="Cidade" name="Cidade" 
						value="{{$empresa->Cidade  or old('Cidade')}}">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">UF</label>
					<div class="col-md-9 col-sm-9 col-xs-12"> 
						<select class="form-control" name="UFs_idUFs"> 
						@foreach ( $Ufs as	$UF ) 
							<option value="{{$UF->id}}"
							{{ 
								(isset($empresa) && $empresa->UFs_idUFs == $UF->id)||
								(old('UFs_idUFs') == $UF->id) 
								? "selected" : "" 
							}}> {{$UF->Nome}}</option>
						@endforeach
						</select>
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