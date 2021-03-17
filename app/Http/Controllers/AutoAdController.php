<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAutoAdRequest;
use App\Models\AutoAd;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

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
    public function store(CreateAutoAdRequest $request)
    {
        $data = AutoAd::create($request->all());

        return response()->json([
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
        $autoad = AutoAd::where('id', $id)->first();
        return response()->json($autoad, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateAutoAdRequest $request, $id)
    {
        $autoad = AutoAd::where('id', $id)->first();
        $autoad->update($request->all());

        return response([
            'item' => $autoad,
            'message' => 'Item Updated Succesfully!'
            ], 200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $autoad = AutoAd::where('id', $id)->first()->delete();

        return response(['message' => 'Item Succesfully Deleted'], 200);

    }
}
