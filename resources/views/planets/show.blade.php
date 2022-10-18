@extends('plantilla')
@section('content')

Fitxa Planeta
<br><br>
<b>Name:</b> {{ $planeta->name }}</b><br><br>
<b>Herois Il·lustres:</b><br>

@foreach($planeta->superheroes as $super)
    <li>{{ $super->heroname }}</li>
@endforeach

@endsection