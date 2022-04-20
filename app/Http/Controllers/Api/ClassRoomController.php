<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassRoomRequest;
use App\Http\Resources\ClassRoomResource;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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


    /**
     * @param ClassRoom $class
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function destroy(ClassRoom $class)
    {
        if ($class->students) {
            $class->unpinStudents($class->students);
        }
        $class->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
