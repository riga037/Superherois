<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planet;

class PlanetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $planetes = Planet::paginate(5);
        return view('planets.index', compact('planetes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('planets.new');
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
            ['name' => 'required | min:3']
        );

        $planet = new Planet;
        $planet->name = $request->name;
        $planet->save();

        return redirect('/planets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $planeta = Planet::findOrFail($id);

        return view('planets.show',compact('planeta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $planeta = Planet::findOrFail($id);

        return view('planets.update',compact('planeta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate(
            ['name' => 'required | min:3']
        );

        $planeta = Planet::findOrFail($id);
        $planeta->name = $request->name;
        $planeta->save();

        return redirect('/planets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $planeta = Planet::findOrFail($id);
        $planeta->delete();

        return redirect('/planets');
    }
}
