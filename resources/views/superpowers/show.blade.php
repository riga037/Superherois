@extends('plantilla')

@section('content')

<h2>Superpower</h2>
            
<div>
<strong>Description:</strong>
{{ $superpower->description }}
</div>
        

<div>
<strong>Superherois amb aquest poder:</strong>
<ul>
   @foreach($superpower->superheroes as $superhero)
     	<li>
            {{ $superhero->heroname }} 
            </li>
   @endforeach
</ul>
</div>
@endsection