<div class="row">
	<div class="col-lg-8 col-lg-offset-1 col-md-10 col-md-offset-1">
		@if ( isset($eletronico) )
		<form id="formCE" class="form" method="post" action="{{route('eletronico.update', $eletronico->id)}}">
			{!! method_field('PUT') !!} 
		@else
		<form id="formCE" method="POST" action="{{route('eletronico.store')}}">
		@endif 
		{!! csrf_field() !!}
		<input id="Users_idUsers" name="Users_idUsers" type="text" class="hide" value="">
		<div id="form-message"></div>
		<div class="form-horizontal form-label-left">
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Marca</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="text" class="form-control" name="Marca" 
					value="{{$eletronico->Marca or old('Marca')}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Modelo</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="text" class="form-control" name="Modelo" 
					value="{{$eletronico->Modelo or old('Modelo')}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">MAC</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="text" class="form-control" name="MAC"
							data-inputmask="'mask': '**-**-**-**-**-**'"
					value="{{$eletronico->MAC or old('MAC')}}">
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
			$('#Users_idUsers').val( id );

		});
</script>

<script type="text/javascript" src="{{ URL::asset('js/submitModal.js') }}"></script>