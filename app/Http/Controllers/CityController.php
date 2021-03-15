<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
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
        $data = City::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->user()->hasPermission('manage directories')){
            return response()->json('You dont have permission!');
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'activity' => 'required|numeric',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $data = City::create($request->all());

        return response([
            'item' => $data,
            'message' => 'Item Created Succesfully!'
            ], 201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return response()->json(['city' => $city], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        if(!$request->user()->hasPermission('manage directories')){
            return response()->json('You dont have permission!');
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'activity' => 'required|numeric',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $city->update($request->all());

        return response([
            'item' => $city,
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
    public function destroy(City $city)
    {
        if(!$city->user()->hasPermission('manage directories')){
            return response()->json('You dont have permission!');
        }
        $city->delete();

        return response(['message' => 'Deleted'], 200);
    }
}
