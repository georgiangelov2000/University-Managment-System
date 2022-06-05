<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetachCourseRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'course_id' => 'array',
        ];
    }
}
