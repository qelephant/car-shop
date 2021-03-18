<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOnlyNameValidationRequest;
use App\Http\Resources\BodyResource;
use Illuminate\Http\Request;
use App\Models\Body;

class BodyController extends Controller
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

        return BodyResource::collection(Body::all());
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

        $body = Body::create($request->all());
        $body = new BodyResource($body);
        return response([
            'item' => $body,
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
    public function show(Body $body)
    {
        $body = new BodyResource($body);

        return response()->json($body, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateOnlyNameValidationRequest $request, Body $body)
    {
        if(!$request->user()->can('manage directories')){
            return response()->json('You dont have permission!');
        }

        $body->update($request->all());
        $body = new BodyResource($body);
        return response([
            'item' => $body,
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
    public function destroy(Request $request, Body $body)
    {
        if(!$request->user()->can('manage directories')){
            return response()->json('You dont have permission!');
        }

        $body->delete();

        return response(['message' => 'Deleted'], 204);
    }
}
