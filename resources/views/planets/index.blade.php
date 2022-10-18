@extends('plantilla')
@section('content')

Llista Planetes <a href="/formnewplanet">Nou Planeta</a>
<br>
<table border=1>
	<tr>
		<td>ID</td>
		<td>Name</td>
		<td>Created At</td>
		<td>Operacions</td>
	</tr>
	@foreach($planetes as $planeta)
	<tr>
		<td>{{ $planeta->id }}</td>
		<td>{{ $planeta->name }}</td>
		<td>{{ $planeta->created_at }}</td>
		<td><a href="/deleteplanet/{{ $planeta->id }}">Esborrar</a></td>
		<td><a href="/updateplanet/{{ $planeta->id }}">Actualitzar</a></td>
		<td><a href="/showplanet/{{ $planeta->id }}">Mostrar</a></td>
	</tr>
	@endforeach
</table>

{{$planetes->links('pagination::bootstrap-4')}}

@endsection