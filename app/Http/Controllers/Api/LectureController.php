<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LectureRequest;
use App\Http\Resources\LectureResource;
use App\Models\Lecture;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LectureController extends Controller
{

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return LectureResource::collection(Lecture::all());
    }


    /**
     * @param LectureRequest $request
     * @return LectureResource
     */
    public function store(LectureRequest $request)
    {
        $lecture = Lecture::create($request->validated());
        return new LectureResource($lecture);
    }


    /**
     * @param Lecture $lecture
     * @return LectureResource
     */
    public function show(Lecture $lecture)
    {
        return new LectureResource($lecture);
    }


    /**
     * @param LectureRequest $request
     * @param Lecture $lecture
     * @return LectureResource
     */
    public function update(LectureRequest $request, Lecture $lecture)
    {
        $lecture->update($request->validated());
        return new LectureResource($lecture);
    }


    /**
     * @param Lecture $lecture
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function destroy(Lecture $lecture)
    {
        $lecture->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
