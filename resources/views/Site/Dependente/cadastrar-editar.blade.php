<div class="row">
	<div class="col-lg-8 col-lg-offset-1 col-md-10 col-md-offset-1">
		@if ( isset($dependente) )
		<form id="formCE" class="form" method="post" action="{{route('dependente.update', $dependente->id)}}">
			{!! method_field('PUT') !!} 
		@else
		<form id="formCE" method="POST" action="{{route('dependente.store')}}">
		@endif 
		{!! csrf_field() !!}
		<input id="Users_idUsers" name="Users_idUsers" type="text" class="hide" value="">
		<div id="form-message"></div>
		<div class="form-horizontal form-label-left">
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Dependente</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
					<select class="form-control" name="TipoDependentes_idTipoDependentes"> 
					@foreach ( $tipoDependentes as	$tpDependente ) 
						<option value="{{$tpDependente->id}}"
						{{ 
							(isset($dependente) && $dependente->TipoDependentes_idTipoDependentes == $tpDependente->id)||
							(old('TipoDependentes_idTipoDependentes') == $tpDependente->id) 
							? "selected" : "" 
						}}> {{$tpDependente->description}}</option>
					@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Nome</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="text" class="form-control" name="first_name" placeholder="Primeiro Nome" 
					value="{{$dependente->first_name or old('first_name')}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Sobrenome</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="text" class="form-control" name="last_name" placeholder="Sobrenome" 
					value="{{$dependente->last_name or old('last_name')}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Data de Nascimento</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="date" class="form-control" name="data_nascimento" placeholder="Nascimento do Dependente" 
					value="{{$dependente->data_nascimento or old('data_nascimento')}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Observação</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="text" class="form-control" name="observacao" 
					value="{{$dependente->observacao or old('observacao')}}">
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