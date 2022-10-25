@extends('plantilla')
  
@section('content')
<div class="float-right">
    <a href="{{ route('superheroes.index') }}">Tornar</a>
</div>
<h2> Fitxa Superheroi</h2>
              
<div>
        
    <div>
        <strong>Hero name:</strong>
        {{ $superhero->heroname }}
    </div>
        
    <div>            
       <strong>Real name:</strong>
       {{ $superhero->realname }}
    </div>
    <div>
        <strong>Gender:</strong>
        {{ $superhero->gender }}
    </div>
        
    <div>
        <strong>Planet:</strong>
        {{ $superhero->planet->name }}
    </div>
        
    <div>
        <strong>Powers:</strong>
        <ul>
        @foreach($superhero->superpowers as $power)
            <li>
            {{ $power->description }} 
            </li>
        @endforeach
        </ul>
    </div>
        
@endsection