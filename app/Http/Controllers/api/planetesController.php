<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Planet;
use Validator;

class planetesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $planets = planet::all(['id','name']);

        $response = [
            'success' => true,
            'message' => "Llistat de planetes recuperat.",
            'data' => $planets,
        ];

        //return $response;
        return response()->json($response,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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
        //Per validar camps
        $input = $request->all();
        $validator = Validator::make($input,
        [
        'name'=>'required|min:3|max:10'
        ]);

        if($validator->fails()) {
            $response = [
                'success' => false,
                'message' => "Error de validació",
                'data' => $validator->errors()->all(),
            ];
            return response()->json($response,400);
        }

        $planet = Planet::create($input);

        $response = [
            'success' => true,
            'message' => "Planeta creat correctament",
            'data' => $planet,
        ];

        return response()->json($response,200);
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
        $planet = Planet::find($id);

        if($planet == null) {

            $response = [
                'success' => false,
                'message' => "Planeta no trobat.",
                'data' => [],
            ];

            return response()->json($response,404);

        }

        $response = [
            'success' => true,
            'message' => "Planeta trobat.",
            'data' => $planet,
        ];

        return response()->json($response,200);
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

        $planet = Planet::find($id);
        if($planet==null) {

            $response = [
                'success' => false,
                'message' => "Planeta no trobat.",
                'data' => [],
            ];

            return response()->json($response, 404);

        }

        //Per validar camps
        $input = $request->all();
        $validator = Validator::make($input,
        [
        'name'=>'required|min:3|max:10'
        ]);

        if($validator->fails()) {
            $response = [
                'success' => false,
                'message' => "Error de validació",
                'data' => $validator->errors()->all(),
            ];
            return response()->json($response,400);
        }

        //versio 1
      $planet->update($input);

       
        $response = [
            'success' => true,
            'message' => "Planeta actualitzat correctament",
            'data' => $planet,
        ];

        return $response()->json($response,200);
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
        $planet = Planet::find($id);

        if($planet == null) {

            $response = [
                'success' => false,
                'message' => "Planeta no trobat.",
                'data' => [],
            ];

            return response()->json($response,404);

        }

        try {

            $planet -> delete();

            $response = [
                'success' => true,
                'message' => "Planeta esborrat.",
                'data' => $planet,
            ];
    
            return response()->json($response,200);

        }
        
        catch(\Exception $e) {

            $response = [
                'success' => false,
                'message' => "Error esborant planeta.",
            ];

            return response()->json($response,400);

        }

    }
}
