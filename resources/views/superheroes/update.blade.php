@extends('plantilla')
  
@section('content')
<div>
    <a href="{{ route('superheroes.index') }}"> Tornar</a>
</div>
<div>
    <h2>Actualitzar Superheroi</h2>
</div>
    
   
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<div>
<form action="{{ route('superheroes.update',$superhero) }}" method="POST">
    @csrf
  
    <div>
        <strong>Real Name:</strong>
        <input type="text" name="realname" value="{{ old('realname', $superhero->realname) }}">
    </div>
        
    <div>           
        <strong>Hero Name:</strong>
        <input type="text" name="heroname" value="{{ old('heroname', $superhero->heroname) }}">
    </div>
        
    <div>
        <strong>Gender:</strong>
        <select name="gender">
		<option value="male" @if( old('gender',$superhero->gender) == "male") selected @endif >Male</option>
		<option value="female" @if( old('gender',$superhero->gender) == "female") selected @endif >Female</option>
        </select>
    </div>
        
    <div>           
        <strong>Planet:</strong>
        <select name="planet_id">
            @foreach($planets as $planet)
                <option value="{{ $planet->id }}" @if (old('planet_id',$superhero->planet_id) == $planet->id) selected @endif >{{ $planet->name }}</option>       
            @endforeach            
        </select>
    </div>
        
        
    <div>
        <input type="submit" value="Desar">
    </div>
    
</form>
</div>
@endsection