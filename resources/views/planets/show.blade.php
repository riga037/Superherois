@extends('plantilla')
@section('content')
<a href="{{ route('superpowers.index') }}"> Tornar</a>

<h2>Fitxa Planeta</h2>

<b>Name:</b> {{ $planet->name }}</b><br><br>
<b>Herois Il·lustres:</b><br>

@foreach($planet->superheroes as $super)
    <li>{{ $super->heroname }}</li>
@endforeach

@endsection