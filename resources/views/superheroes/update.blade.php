@extends('plantilla')
@section('content')

Actualitzar Superheroi
<br><br>
<form method="POST" action="/updatesuperhero/{{ $superheroi->id }}">
	
	@csrf
	Real Name <input type="text" name="realname" value="{{ old('realname',$superheroi->realname) }}"><br><br>
	Hero Name <input type="text" name="heroname" value="{{ old('heroname',$superheroi->heroname) }}"><br><br>
	Gender <select name="gender" id="gender">
		<option value="male" @if( old('gender') == "male") selected @endif >Male</option>
		<option value="female" @if( old('gender',$superheroi->gender) == "female") selected @endif >Female</option>
	</select><br><br>
  	
	Planet <select name="planet_id" id="planet_id">
  		@foreach($planetes as $planeta)

		<option value="{{ $planeta->id }}" @if (old('id',$planeta->id) == $planeta->id) selected @endif >{{ $planeta->name }}</option>
  		@endforeach
	</select><br><br>	
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