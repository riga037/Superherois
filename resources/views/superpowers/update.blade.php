@extends('plantilla')
  
@section('content')
<div>
    <a href="{{ route('superpowers.index') }}"> Tornar</a>
</div>
<div>
    <h2>Actualitzar Superpoder</h2>
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
<form action="{{ route('superpowers.update',$superpower) }}" method="POST">
    @csrf
  
    <div>
        <strong>Description:</strong>
        <input type="text" name="description" value="{{ old('description', $superpower->description) }}">
    </div>     
        
    <div>
        <input type="submit" value="Desar">
    </div>
    
</form>
</div>
@endsection