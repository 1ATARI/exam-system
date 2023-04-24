<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateQuestionRequest extends FormRequest
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
            'name'=>['required','string','min:1' ,'max:255'],
            'option_a'=>['required','string','min:1' ,'max:255'],
            'option_b'=>['required','string','min:1' ,'max:255'],
            'option_c'=>['required','string','min:1' ,'max:255'],
            'option_d'=>['required','string','min:1' ,'max:255'],
            'correct_answer'=>['required' , 'string'  , Rule::in(['option_a' ,'option_b' ,'option_c' ,'option_d'])],
        ];
    }
}
