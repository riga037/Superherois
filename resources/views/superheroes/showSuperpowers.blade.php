@extends('plantilla')
   
@section('content')
<div>
    <a href="{{ route('superheroes.index') }}"> Tornar</a>
</div>

<div>    
    <h2>Poders de {{ $superhero->heroname }}</h2>
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


<div class="row">

    <div class="col-sm">
     	<form method='POST' action="{{ route('superheroes.detachsuperpowers',$superhero->id) }}">
            @csrf
	     	<div class="form-group">
	    	  <label>Poders assignats</label>
	    	  <select multiple  size="10" name="powers[]" class="form-control">
	    			
	    		@foreach($superhero->superpowers as $power) {		
	                  <option value="{{ $power->id }}">
                            {{ $power->description }}                              
                          </option>                         
	                @endforeach
	    			
	    	</select>
	    	</div>
	    	<input type="submit" value="Treure poders" class="btn btn-dark">
    	</form>

    </div>
    <div class="col-sm">
    	<form method='POST' action="{{ route('superheroes.assignsuperpowers',$superhero->id) }}">
             @csrf
      		<div class="form-group">
    		<label>Llista Poders</label>
    		<select multiple class="form-control" size="20" name="powers[]">
          
    		  @foreach($superpowers as $power) {        
                    <option value="{{ $power->id }}">
                      {{ $power->description }}                              
                    </option>                         
                  @endforeach
    		</select>
    		
    		</div>
    		<input class="btn btn-dark" value="Assignar poders" type="submit">
    	</form>
    </div>
    
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

@endsection