@extends('plantilla')
  
@section('content')
<a href="{{ route('planets.index') }}"> Tornar</a>

<h2>Fitxa Planeta</h2>

    <div>
        <strong>Planet name:</strong>
        {{ $planet->name }}
    </div>

    <div>
        <strong>Herois il·lustres:</strong>
        @foreach($planet->superheroes as $superhero)
            <li>{{ $superhero->heroname }}</li>
        @endforeach
    </div>
@endsection