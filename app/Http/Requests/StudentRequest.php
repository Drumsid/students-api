<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('PUT')) {
            return [
                "name" => "required|min:3|max:50",
                "class_room_id" => "nullable|numeric|exists:class_rooms,id",
            ];
        }
        return [
            "name" => "required|min:3|max:50",
            "email" => "required|email|unique:students,email",
            "class_room_id" => "nullable|numeric|exists:class_rooms,id",
        ];
    }
}
