<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Superpower;

class SuperpowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $poders = Superpower::paginate(5);
        return view('superpowers.index', compact('poders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superpowers.new');
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
            ['description' => 'required | min:3']
        );

        $superpower = new Superpower;
        $superpower->description = $request->description;
        $superpower->save();

        return redirect('/powers');
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
        $poder = Superpower::findOrFail($id);

        return view('superpowers.update',compact('poder'));
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
            ['description' => 'required | min:3']
        );
        
        $poder = Superpower::findOrFail($id);
        $poder->description = $request->description;
        $poder->save();

        return redirect('/powers');
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
        $poder = Superpower::findOrFail($id);
        $poder->delete();

        return redirect('/powers');
    }
}
