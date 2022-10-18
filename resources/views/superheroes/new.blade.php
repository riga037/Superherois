@extends('plantilla')
@section('content')

<?php
    if (isset($_REQUEST['gender'])) {
        $selected_choice = $_REQUEST['gender'];
    }
    else {
        $selected_choice = "none";
    }
?>

Nou Superheroi
<br><br>
<form method="POST" action="/savesuperhero">
	
	@csrf
	Real Name <input type="text" name="realname" value="{{old('realname')}}"><br><br>
	Hero Name <input type="text" name="heroname" value="{{old('heroname')}}"><br><br>
	Gender <select name="gender" id="gender">
		<option value="male" @if( old('gender') == "male") selected @endif >Male</option>
		<option value="female" @if( old('gender') == "female") selected @endif >Female</option>
	</select><br><br>
	Planet <select name="planet_id" id="planet_id">
  		@foreach($planetes as $planeta)
		<option value="{{ $planeta->id }}" @if (old('planet_id') == $planeta->id) selected @endif >{{ $planeta->name }}</option>
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