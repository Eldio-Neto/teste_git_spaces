@extends('layouts.app')
@section('content')

<table>
  <tr>
    <th>Column 1 Heading</th>
    <th>Column 2 Heading</th>
  </tr>
@foreach( $MACInfo as $key=>$value )
	
  <tr>
    <td>{{$key}}</td>
    <td>{{$value}}</td>
  </tr>
@endforeach
</table>
@endsection