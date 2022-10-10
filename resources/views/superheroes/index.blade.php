@extends('plantilla')
@section('content')

Llista Superherois <a href="/formnewsuperhero">Nou Superheroi</a>
<br>
<table border=1>
	<tr>
		<td>ID</td>
		<td>Real Name</td>
		<td>Hero Name</td>
		<td>Gender</td>
		<td>Planet</td>
		<td>Created At</td>
		<td>Operacions</td>
	</tr>
	@foreach($superherois as $superheroi)
	<tr>
		<td>{{ $superheroi->id }}</td>
		<td>{{ $superheroi->realname }}</td>
		<td>{{ $superheroi->heroname }}</td>
		<td>{{ $superheroi->gender }}</td>
		<td>{{ $superheroi->planet_id }}</td>
		<td>{{ $superheroi->created_at }}</td>
		<td><a href="/deletesuperhero/{{ $superheroi->id }}">Esborrar</a></td>
		<td><a href="/updatesuperhero/{{ $superheroi->id }}">Actualitzar</a></td>
	</tr>
	@endforeach
</table>

{{$superherois->links('pagination::bootstrap-4')}}

@endsection