<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 *
 */
class StudentController extends Controller
{

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return StudentResource::collection(Student::all());
    }

    /**
     * Store a newly created resource in storage.
     *
//     * @param  \App\Http\Requests\StudentRequest $request
     * @return StudentResource
     */
    public function store(StudentRequest $request)
    {
        $student = Student::create($request->validated());
        return new StudentResource($student);
    }


    /**
     * @param Student $student
     * @return StudentResource
     */
    public function show(Student $student)
    {
        return new StudentResource($student);
    }


    /**
     * @param StudentRequest $request
     * @param Student $student
     * @return StudentResource
     */
    public function update(StudentRequest $request, Student $student)
    {
        $student->update($request->validated());
        return new StudentResource($student);
    }


    /**
     * @param Student $student
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
