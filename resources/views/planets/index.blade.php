@extends('plantilla')

@section('content')
    <div>        
        <h2>Planetes</h2>
    </div>
    <div>
        <a href="{{ route('planets.create') }}"> Nou planeta</a>
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
                <th>Planet Name</th>
                <th>Creation Date</th>                        
                <th>Operacions</th>
            </tr>
        </thead>
        
        @foreach ($planets as $planet)
        
        <tr>
            <td>{{ $planet->id }}</td>
            <td>{{ $planet->name }}</td>
            <td>{{ $planet->created_at }}</td>                     
            <td>     
                  <a href="{{ route('planets.show',$planet->id) }}">Mostrar</a>  
                @if(Auth::user()->is_admin)
                  <a href="{{ route('planets.edit',$planet->id) }}">Editar</a>
                  <a href="{{ route('planets.destroy',$planet->id) }}">Esborrar</a> 
                @endif
            </td>
        </tr>
        @endforeach
    </table>
  
    {{ $planets->links('pagination::bootstrap-4') }}
      
@endsection