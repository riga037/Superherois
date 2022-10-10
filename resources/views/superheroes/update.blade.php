@extends('plantilla')
@section('content')

Actualitzar Superheroi
<br><br>
<form method="POST" action="/updatesuperhero/{{ $superheroi->id }}">
	
	@csrf
	Real Name <input type="text" name="realname" value="{{ old('realname',$superheroi->realname) }}"><br><br>
	Hero Name <input type="text" name="heroname" value="{{ old('heroname',$superheroi->heroname) }}"><br><br>
	Gender <input type="text" name="gender" value="{{ old('gender',$superheroi->gender) }}"><br><br>
	Planet ID <input type="number" name="planet_id" value="{{ old('planet_id',$superheroi->planet_id) }}"><br><br>	
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