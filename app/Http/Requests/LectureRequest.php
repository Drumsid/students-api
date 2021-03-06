<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LectureRequest extends FormRequest
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
                "topic" => "required|min:3|max:255|unique:lectures,topic," . $this->lecture->id,
                "description" => "required|min:3|max:255"
            ];
        }
        return [
            "topic" => "required|min:3|max:255|unique:lectures,topic",
            "description" => "required|min:3|max:255"
        ];
    }
}
