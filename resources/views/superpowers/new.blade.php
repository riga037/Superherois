@extends('plantilla')
@section('content')

Nou Superpoder
<br><br>
<form method="POST" action="/save">
	
	@csrf
	<input type="text" name="description" value="{{old('description')}}">
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