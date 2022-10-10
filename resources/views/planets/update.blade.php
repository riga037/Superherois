@extends('plantilla')
@section('content')

Actualitzar Planeta
<br><br>
<form method="POST" action="/updateplanet/{{ $planeta->id }}">
	
	@csrf
	<input type="text" name="name" value="{{ old('name',$planeta->name) }}">
	<input type="submit" name="Desar">

</form>

@if($errors->any())
	<ul>
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>
@endif

@endsection