<div class="row">
	<div class="col-lg-8 col-lg-offset-1 col-md-10 col-md-offset-1">
		@if ( isset($advertencia) )
		<form id="formCE" class="form" method="post" action="{{route('advertencia.update', $advertencia->id)}}">
			{!! method_field('PUT') !!} 
		@else
		<form id="formCE" method="POST" action="{{route('advertencia.store')}}">
		@endif 
		<input id="Contratos_idContratos" type="text" class="hide" name="Contratos_idContratos" value="">
		{!! csrf_field() !!}
		<div id="form-message"></div>
		<div class="form-horizontal form-label-left">
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Data</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="date" class="form-control" name="data" 
					value="{{$advertencia->data or old('data')}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Motivo</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="text" class="form-control" name="motivo" 
					value="{{$advertencia->motivo or old('motivo')}}">
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