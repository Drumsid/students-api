<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LectureRequest;
use App\Http\Resources\LectureResource;
use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{

    public function index()
    {
        return LectureResource::collection(Lecture::all());
    }


    public function store(LectureRequest $request)
    {
        $lecture = Lecture::create($request->validated());
        return new LectureResource($lecture);
    }


    public function show(Lecture $lecture)
    {
        return new LectureResource($lecture);
    }


    public function update(LectureRequest $request, Lecture $lecture)
    {
        $lecture->update($request->validated());
        return new LectureResource($lecture);
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
