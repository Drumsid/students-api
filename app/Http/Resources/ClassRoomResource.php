<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClassRoomResource extends JsonResource
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
            "title" => $this->title,
            "students" => $this->students->pluck('name')->join(' | '),
//            "students" => StudentResource::collection($this->students),
            "plan" => $this->plan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
