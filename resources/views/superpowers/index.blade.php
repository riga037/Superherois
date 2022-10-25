@extends('plantilla')

@section('content')
    <div>        
        <h2>Superpoders</h2>
    </div>
    <div>
        <a href="{{ route('superpowers.create') }}"> Nou superpoder</a>
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
                <th>Description</th>                  
                <th>Operacions</th>
            </tr>
        </thead>
        
        @foreach ($superpowers as $superpower)
        
        <tr>
            <td>{{ $superpower->id }}</td>
            <td>{{ $superpower->description }}</td>                
            <td>     
                  <a href="{{ route('superpowers.show',$superpower->id) }}">Mostrar</a>        
                  <a href="{{ route('superpowers.edit',$superpower->id) }}">Editar</a>
                  <a href="{{ route('superpowers.destroy',$superpower->id) }}">Esborrar</a>               
            </td>
        </tr>
        @endforeach
    </table>
  
    {{ $superpowers->links('pagination::bootstrap-4') }}
      
@endsection