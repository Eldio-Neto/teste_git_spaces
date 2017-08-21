<div class="row">
	<div class="col-lg-8 col-lg-offset-1 col-md-10 col-md-offset-1">
		@if ( isset($tipoDependente) )
		<form id="formCE" class="form" method="post" action="{{route('tipoDependente.update', $tipoDependente->id)}}">
			{!! method_field('PUT') !!} 
		@else
		<form id="formCE" method="POST" action="{{route('tipoDependente.store')}}">
		@endif 
		{!! csrf_field() !!}
			<input id="Contratos_idContratos" type="text" class="hide" name="Contratos_idContratos" value="">
		<div id="form-message"></div>
		<div class="form-horizontal form-label-left">
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Descrição</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="text" class="form-control" name="description" placeholder="Nome do tipoDependente" 
					value="{{$tipoDependente->description or old('description')}}">
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				<button id="button" type="submit" class="btn btn-success">Enviar</button>
			</div>
		</div>
		</form>
	</div>
</div>

<script type="text/javascript" src="{{ URL::asset('js/submitModal.js') }}"></script>