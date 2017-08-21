<div class="row">
	<div class="col-lg-8 col-lg-offset-1 col-md-10 col-md-offset-1">
		@if ( isset($feria) )
		<form id="formCE" class="form" method="post" action="{{route('ferias.update', $feria->id)}}">
			{!! method_field('PUT') !!} 
		@else
		<form id="formCE" method="POST" action="{{route('ferias.store')}}">
		@endif 
		<input id="Contratos_idContratos" type="text" class="hide" name="Contratos_idContratos" value="">
		{!! csrf_field() !!}
		<div id="form-message"></div>
		<div class="form-horizontal form-label-left">
			<fieldset>
				<legend>Aquisição</legend>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Data Inicio</label>
					<div class="col-md-9 col-sm-9 col-xs-12"> 
					<input type="date" class="form-control" name="inicio_aquisicao" 
						value="{{$feria->inicio_aquisicao or old('inicio_aquisicao')}}">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Data Término</label>
					<div class="col-md-9 col-sm-9 col-xs-12"> 
					<input type="date" class="form-control" name="termino_aquisicao" 
						value="{{$feria->termino_aquisicao or old('termino_aquisicao')}}">
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Gozo</legend>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Data Inicio</label>
					<div class="col-md-9 col-sm-9 col-xs-12"> 
					<input type="date" class="form-control" name="inicio_gozo" 
						value="{{$feria->inicio_gozo or old('inicio_gozo')}}">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Data Término</label>
					<div class="col-md-9 col-sm-9 col-xs-12"> 
					<input type="date" class="form-control" name="termino_gozo" 
						value="{{$feria->termino_gozo or old('termino_gozo')}}">
					</div>
				</div>
			</fieldset>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Observações</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<textarea rows="3" class="form-control" 
				name="observacoes">{{$feria->observacoes or old('observacoes')}}</textarea>
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
			var id = $('#idContrato').val();
			$('#Contratos_idContratos').val( id );
	       
	    });
</script>

<script type="text/javascript" src="{{ URL::asset('js/submitModal.js') }}"></script>