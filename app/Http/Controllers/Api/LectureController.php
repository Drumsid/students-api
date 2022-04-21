<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LectureResource;
use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{

    public function index()
    {
        return LectureResource::collection(Lecture::all());
    }


    public function store(Request $request)
    {
        $lecture = Lecture::create($request->all());
        return new LectureResource($lecture);
    }


    public function show(Lecture $lecture)
    {
        return new LectureResource($lecture);
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
