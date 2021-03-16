<?php

namespace App\Http\Controllers;

use App\Models\AutoAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AutoAdController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:api'])->except(['index','show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AutoAd::with(['city', 'body', 'transmission', 'wheel', 'drive'])->get();
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|integer|max::20',
            'color' => 'required|string',
            'description' => 'required|string|max:255',
            'engine_volumne' => 'required|numeric|between:0,10',
            'city_id' => 'required|integer|exists:cities,id',
            'body_id' => 'required|integer|exists:bodies,id',
            'transmission_id' => 'required|integer|exists:transmissions,id',
            'wheel_id' => 'required|integer|exists:wheels,id',
            'drive_id' => 'required|integer|exists:drives,id'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $data = new AutoAd();
        $data['name'] = $request['name'];
        $data['price'] = $request['price'];
        $data['color'] = $request['color'];
        $data['description'] = $request['description'];
        $data['engine_volumne'] = $request['engine_volumne'];
        $data['city_id'] = $data->city()->attach($request->city_id);
        $data['body_id'] = $data->body()->attach($request->body_id);
        $data['transmission_id'] = $data->transmission()->attach($request->transmission_id);
        $data['wheel_id'] = $data->wheel()->attach($request->wheel_id);
        $data['drive_id'] = $data->drive()->attach($request->drive_id);

        $data->save();

        //$data = AutoAd::create($request->all());
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
    public function show($id)
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
    }
}
