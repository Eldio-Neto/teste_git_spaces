<div class="row">
	<div class="col-lg-8 col-lg-offset-1 col-md-10 col-md-offset-1">
		@if ( isset($sindicato) )
		<form id="formCE" class="form" method="post" action="{{route('sindicato.update', $sindicato->id)}}">
			{!! method_field('PUT') !!} 
		@else
		<form id="formCE" method="POST" action="{{route('sindicato.store')}}">
		@endif 
		{!! csrf_field() !!}
		<div id="form-message"></div>
		<div class="form-horizontal form-label-left">
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Descrição</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="text" class="form-control" name="Nome" placeholder="Nome do sindicato" 
					value="{{$sindicato->Nome or old('Nome')}}">
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