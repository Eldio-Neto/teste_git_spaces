@extends('layouts.app')

@section('content')
<input id="idUser" type="text" class="hide" value="{{ Request::route('id') }}">
<div class="" role="tabpanel" data-example-id="togglable-tabs">
	<ul id="myTab1" class="nav nav-tabs bar_tabs right nav-j" role="tablist" >
		<li role="presentation" class="'active'">
			<a href="#tab_content00" id="00-tabb" role="tab" data-toggle="tab" aria-controls="00" aria-expanded="false">Eletrônicos</a>
		</li>
		<li role="presentation" class="'active'">
			<a href="#tab_content11" id="11-tabb" role="tab" data-toggle="tab" aria-controls="11" aria-expanded="false">Dependentes</a>
		</li>
		<li role="presentation" class="'active'">
			<a href="#tab_content22" id="22-tabb" role="tab" data-toggle="tab" aria-controls="22" aria-expanded="false">Contratos</a>
		</li>
		<li role="presentation" class="'active'">
			<a href="#tab_content33" id="33-tabb" role="tab" data-toggle="tab" aria-controls="33" aria-expanded="false">Funcionário</a>
		</li>
	</ul>
	
	<!-- ------------------------------------------------------------------------------------------------------------------------------------------ -->
	
	<div id="myTabContent2" class="tab-content">
		<div role="tabpanel" class="tab-pane fade" id="tab_content00" aria-labelledby="00-tab">
		
			@include('Site.Eletronico.index')
			
		</div>
		<div role="tabpanel" class="tab-pane fade" id="tab_content11" aria-labelledby="11-tab">
		
			@include('Site.Dependente.index')
			
		</div>
		<div role="tabpanel" class="tab-pane fade" id="tab_content22" aria-labelledby="22-tab">
		
			<!-- Button Cadastro -->
			<button type="button" data-toggle="modal" data-target="#exampleModal" 
				data-rota="{{route('contrato.create')}}" class="btn btn-xs btn-success">
				<i class="fa fa-plus"></i> | Cadastrar Novo Contrato
			</button>
			<!-- END Button Cadastro -->
			@include('Site.Contrato.list-contratos')

		</div>
		<div role="tabpanel" class="tab-pane fade" id="tab_content33" aria-labelledby="33-tab">
		
			@include('Site.User.show')

		</div>
		
	</div>
</div>
@endsection

@push('scripts')
	@include('layouts.modal')
@endpush