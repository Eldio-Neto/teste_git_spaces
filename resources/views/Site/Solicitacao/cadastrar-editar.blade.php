<div class="row">
	<div class="col-lg-8 col-lg-offset-1 col-md-10 col-md-offset-1">
		@if ( isset($solicitacao) )
		<form class="form" method="post" action="{{route('solicitacao.update', $solicitacao->id)}}">
			{!! method_field('PUT') !!} 
		@else
		<form method="POST" action="{{route('solicitacao.store')}}">
		@endif 
		{!! csrf_field() !!}
		<div id="form-message"></div>
		<div class="form-horizontal form-label-left">
			<br>
			@if( empty($solicitacao->Users_idUsers) )
			<!-- Inicio Lista de Users -->
			<div id="tableUser" class="table-responsive 
			col-md-9 col-sm-9 col-xs-12 col-md-offset-3 col-offset-sm-3">
				<input class="w3-radio" type="radio"checked="checked" name="Users_idUsers"
					value="{{Auth::user()->id}}">
					{{Auth::user()->first_name}} {{Auth::user()->last_name}}
				<br><br>
			</div>
			<!-- Final Lista de Users -->
			
			@can('open-solicitacao')
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Pesquisar Funcionário</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Nome ou Sobrenome" name="nome">
						<span class="input-group-btn">
							<button class="btn btn-primary" id="nomeButton" type="button">Pesquisar!</button>
						</span>
					</div><!-- /input-group -->
				</div>
			</div>
			@endcan
			@else
				<div id="data_falta" class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Solicitante</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="text" disabled class="form-control"
					value="{{$solicitacao->solicitante->first_name}} {{$solicitacao->solicitante->last_name}}">
				</div>
			</div>
			@endif
			
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Solicitação</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<select id="tpSolicitacao" class="form-control" name="TipoSolicitacaos_idTipoSolicitacaos"
					{{ isset($solicitacao->Users_idUsers) ? 'disabled="disabled"' : '' }}> 
					@foreach ( $tipoSolicitacaos as	$tpSolicitacao ) 
						<option value="{{$tpSolicitacao->id}}"
						{{ 
							(isset($solicitacao) && $solicitacao->TipoSolicitacaos_idTipoSolicitacaos == $tpSolicitacao->id)||
							(old('TipoSolicitacaos_idTipoSolicitacaos') == $tpSolicitacao->id) 
							? "selected" : "" 
						}}>
						{{$tpSolicitacao->description}}</option>
					@endforeach
					</select>
				</div>
			</div>
			<div id="data_falta" class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Data da Falta</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="date" class="form-control" name="data_falta"  
					{{ isset($solicitacao->Users_idUsers) ? 'disabled="disabled"' : '' }}
					value="{{$solicitacao->data_falta or old('data_falta')}}">
				</div>
			</div>
			<div id="valor" class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Valor</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="number" class="form-control" name="valor"
					{{ isset($solicitacao->Users_idUsers) ? 'disabled="disabled"' : '' }}
					value="{{$solicitacao->valor or old('valor')}}">
				</div>
			</div>
			<div id="data_retirada" class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Data da Retirada</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<input type="date" class="form-control" name="data_retirada"
					{{ isset($solicitacao->Users_idUsers) ? 'disabled="disabled"' : '' }}
					value="{{$solicitacao->data_retirada or old('data_retirada')}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Detalhes</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<textarea rows="3" class="form-control" name="detalhes" 
					{{ isset($solicitacao->Users_idUsers) ? 'disabled="disabled"' : '' }}
					>{{$solicitacao->detalhes or old('detalhes')}}</textarea>
				</div>
			</div>
			
			@if( isset($solicitacao->Users_idUsers) )
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
					<select class="form-control"
					@can('update-solicitacao')@else
					name="status" disabled="disabled"
					@endcan> 
					@foreach ( $status as $statu ) 
						<option value="{{$statu}}"
						{{ 
							(isset($solicitacao) && $solicitacao->status == $statu)||
							(old('status') == $statu) 
							? "selected" : "" 
						}}>
						{{$statu}}</option>
					@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Resposta</label>
				<div class="col-md-9 col-sm-9 col-xs-12"> 
				<textarea rows="3" class="form-control"
					@can('update-solicitacao')@else
					name="resposta" disabled="disabled"
					@endcan
					>{{$solicitacao->resposta or old('resposta')}}</textarea>
				</div>
			</div>
			@endif
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				<button id="button" type="submit" class="btn btn-success">Enviar</button>
			</div>
		</div>
		</form>
	</div>
</div>

<script type="text/javascript">

function showHideFields( id ){
	switch ( id ) {
	case '1':
		$('#valor').hide();
		$('#data_retirada').hide();
		$('#data_falta').show();
		break;
	case '2':
		$('#valor').show();
		$('#data_retirada').show();
		$('#data_falta').hide();
		break;
	case '3':
		$('#valor').hide();
		$('#data_retirada').show();
		$('#data_falta').hide();
		break;
	}
}

$('#tpSolicitacao').ready(function(e){
	var selected = $( "#tpSolicitacao option:selected" ).val();
	showHideFields( selected );
});

$('#tpSolicitacao').change(function(e){
	showHideFields( $(this).val() );
});
</script>

<script type="text/javascript" src="{{ URL::asset('js/submitModal.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('js/searchUser.js') }}"></script>