<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LectureResource extends JsonResource
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
            "topic" => $this->topic,
            "description" => $this->description,
            "class" => $this->classRoom->pluck("title")->join(" | "),
            // надо получить всех студентов кто был на этой лекции
//            "students" => $this->classRoom->pluck("title")->join(" | "),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
