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
        $superpowers = Superpower::paginate(5);
        return view('superpowers.index', compact('superpowers'));
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

        return redirect('/superpowers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Superpower $superpower)
    {
        //
        $superpower->load("superheroes");
        return view('superpowers.show',compact('superpower'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Superpower $superpower)
    {
        //
        return view('superpowers.update',['superpower'=>$superpower]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Superpower $superpower)
    {
        //
        $request->validate(
            ['description' => 'required | min:3']
        );
        
        $superpower->description = $request->description;
        $superpower->save();

        return redirect('/superpowers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Superpower $superpower)
    {
        //
        $superpower->delete();

        return redirect('/superpowers');
    }
}
