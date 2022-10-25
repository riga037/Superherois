@extends('plantilla')
  
@section('content')
<div>
    <a href="{{ route('planets.index') }}"> Tornar</a>
</div>
<div>
    <h2>Actualitzar Planeta</h2>
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
<form action="{{ route('planets.update',$planet) }}" method="POST">
    @csrf
  
    <div>
        <strong>Name:</strong>
        <input type="text" name="name" value="{{ old('name', $planet->name) }}">
    </div>     
        
    <div>
        <input type="submit" value="Desar">
    </div>
    
</form>
</div>
@endsection