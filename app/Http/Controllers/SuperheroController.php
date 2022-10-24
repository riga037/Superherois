<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Superhero;
use App\Models\Planet;

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
        $superherois = Superhero::with('planet')->paginate(5);
    
        return view('superheroes.index',compact('superherois'));
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $planetes = Planet::all();
        return view('superheroes.new', compact('planetes'));
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
        $request->validate(
            ['realname' => 'required | min:3',
            'heroname' => 'required | min:3 | unique:superheroes']
        );

        $superhero = new Superhero;
        $superhero->realname = $request->realname;
        $superhero->heroname = $request->heroname;
        $superhero->gender = $request->gender;
        $superhero->planet_id = $request->planet_id;
        $superhero->save();

        return redirect('/superheroes');
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
        $superheroi = Superhero::findOrFail($superhero);
        $planetes = Planet::all();
        return view('superheroes.update',compact('superheroi','planetes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $superhero)
    {
        //
        $request->validate(
            ['realname' => 'required | min:3',
            'heroname' => 'required | min:3 | unique:superheroes,heroname,'.$superhero]
        );

        
        $superheroi = Superhero::findOrFail($superhero);
        $superheroi->realname = $request->realname;
        $superheroi->heroname = $request->heroname;
        $superheroi->gender = $request->gender;
        $superheroi->planet_id = $request->planet_id;
        $superheroi->save();

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
        $superheroi = Superhero::findOrFail($superhero);
        $superheroi->delete();

        return redirect('/superheroes');
    }
}
