@extends('plantilla')
  
@section('content')
<div>
    <a href="{{ route('superheroes.index') }}"> Tornar</a>
</div>
<div>
    <h2>Afegir Nou Superheroi</h2>
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
<form action="{{ route('superheroes.store') }}" method="POST">
    @csrf
  
    <div>
        <strong>Real Name:</strong>
        <input type="text" name="realname" value="{{ old('realname') }}">
    </div>
        
    <div>           
        <strong>Hero Name:</strong>
        <input type="text" name="heroname" value="{{ old('heroname') }}">
    </div>
        
    <div>
        <strong>Gender:</strong>
        <select name="gender">
            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
        </select>
    </div>
        
    <div>           
        <strong>Planet:</strong>
        <select name="planet_id">
            @foreach($planets as $planet)
                <option value="{{ $planet->id }}" {{ old('planet_id') == $planet->id ? 'selected' : '' }} >
                            {{ $planet->name }}
                        </option>       
            @endforeach            
        </select>
    </div>
        
        
    <div>
        <input type="submit" value="Desar">
    </div>
    
</form>
</div>
@endsection