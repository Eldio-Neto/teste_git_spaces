<div class="row">
	<div class="col-lg-8 col-lg-offset-1 col-md-10 col-md-offset-1">
		@if ( isset($contrato) )
		<form id="formCE" class="form" method="post" action="{{route('contrato.update', $contrato->id)}}">
			{!! method_field('PUT') !!} 
		@else
		<form id="formCE" method="POST" action="{{route('contrato.store')}}">
		@endif
		{!! csrf_field() !!}
		<div id="form-message"></div>
		<div class="form-horizontal form-label-left">
			<input id="Users_idUsers" type="text" class="hide" name="Users_idUsers" 
					value="{{$contrato->Users_idUsers or old('Users_idUsers')}}">
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Data de Admissão</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="date" class="form-control" name="admissao" 
					value="{{$contrato->admissao or old('admissao')}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Inicio</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="date" class="form-control" name="inicio" 
					value="{{$contrato->inicio or old('inicio')}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Aviso Prévio</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="date" class="form-control" name="aviso_previo" 
					value="{{$contrato->aviso_previo or old('aviso_previo')}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Data de Demissão</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="date" class="form-control" name="demissao" 
					value="{{$contrato->demissao or old('demissao')}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Código Colibri</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="text" class="form-control" name="cod_colibri" 
					value="{{$contrato->cod_colibri or old('cod_colibri')}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Código da Contabilidade</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="text" class="form-control" name="cod_contabilidade" 
					value="{{$contrato->cod_contabilidade or old('cod_contabilidade')}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Empresa</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
					<select class="form-control" name="Empresas_idEmpresas"> 
					@foreach ( $empresas as	$empresa ) 
						<option value="{{$empresa->id}}"
						{{ 
							(isset($contrato) && $contrato->Empresas_idEmpresas == $empresa->id)||
							(old('Empresas_idEmpresas') == $empresa->id) 
							? "selected" : "" 
						}}> {{$empresa->razao_social}}</option>
					@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Funcionário</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
					<select class="form-control" name="TipoFuncionarios_idTipoFuncionarios"> 
					@foreach ( $tipoFuncionarios as	$tpFuncionario ) 
						<option value="{{$tpFuncionario->id}}"
						{{ 
							(isset($contrato) && $contrato->TipoFuncionarios_idTipoFuncionarios == $tpFuncionario->id)||
							(old('TipoFuncionarios_idTipoFuncionarios') == $tpFuncionario->id) 
							? "selected" : "" 
						}}> {{$tpFuncionario->description}}</option>
					@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Observações</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				<textarea rows="3" cols="" class="form-control" name="observacoes" 
					>{{$contrato->observacoes or old('observacoes')}}</textarea>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				<button id="button" type="submit" class="btn btn-success">Enviar</button>
			</div>
		</div>
		</form>
	</div>
</div>

<script type="text/javascript">
$('#formCE').ready(function(e)
	    {
    		//Pega o valor de contrato da página e coloca na Modal 
			var id = $('#idUser').val();
			if ( id>0 ) {
				$('#Users_idUsers').val( id );
			}
	       
	    });
</script>

<script type="text/javascript" src="{{ URL::asset('js/submitModal.js') }}"></script>