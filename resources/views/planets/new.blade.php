@extends('plantilla')
@section('content')

Nou Planeta
<br><br>
<form method="POST" action="{{ route('planets.store') }}">
	
	@csrf
	<input type="text" name="name" value="{{old('name')}}">
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