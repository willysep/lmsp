<?php

namespace App\Http\Requests;

use App\Models\LetterTypes;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreLetterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'letterType' => [
                'required',
                Rule::in(LetterTypes::all()->pluck('typeCode')->all())
            ],
            'subject' => 'required|max:255',
            'recipient' => 'required|max:255',
        ];
    }

    // protected $redirectRoute = ['letter.type', 'PD'];
}
