@extends('layouts.app')	
@section('content')

	@include('Site.Contrato.list-contratos')

@endsection

@push('scripts')
	@include('layouts.modal')
@endpush
