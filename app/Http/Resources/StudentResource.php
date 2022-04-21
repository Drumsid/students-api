<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "class_room" => $this->classRoom ? $this->classRoom->title : null,
            "lectures" => $this->classRoom ? $this->classRoom->plan->pluck('topic')->join('| ') : null,
//            "lectures" => $this->classRoom ? LectureResource::collection($this->classRoom->plan) : null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
