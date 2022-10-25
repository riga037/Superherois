@extends('plantilla')

@section('content')
    <div>        
        <h2>Superherois</h2>
    </div>
    <div>
        <a href="{{ route('superheroes.create') }}"> Nou superheroi</a>
    </div>
        
   
    @if (session('success'))
        <div class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

       
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Hero Name</th>
                <th>Gender</th>                        
                <th>Operacions</th>
            </tr>
        </thead>
        
        @foreach ($superheroes as $superhero)
        
        <tr>
            <td>{{ $superhero->id }}</td>
            <td>{{ $superhero->heroname }}</td>
            <td>{{ $superhero->gender }}</td>                     
            <td>     
                <a href="{{ route('superheroes.editsuperpowers',$superhero->id) }}">Poders</a>  
                <a href="{{ route('superheroes.show',$superhero->id) }}">Mostrar</a>        
                <a href="{{ route('superheroes.edit',$superhero->id) }}">Editar</a>
                <a href="{{ route('superheroes.destroy',$superhero->id) }}">Esborrar</a>               
            </td>
        </tr>
        @endforeach
    </table>
  
    {{ $superheroes->links('pagination::bootstrap-4') }}
      
@endsection
