@extends('plantilla')
@section('content')

Llista Superpoders <a href="/formnew">Nou Superpoder</a>
<br>
<table border=1>
	<tr>
		<td>ID</td>
		<td>Description</td>
		<td>Created At</td>
		<td>Operacions</td>
	</tr>
	@foreach($poders as $poder)
	<tr>
		<td>{{ $poder->id }}</td>
		<td>{{ $poder->description }}</td>
		<td>{{ $poder->created_at }}</td>
		<td><a href="/delete/{{ $poder->id }}">Esborrar</a></td>
		<td><a href="/update/{{ $poder->id }}">Actualitzar</a></td>
		<td><a href="/show/{{ $poder->id }}">Mostrar</a></td>
	</tr>
	@endforeach
</table>

{{$poders->links('pagination::bootstrap-4')}}

@endsection