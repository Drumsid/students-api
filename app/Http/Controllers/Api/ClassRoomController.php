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


    /**
     * @param ClassRoomRequest $request
     * @return ClassRoomResource
     */
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
     * @param ClassRoomRequest $request
     * @param ClassRoom $class
     * @return ClassRoomResource
     */
    public function update(ClassRoomRequest $request, ClassRoom $class)
    {
        $class->update($request->validated());
        return new ClassRoomResource($class);
    }


    public function destroy($id)
    {
        //
    }
}
