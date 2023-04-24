<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required','string','min:3' ,'max:255',

                Rule::unique('users')->ignore($this->course->id),
            ],
            'description'=>['required','string' ,'min:1','max:1000'],
            'image'=>'image',
            'user_id'=>['required','exists:users,id'],

        ];
    }
}
