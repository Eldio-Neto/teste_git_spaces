@extends('layouts.app')

@section('content')
<style>
@media (min-width: 0px) {

  .nav-j > li {
    display: table-cell;
    width: 20%;
  }
</style>

<form method="post">
	<input id="idContrato" class="hide" value="{{ Request::route('id') }}" >
	{!! csrf_field() !!}
	<div class="" role="tabpanel" data-example-id="togglable-tabs">
		<ul id="myTab1" class="nav nav-tabs bar_tabs right nav-j" role="tablist" >
			<li role="presentation" class="'active'">
				<a href="#tab_content00" id="00-tabb" role="tab" data-toggle="tab" aria-controls="00" aria-expanded="false">Salários</a>
			</li>
			<li role="presentation" class="'active'">
				<a href="#tab_content11" id="11-tabb" role="tab" data-toggle="tab" aria-controls="11" aria-expanded="false">Faltas</a>
			</li>
			<li role="presentation" class="'active'">
				<a href="#tab_content22" role="tab" id="22-tabb" data-toggle="tab" aria-controls="22" aria-expanded="false">Férias</a>
			</li>
			<li role="presentation" class="'presenca'">
				<a href="#tab_content33" role="tab" id="33-tabb3" data-toggle="tab" aria-controls="33" aria-expanded="true">Punições</a>
			</li>
		</ul>
		
		<!-- ------------------------------------------------------------------------------------------------------------------------------------------ -->
		
		<div id="myTabContent2" class="tab-content">
			<div role="tabpanel" class="tab-pane fade" id="tab_content00" aria-labelledby="00-tab">
			
				@include('Site.Contrato.AdmContrato.salarios.index')
				
			</div>
			<div role="tabpanel" class="tab-pane fade" id="tab_content11" aria-labelledby="11-tab">
			
				@include('Site.Contrato.AdmContrato.faltas.index')
				
			</div>
			<div role="tabpanel" class="tab-pane fade" id="tab_content22" aria-labelledby="22-tab">
			
				@include('Site.Contrato.AdmContrato.ferias.index')

			</div>
			
			<div role="tabpanel" class="tab-pane fade" id="tab_content33" aria-labelledby="33-tab">
				
				@include('Site.Contrato.AdmContrato.punicoes.index')
				
			</div>
		</div>
	</div>

</form>

@endsection

@push('scripts')
	@include('layouts.modal')
@endpush