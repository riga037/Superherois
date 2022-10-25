<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Superhero;
use App\Models\Planet;
use App\Models\Superpower;

class SuperheroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Carreguem llista superherois i cada
        // superheroi amb l'objecte planeta associat
        // per evitar problema N+1 
        $superheroes = Superhero::with('planet')->paginate(5);
    
        return view('superheroes.index',compact('superheroes'));
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Recuperem la col·lecció de planetes
        $planets = Planet::all();

        return view('superheroes.new',compact('planets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'heroname' => 'required | max:25 |unique:superheroes',
            'realname' => 'required | max:75', 
            'gender' => 'required | in:male,female',
            'planet_id' => 'required|exists:planets,id'           
        ]);
    
        Superhero::create($request->all());
     
        return redirect()->route('superheroes.index')
                        ->with('success','Superheroi afegit correctament.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Superhero $superhero)
    {
            // Tenim un superheroi, carreguem els superpoders associats!     
            $superhero->load("superpowers");
            // dd($superhero);
            
            return view('superheroes.show',compact('superhero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Superhero $superhero)
    {
        //
        $planets = Planet::all();
        return view('superheroes.update',['superhero'=>$superhero],compact('planets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Superhero $superhero)
    {
        //
        $request->validate([
            'heroname' => 'required | max:25',
            'realname' => 'required | max:75', 
            'gender' => 'required | in:male,female',
            'planet_id' => 'required|exists:planets,id'           
        ]);

        $superhero->realname = $request->realname;
        $superhero->heroname = $request->heroname;
        $superhero->gender = $request->gender;
        $superhero->planet_id = $request->planet_id;
        $superhero->save();

        return redirect('/superheroes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Superhero $superhero)
    {
        //
        $superhero->delete();

        return redirect('/superheroes');
    }

    public function editSuperpowers(Superhero $superhero) 
    {
        
        // Transformem la col·lecció de superpoders en un array amb els id's
        
        $arrayId = $superhero->superpowers->pluck('id'); // exemple: [1,3,5]
        
        $superpowers = Superpower::whereNotIn('id',$arrayId)->get();
       
        
        return view('superheroes.showSuperpowers',compact('superhero','superpowers'));
    }

    public function attachSuperpowers(Request $request, Superhero $superhero) 
    {
        
        $request->validate([
            'powers' => 'exists:superpowers,id',                       
        ]);

       $superhero->superpowers()->attach($request->powers);
        
        return redirect()->route('superheroes.editsuperpowers',$superhero->id)
                        ->with('success','Superpowers assignats correctament');

    }


    public function detachSuperpowers(Request $request, Superhero $superhero) 
    {
        
        $request->validate([
            'powers' => 'exists:superpowers,id',                       
        ]);

        // Una llista buida dins detach 
        // elimina tots els superpoders!
        if ($request->has('powers'))
            $superhero->superpowers()->detach($request->powers);
        
        return redirect()->route('superheroes.editsuperpowers',$superhero->id)
                        ->with('success','Superpoders extrets correctament');

    }
}
