<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'subject_id' => 'required|unique:exams,subject_id',
            'date_start_exam' => 'required|date',
            'date_end_exam' => 'required|date',
            'user_id' => 'array|sometimes'
        ];
    }
}
