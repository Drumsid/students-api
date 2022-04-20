<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassRoomRequest;
use App\Http\Resources\ClassRoomResource;
use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $students = ClassRoom::with("students")->get();
        return ClassRoomResource::collection($students);
    }


    public function store(ClassRoomRequest $request)
    {
        $class = ClassRoom::create($request->validated());
        return new ClassRoomResource($class);
    }


    /**
     * @param ClassRoom $class
     * @return ClassRoomResource
     */
    public function show(ClassRoom $class)
    {

        return new ClassRoomResource($class);
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
