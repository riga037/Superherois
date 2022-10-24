@extends('plantilla')
@section('content')

Fitxa Planeta
<br><br>
<b>Name:</b> {{ $planet->name }}</b><br><br>
<b>Herois Il·lustres:</b><br>

@foreach($planet->superheroes as $super)
    <li>{{ $super->heroname }}</li>
@endforeach

@endsection