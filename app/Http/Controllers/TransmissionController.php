<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOnlyNameValidationRequest;
use App\Models\Transmission;
use Illuminate\Http\Request;

class TransmissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'permission:manage directories'])->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transmission::all();
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOnlyNameValidationRequest $request)
    {
        if(!$request->user()->can('manage directories')){
            return response()->json('You dont have permission!');
        }

        $data = Transmission::create($request->all());

        return response([
            'item' => $data,
            'message' => 'Item Created Succesfully!'
            ],  201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transmission $transmission)
    {
        return response()->json(['transmission' => $transmission], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateOnlyNameValidationRequest $request, Transmission $transmission)
    {
        if(!$request->user()->can('manage directories')){
            return response()->json('You dont have permission!');
        }

        $transmission->update($request->all());

        return response([
            'item' => $transmission,
            'message' => 'Item Created Succesfully!'
            ], 200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transmission $transmission)
    {
        if(!$transmission->user()->can('manage directories')){
            return response()->json('You dont have permission!');
        }

        $transmission->delete();

        return response(['message' => 'Deleted'], 204);
    }
}
