<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOnlyNameValidationRequest;
use App\Models\Drive;
use Illuminate\Http\Request;

class DriveController extends Controller
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
        $data = Drive::all();
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
        $data = Drive::create($request->all());

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
    public function show(Drive $drive)
    {
        return response()->json(['drive' => $drive], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateOnlyNameValidationRequest $request, Drive $drive)
    {
        if(!$request->user()->can('manage directories')){
            return response()->json('You dont have permission!');
        }

        $drive->update($request->all());

        return response([
            'item' => $drive,
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
    public function destroy(Drive $drive)
    {
        $drive->delete();

        return response(['message' => 'Deleted'], 200);
    }
}
