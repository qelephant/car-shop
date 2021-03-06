<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOnlyNameValidationRequest;
use App\Models\Wheel;
use Illuminate\Http\Request;

class WheelController extends Controller
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
        $data = Wheel::all();
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

        $data = Wheel::create($request->all());

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
    public function show(Wheel $wheel)
    {
        return response()->json(['wheel' => $wheel], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateOnlyNameValidationRequest $request, Wheel $wheel)
    {
        if(!$request->user()->can('manage directories')){
            return response()->json('You dont have permission!');
        }

        $wheel->update($request->all());

        return response([
            'item' => $wheel,
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
    public function destroy(Wheel $wheel)
    {
        if(!$wheel->user()->can('manage directories')){
            return response()->json('You dont have permission!');
        }

        $wheel->delete();

        return response(['message' => 'Deleted'], 204);
    }
}
